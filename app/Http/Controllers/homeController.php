<?php

namespace App\Http\Controllers;

use App\ProductTag;
use Illuminate\Http\Request;
use App\User,
    Auth,
    Hash;
use Validator;
Use App\Brand;
Use App\Queue;
Use App\Tag;
Use App\Product;
use App\Order;

class homeController extends Controller {

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function home_page() {
        return view('pages.home');
    }

    public function faq() {
        return view('pages.faq');
    }
    
    public function about_us() {
        return view('pages.about_us');
    }
    
    
    public function reg_view() {
        return view('forms.registration');
    }
    
    public function reg_view_ref($id) {
        
        return view('forms.registration_ref')
                    ->with('ref_id',$id);
    }

    public function login_view() {

        return view('forms.login');
    }
    
    public function per_detail() {


        if (!Auth::check()) {

            return redirect()->route('login.view');
        }
        $month = date("F");
        $user = Auth::User();
        $style = Tag::where('type', '=', 'style')->get();
        $occasion = Tag::where('type', '=', 'occasion')->get();
        $products = Product::with('brand')->where('quantity' , '>=' ,1)->get();

        $checkout = 0;
        if($user->queue()->first()){

            $checkout = 1;
        }
        $shipping_address = Order::where("user_id", "=", $user->id)
                ->first();

        return view('pages.perfume_detail')
                        ->with('products', $products)
                      //  ->with('shipping_address', $shipping_address)
                        ->with('style', $style)
                        ->with('occasion', $occasion)
                        ->with('checkout', $checkout);
    }

    public function ship_form($id) {


        return view('forms.shiping_form')
                        ->with('id', $id);
    }

    public function how_it() {

        return view('pages.how_it_work');
    }

    public function gift_view() {

        return view('pages.gift');
    }

    public function women_view() {

        return view('pages.women');
    }

    public function product_detail($id) {

        return view('pages.product_detail')
                        ->with('id', $id);
    }

    public function cartCheckout(){


        $user = Auth::user();
        $shipping_address = Order::where("user_id", "=", $user->id)
            ->first();
        return view('pages.cart_checkout',compact('shipping_address'));

    }

    public function my_queue() {

        if(!Auth::check()){

            return redirect()->route('login.view');
        }

        $user = Auth::User();

        $que = Queue::with('products' , 'brand')->where('user_id', $user->id)
                ->orderby('month_number', 'desc')
                ->paginate(10);

        if(!count($que)){

            return redirect()->route('perDetail');
        }
        $shipping_address = Order::where("user_id", "=", $user->id)
                ->first();


        return view('pages.my_queue')
                    ->with('shipping_address', $shipping_address)
                    ->with('queue', $que);
    }


    public function my_queue_processing() {


        $user = Auth::User();
        $que = Queue::where('user_id', $user->id)
                ->orderby('month_number', 'asc')
                ->where("status","=","processing")
                ->paginate(10);
        
        $shipping_address = Order::where("user_id", "=", $user->id)
                ->first();


        return view('pages.my_queue_processing')
                    ->with('shipping_address', $shipping_address)
                    ->with('queue', $que);
    }
    
    
    public function my_queue_completed() {
        $user = Auth::User();
        $que = Queue::where('user_id', $user->id)
                ->orderby('month_number', 'asc')
                ->where("status","=","complete")
                ->paginate(10);
        
        $shipping_address = Order::where("user_id", "=", $user->id)
                ->first();


        return view('pages.my_queue_completed')
                    ->with('shipping_address', $shipping_address)
                    ->with('queue', $que);
    }


    public function subscriptions() {

        $user = Auth::User();
        $orders = Order::where('user_id', $user->id)
                ->orderby('id', 'desc')
                ->paginate(10);

        return view('pages.subscriptions')
                        ->with('orders', $orders);
    }
    
    public function referral_points(Request $request){
        
        $user = Auth::User();
        
        $points = \DB::table("points")
                ->where("user_id","=",$user->id)
                ->first();
        
        $refs = \DB::table("reference")
                ->where("user_id","=",$user->id)
                ->paginate(20);
        
        
        return view('pages.referral_points')
                    ->with("refs",$refs);
        
    }

