<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\User,
    Auth,
    Hash;
use Validator;
Use App\Order;
Use App\Queue;
Use App\Tag;
use Mail;


class serviceController extends Controller {

    private function random($length = 16) {
        if (!function_exists('openssl_random_pseudo_bytes')) {
            throw new RuntimeException('OpenSSL extension is required.');
        }

        $bytes = openssl_random_pseudo_bytes($length * 2);

        if ($bytes === false) {
            throw new RuntimeException('Unable to generate random string.');
        }

        return substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, $length);
    }

    /**
     * Generate a "random" alpha-numeric string.
     *
     * Should not be considered sufficient for cryptography, etc.
     *
     * @param  int  $length
     * @return string
     */
    private function quickRandom($length = 16) {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }

    public function forget_password(Request $request){

        $data = $request->input();
        $subiect="new password";
        $email="noreply@perculb.pk";
        $emailto=$data['email'];
        $pas = rand(5000, 900000);

        Mail::send('emails.forgotpassword', [
            'email'=>$email,
            'msg'=>$pas
        ], function($m) use($email, $subiect, $emailto) {
            $m->from($email);
            $m->to($emailto)->subject($subiect);
        });

        $password = Hash::make($pas);
        $user=User::where("email", "=", $data['email'])
            ->update(["password" => $password]);
        return response()->json(array("status" => "success"));
    }
    public function reg_new(Request $request) {

        $data = $request->input();
        $email['email'] = $data['email'];
        $rule_email = array('email' => 'unique:users,email');
        $validator_email = Validator::make($email, $rule_email);
        if ($validator_email->fails()) {
            $message = '[Email] already exists';
            return response()->json(array("status" => "error", "msg" => $message, "error_field" => 'email'));
        } else {
            $pass = $data['password'];
            $data['promo'] = $this->quickRandom(6);
            $data['password'] = Hash::make($pass);

            $id = User::create($data);
            $us_id = $id->id;
        }
        
        
        return response()->json(array("status" => "success", 'id' => $us_id));
    }

    public function queue_update(Request $request) {

        $data = $request->except('_token');
        $user = Auth::user();
        $qu=Queue::where("month", "=", $data['queue_month'])
            ->where("user_id", "=", $user->id)->get();

        Queue::where("month", "=", $data['queue_month'])
                ->where("user_id", "=", $user->id)
                ->update(["status" => "processing"]);

        $subiect="Order status in perfumeclube";
        $email="noreply@perculb.pk";
        $emailto=$user->email;
        $status = "processing";

        Mail::send('emails.order_status', [
            'email'=>$email,
            'status'=>$status,
            'queue'=>$qu
        ], function($m) use($email, $subiect, $emailto) {
            $m->from($email);
            $m->to($emailto)->subject($subiect);
        });
        $data['user_id'] = $user->id;
        $data['month'] = $data['queue_month'];
        $data['payment'] = '395';
        $data['status'] = 'processing';
        $request->session()->flash('message', 'You have successfully placed an order ' . '.');

        if (isset($data['ref_id'])) {
            
            $ref_user = User::where("promo","=",$data['ref_id'])
                    ->first();
            if(!is_null($ref_user) && $ref_user->id != $user->id)
            {
                $ref_data['user_id'] = $ref_user->id;
                $ref_data['refer_id'] = $user->id;
                $ref_data['points'] = 10;

                \App\Ref::create($ref_data);
        $request->session()->flash('message', 'You have been sucessfully placed a Order for Month of ' . $data['queue_month'] . '.** Promo code applied.');
                
            }
        }
        
        unset($data['queue_month']);
        unset($data['ref_id']);
        \DB::table("orders_records")
                ->insert($data);
        

        return response()->json(array("status" => "success"));
    }

    public function get_brand_products(Request $request) {

        $data = $request->input();

        $products = Product::where("brand_id", "=", $data['id'])
                ->get();

        return response()->json(array("status" => "success", 'products' => $products));
    }

    public function login_user(Request $request) {

        $data = $request->input();
        $user = User::where("email", $data['email'])
                ->first();
        if (!is_null($user)) {
            if (Hash::check($data['password'], $user->password)) {
                Auth::login($user);

                if(!count($user->address()->first())){

                    $res['ship'] = true;
                    $res['url'] = route('shipForm',[Auth::id()]);
                    return response()->json($res);

                }

                $res['status'] = true;
                $res['ship'] = false;
                return response()->json($res);
            }

            $res['status'] = false;
            $res['ship'] = false;
            return response()->json($res);
        } else {
            $res['status'] = false;
            return response()->json($res);
        }
    }

    public function affiliate_proceed(Request $request) {

        $datas = $request->input('email');
        $user = Auth::user();
        foreach ($datas as $email) {
            if ($email != '') {
                $data['email'] = $email;
                $data['messages'] = $user->name . " Want to share this opportunity with you!";
                $data['link_code'] = $user->promo;
                $data['link'] = 'http://perfumeclub.pk/per_detail';
                \Mail::send('emails.affiliate', $data, function($message) use($data) {
                    $message->from('noreply@perfumeclub.com', 'Perfume Club');
                    $message->to($data['email'], 'Perfume Club')->subject('Grap This Opportunity!');
                });
//                usleep(10);
            }
        }
        return response()->json(array("status" => "success"));
    }

    public function shiping_save(Request $request) {

        $data = $request->input();
        $user = User::where('id', $data['user_id'])->first();

        $user_data['name'] = $data['first_name'] . " " . $data['last_name'];
        $user_data['email'] = $data['email'];

        $subiect="welcome in perfumeclube";
        $email="noreply@perculb.pk";
        $emailto=$data['email'];
        $code = rand(5000, 900000);

        Mail::send('emails.welcome', [
            'email'=>$email,
            'code'=>$code
        ], function($m) use($email, $subiect, $emailto) {
            $m->from($email);
            $m->to($emailto)->subject($subiect);
        });
        $user_data['rand_id'] = $code;

        $users = User::where('id', $data['user_id'])
                ->update($user_data);
        Order::create($data);
        Auth::login($user);
        return response()->json(array("status" => "success"));
    }

    public function shiping_update(Request $request) {

        $data = $request->except('_token');
        $user = User::where('id', $data['user_id'])->first();

        $user_data['name'] = $data['first_name'] . " " . $data['last_name'];
        $users = User::where('id', $data['user_id'])
                ->update($user_data);

        $order = Order::where("user_id", "=", $data['user_id'])
                ->first();
        if (!is_null($order)) {
            $current = \Carbon\Carbon::now();
            $trialExpires = $current->addMonth();
            $data['valid_till'] = $trialExpires;
            $data['status'] = 'processing';
            Order::where("user_id", "=", $data['user_id'])
                    ->update($data);
        } else {
            $current = \Carbon\Carbon::now();
            $trialExpires = $current->addMonth();
            $data['valid_till'] = $trialExpires;
            $data['status'] = 'processing';

            // add 30 days to the current time

            Order::create($data);
        }
        Auth::login($user);
        $request->session()->flash('message', 'You have been sucessfully subscribed. You will get a confrmation email shortly.!');
        return response()->json(array("status" => "success"));
    }

    public function model_view($id) {


        $pro = Product::where('id', $id)->first();
        $brand = Brand::where('id', $pro->brand_id)->first();
        $res['brand'] = $brand->brand_name;
        $res['product'] = $pro->product_name;
        $res['product_id'] = $pro->id;
        $res['brand_id'] = $brand->id;
        $res['imag'] = $pro->image;
        $res['des'] = $pro->description;
        $res['status'] = true;
        return response()->json($res);
    }

    public function add_queue(Request $request) {

        $data = $request->input();
        $user = Auth::User();
        $order =Order::where('user_id',$user->id)->first();
        if($order) {
            $year = date("Y");
            $dataq['user_id'] = $user->id;
            $dataq['year'] = $year;
            $dataq['brand_id'] = $data['bra_id'];
            $dataq['product_id'] = $data['pro_id'];
            $dataq['month'] = $data['Month'];
            $dataq['status'] = "pending";
            $date = date_parse( $data['Month']);
            $dataq['month_number'] = $date['month'];

            $q = Queue::create($dataq);
            $count =Queue::where('user_id',$user->id)
                ->where('status','=','pending')->get();
            $c=count($count);
            $res['count'] = $c;
            $res['status'] = true;
            $res['id'] = $q->id;
            return response()->json($res);
        }else{
            return response()->json(array("status" => "false", 'id' => $user->id));
        }
    }

    public function addToCart(Request $request){


        $product = Product::find($request->product_id);

        $item = Cart::add(['id' => $request->product_id, 'name' => $request->product_name, 'qty' => 1, 'price' => 200, 'options' => ['image' => $product['image']]]);


        $itemsList = view('pages.cart_items')->render();
        if($item->rowId){

            return response()->json(array("count" => Cart::count() ,"status" => "success" , 'itemsList' =>$itemsList));

        }else{

            return response()->json(array("count" => Cart::count(), "status" => "error"));

        }

    }

    public function removeFromCart(Request $request){

        $rowId = $request->rowId;
        $item = Cart::remove($rowId);

        $itemsList = view('pages.cart_items')->render();

        return response()->json(array('count' => Cart::count(),'itemsList' => $itemsList));

    }

    public function que_pro_de($id){

        $que = Queue::where('id',$id)->first();
        $us =Auth::User();

        if(strtolower($que->status)  == 'pending') {
            Queue::where('id', $id)
                ->where('status', '=', 'pending')->delete();
            $count =Queue::where('user_id',$us->id)
                ->where('status','=','pending')->get();
            $c=count($count);
            $res['count'] =$c;
            $res['status'] = true;
        }else{
            $res['status'] = false;
        }
        return response()->json($res);
    }

    public function checkQueue(){

        $user = Auth::User();

        $que = Queue::where('user_id', $user->id)
            ->orderby('month_number', 'asc')
            ->where("status","=","pending")
            ->paginate(10);

        if(count($que)){

            return response()->json(1);

        }

        return response()->json(0);


    }

    public function getQueueImages($id){

        $queue = Queue::find($id);


        $q = Queue::where('user_id', $queue->user_id)
            ->where('month', $queue->month)
            ->where('status', "pending")
            ->where('year', $queue->year)
            ->orderBy('month_number')
            ->get()->pluck('product_id');

        $product = Product::whereIn('id', $q)->get()->toArray();

        $product['count'] = count($product);

        if(count($product)){

            $product['status'] = "success";

        }
        return response()->json($product);

    }
}