    public function brand_filter($slug) {

        $brand = Brand::whereSlug($slug)->first();
        $month = date("F");
        $user = Auth::User();
        $que = Queue::where('user_id', $user->id)
                ->orderby('month', $month)
                ->get();
        $shipping_address = Order::where("user_id", "=", $user->id)
                ->first();
        $style = Tag::where('type', '=', 'style')->get();
        $occasion = Tag::where('type', '=', 'occasion')->get();

        $products = Product::with('brand')->where('brand_id', $brand->id)->get();

        return view('pages.perfume_detail')
                        ->with('queue', $que)
                        ->with('products', $products)
                        ->with('style', $style)
                        ->with('shipping_address', $shipping_address)
                        ->with('occasion', $occasion);
    }

    public function genderSearch($gender,Request $request){

//        $products = Product::with('brand')->where($gender,'=','yes')->get();


        if ($request->session()->has('brand_ids') && $request->session()->has('tags')) {

            $brand_ids = $request->session()->get('brand_ids');


            $tag_ids = $request->session()->get('tags');

            $product_id = ProductTag::whereIn('tag_id' , $tag_ids)->pluck('product_id')->toArray();

            $products = Product::with('brand')->select("products.*")
                ->whereIn('id' , $product_id)
                ->where($gender , 'yes')
                ->whereIn('brand_id',$brand_ids)
                ->where('quantity','>' , 0)
                ->get();
        }else if($request->session()->has('tags')){

            $tag_ids = $request->session()->get('tags');

            $product_id = ProductTag::whereIn('tag_id' , $tag_ids)->pluck('product_id')->toArray();

            $products = Product::with('brand')->select("products.*")
                ->whereIn('id' , $product_id)
                ->where('quantity','>' , 0)
                ->where($gender , 'yes')
                ->get();
        }else if($request->session()->has('brand_ids')){

            $brand_ids = $request->session()->get('brand_ids');


            $products = Product::with('brand')
                ->where($gender , 'yes')
                ->whereIn('brand_id',$brand_ids)
                ->where('quantity','>' , 0)
                ->get();

        } else{


            $products = Product::with('brand')->select("products.*")->where('quantity','>' , 0)
                ->where($gender , 'yes')
                ->get();
        }

        if(count($products)){

            return response()->json(array('products'=> $products , 'status' => 'success') );

        }else{

            return response()->json(array('status' => 'error'));

        }
    }

    public function sty_filter(Request $request) {


        if(count($request->all())){

            $tag = Tag::whereIn('id' , $request->style_id)->pluck('id')->toArray();
            $product_id = ProductTag::whereIn('tag_id' , $tag)->pluck('product_id')->toArray();

            if ($request->session()->has('gender') && $request->session()->has('brand_ids')) {

                $gender = $request->session()->get('gender');

                $brands = $request->session()->get('brand_ids');

                $products = Product::with('brand')->select("products.*")
                    ->whereIn('id' , $product_id)
                    ->where($gender , 'yes')
                    ->whereIn('brand_id',$brands)
                    ->where('quantity','>' , 0)
                    ->get();
            }else if($request->session()->has('gender')){
                $gender = $request->session()->get('gender');

                $products = Product::with('brand')
                    ->whereIn('id' , $product_id)
                    ->where($gender , 'yes')
                    ->where('quantity','>' , 0)
                    ->get();

            }else if($request->session()->has('brand_ids')){

                $brands = $request->session()->get('brand_ids');

                $products = Product::with('brand')
                    ->whereIn('id' , $product_id)
                    ->whereIn('brand_id',$brands)
                    ->where('quantity','>' , 0)
                    ->get();

            }else{

                $products = Product::with('brand')->select("products.*")
                    ->whereIn('id' , $product_id)
                    ->where('quantity','>' , 0)
//                    ->whereIn('products.style', $tag)
                    ->get();
            }

        }else if ($request->session()->has('gender') && $request->session()->has('brand_ids')) {

            $gender = $request->session()->get('gender');

            $brands = $request->session()->get('brand_ids');

            $products = Product::with('brand')->select("products.*")
                ->where($gender , 'yes')
                ->whereIn('brand_id',$brands)
                ->where('quantity','>' , 0)
                ->get();
        } else if($request->session()->has('gender')){
                $gender = $request->session()->get('gender');

                $products = Product::with('brand')
                    ->where($gender , 'yes')
                    ->where('quantity','>' , 0)
                    ->get();


            }else if($request->session()->has('brand_ids')){


            $brands = $request->session()->get('brand_ids');

            $products = Product::with('brand')
                ->whereIn('brand_id',$brands)
                ->where('quantity','>' , 0)
                ->get();


            }else{

                $products = Product::with('brand')->select("products.*")->where('quantity','>' , 0)->get();
            }



        if(count($products)){

            return response()->json(array('products'=> $products , 'status' => 'success') );

        }else{

            return response()->json(array('status' => 'error'));

        }
    }


    public function brandSearch(Request $request){


        if(count($request->all()) ){



            $brand_ids = $request->brand_ids;

            if ($request->session()->has('gender') && $request->session()->has('tags')) {

                $gender = $request->session()->get('gender');

                $tag_ids = $request->session()->get('tags');

                $product_id = ProductTag::whereIn('tag_id' , $tag_ids)->pluck('product_id')->toArray();

                $products = Product::with('brand')->select("products.*")
                    ->whereIn('id' , $product_id)
                    ->where($gender , 'yes')
                    ->whereIn('brand_id',$brand_ids)
                    ->where('quantity','>' , 0)
                    ->get();
            }else if($request->session()->has('tags')){

                $tag_ids = $request->session()->get('tags');

                $product_id = ProductTag::whereIn('tag_id' , $tag_ids)->pluck('product_id')->toArray();

                $products = Product::with('brand')->select("products.*")
                    ->whereIn('id' , $product_id)
                    ->whereIn('brand_id',$brand_ids)
                    ->where('quantity','>' , 0)
                ->get();
            }else if($request->session()->has('gender')){

                $gender = $request->session()->get('gender');

                $products = Product::with('brand')->select("products.*")
                    ->where($gender , 'yes')
                    ->whereIn('brand_id',$brand_ids)
                    ->where('quantity','>' , 0)
                ->get();
            }else {

                $products = Product::with('brand')->select("products.*")
                    ->whereIn('brand_id',$brand_ids)
                    ->where('quantity','>' , 0)
                ->get();
            }

        }else{

            if ($request->session()->has('gender') && $request->session()->has('tags')) {

                $gender = $request->session()->get('gender');

                $tag_ids = $request->session()->get('tags');

                $product_id = ProductTag::whereIn('tag_id' , $tag_ids)->pluck('product_id')->toArray();

                $products = Product::with('brand')->select("products.*")
                    ->whereIn('id' , $product_id)
                    ->where($gender , 'yes')
                    ->where('quantity','>' , 0)
                    ->get();
            }else if($request->session()->has('gender')){

                $gender = $request->session()->get('gender');


                $products = Product::with('brand')->select("products.*")->where('quantity','>' , 0)
                    ->where($gender , 'yes')
                    ->get();


            }else if($request->session()->has('tags')){

                $tag_ids = $request->session()->get('tags');

                $product_id = ProductTag::whereIn('tag_id' , $tag_ids)->pluck('product_id')->toArray();

                $products = Product::with('brand')->select("products.*")
                    ->where('quantity','>' , 0)
                    ->whereIn('id' , $product_id)
                    ->get();

            }else{

                $products = Product::with('brand')->select("products.*")->where('quantity','>' , 0)
                    ->get();
            }

        }
        if(count($products)){

            return response()->json(array('products'=> $products , 'status' => 'success') );

        }else{

            return response()->json(array('status' => 'error'));

        }
    }

    /*public function brandSlug(){

        $brand = Brand::all();

        foreach ($brand as $b) {
            $b->slug = str_slug($b->brand_name);
            $b->save();
        }

        $tags = Tag::all();

        foreach ($tags as $b) {
            $b->slug = str_slug($b->tag_name);
            $b->save();
        }

            dd($tags);
    }*/
    public function occa_filter($slug) {

        $tag = Tag::whereSlug($slug)->first();
        $month = date("F");
        $user = Auth::User();
        $que = Queue::where('user_id', $user->id)
                ->orderby('month', $month)
                ->get();
        $style = Tag::where('type', '=', 'style')->get();
        $occasion = Tag::where('type', '=', 'occasion')->get();

        $produc = Product::select("products.*")
            ->whereRaw("find_in_set('".$tag->id."',products.occasion)")
            ->get();


        $shipping_address = Order::where("user_id", "=", $user->id)
                ->first();



        return view('pages.perfume_detail')
                        ->with('queue', $que)
                        ->with('products', $produc)
                        ->with('style', $style)
                        ->with('shipping_address', $shipping_address)
                        ->with('occasion', $occasion);
    }

    public function productTag(){



        //$products = Product::all();

        /*foreach($products as $product){


            $tags = explode(',', $product->style);
            foreach($tags as $t){

                $tag = new ProductTag();
                $tag->product_id = $product->id;
                $tag->product_id = $product->id;
                $tag->tag_id = $t;
                $tag->save();
            }


        }*/
        /*foreach($products as $product){


            $tags = explode(',', $product->occasion);
            foreach($tags as $t){

                $tag = new ProductTag();

                $tag->product_id = $product->id;
                $tag->tag_id = $t;
                $tag->save();
            }


        }*/


    }



    public function tag_filter($slug,Request $request) {


        $tag = Tag::whereSlug($slug)->first();

        if ($request->session()->has('gender') && $request->session()->has('brand')) {

            $gender = $request->session()->get('gender');
            $brand = $request->session()->get('brand');

            $brand_ids = Product::select("products.*")
                ->whereRaw("find_in_set('".$tag->id."',products.style)")
                ->where($gender,'yes')
                ->get()
                ->pluck('brand_id');
        }




        $products = Brand::join('products' , 'brands.id' , '=' , 'products.brand_id')
            ->whereIn('brands.id' , $brand_ids)
            ->where('products.quantity' , '>' , 0)
            ->select(
                'products.*',
                'brands.brand_name AS brand_name',
                'brands.id AS brand_id'
            )
            ->get();

        if(count($products)){

            return response()->json(array('products'=> $products , 'status' => 'success') );

        }else{

            return response()->json(array('status' => 'error'));

        }
    }

    public function bestSellers(){
        $month = date("F");
        $user = Auth::User();
        $que = Queue::where('user_id', $user->id)
            ->orderby('month', $month)
            ->get();
        $style = Tag::where('type', '=', 'style')->get();
        $occasion = Tag::where('type', '=', 'occasion')->get();

        $produc = Product::with('brand')->where('bestSeller','=','yes')->get();

        $shipping_address = Order::where("user_id", "=", $user->id)
            ->first();

        /*foreach ($produc as $pro) {
            $bran = Brand::where('id', $pro->brand_id)->get();
        }*/

        return view('pages.perfume_detail')
            ->with('queue', $que)
            ->with('products', $produc)
            ->with('style', $style)
            ->with('shipping_address', $shipping_address)
            ->with('occasion', $occasion);
    }

    public function newArrivals(){
        $month = date("F");
        $user = Auth::User();
        $que = Queue::where('user_id', $user->id)
            ->orderby('month', $month)
            ->get();
        $style = Tag::where('type', '=', 'style')->get();
        $occasion = Tag::where('type', '=', 'occasion')->get();

        $produc = Product::with('brand')->where('newArrivals','=','yes')->get();

        $shipping_address = Order::where("user_id", "=", $user->id)
            ->first();

        /*foreach ($produc as $pro) {
            $bran = Brand::where('id', $pro->brand_id)->get();
        }*/

        return view('pages.perfume_detail')
            ->with('queue', $que)
            ->with('products', $produc)
            ->with('style', $style)
            ->with('shipping_address', $shipping_address)
            ->with('occasion', $occasion);
    }

    public function featured(){
        $month = date("F");
        $user = Auth::User();
        $que = Queue::where('user_id', $user->id)
            ->orderby('month', $month)
            ->get();
        $style = Tag::where('type', '=', 'style')->get();
        $occasion = Tag::where('type', '=', 'occasion')->get();

        $produc = Product::with('brand')->where('Featured','=','yes')->get();

        $shipping_address = Order::where("user_id", "=", $user->id)
            ->first();

        /*foreach ($produc as $pro) {
            $bran = Brand::where('id', $pro->brand_id)->get();
        }*/

        return view('pages.perfume_detail')
            ->with('queue', $que)
            ->with('products', $produc)
            ->with('style', $style)
            ->with('shipping_address', $shipping_address)
            ->with('occasion', $occasion);
    }
    public function searchforwomen(){
        $month = date("F");
        $user = Auth::User();
        $que = Queue::where('user_id', $user->id)
            ->orderby('month', $month)
            ->get();
        $style = Tag::where('type', '=', 'style')->get();
        $occasion = Tag::where('type', '=', 'occasion')->get();
        $produc = Product::where('women','=','yes')->get();
        $shipping_address = Order::where("user_id", "=", $user->id)
            ->first();
        return view('pages.perfume_detail')
            ->with('queue', $que)
            ->with('products', $produc)
            ->with('style', $style)
            ->with('shipping_address', $shipping_address)
            ->with('occasion', $occasion);
    }
    public function forget_view(){
        return view('forms.forget');
    }
    public function verify_email($code){
        $data['is_verified'] = "Y";
        $use = User::where('rand_id',$code)->first();
        if(!is_null($use)) {
            User::where('rand_id', $code)
                ->update($data);
            $massege = "Your email is verified";
        }else{
            $massege = "user not exist";

        }
        return view('verify_email')
            ->with('massege',$massege);
    }

}
