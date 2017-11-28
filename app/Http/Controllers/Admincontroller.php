<?php

namespace App\Http\Controllers;

use App\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\perfumes;
use App\Brand;
use App\Product;
use App\input;
use App\Tag;
use App\User;
use App\Queue;
use App\Order;
use App\Price;
use session;
use App\Stock;
use \PDF;
use\Response;
use Dompdf\Dompdf;
use\Carbon;
use Mail;

class Admincontroller extends Controller {
    /* Login View */
    public function loginview() {
        return view('adminpanel.login');
    }

    public function loginAdmin(Request $request) {
        if ($request->email == "perfumeclube@gmail.com" && $request->password == "sultan@123") {
            return Redirect::to('dashbord');
        }
        return Redirect::to('adminpanel');
    }

    /* LogOut Fouction */

    public function logout() {
        return Redirect::to('adminpanel');
    }

    /* Start Crud of Brands */
    /* Store data into database of Brands */

    public function insertBrand(Request $request) {
        $input = $request->all();
        if ($request->hasfile('images')) {
            $file = $request->file('images');
            $tmpFilePath = '/images/images/';
            $tmpFileName = time() . '-' . $file->getClientOriginalName();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;

            $input['image'] = $path;
        }
        $input['slug'] = str_slug($input['brand_name']);
        Brand::create($input);
        return redirect('/view_panel');
    }

//view Function of brands
    public function addBrand(Request $request) {

        return view('adminpanel.addBrand');
    }

//view Panel of brands

    public function view_panel() {
        $brand = Brand::orderby('brand_name', 'asc')
                ->get();

        return view('adminpanel.admin')
                        ->with('brands', $brand);
    }

    //Edit function of brands
    public function edit($id) {
        $brnd = Brand::find($id);
        return view('adminpanel.editBrand')
                        ->with('brnds', $brnd);
    }

    //Update function of brands
    public function update(Request $request, $id) {
        $data = $request->input();
        $brand = Brand::findOrFail($id);
        //print_r($data);exit();
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $tmpFilePath = '/images/images/';
            $tmpFileName = time() . '-' . $file->getClientOriginalName();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
//            $name = $file->getClientOriginalName();
//            $file->move('/images/images', $name);
//            /*$dataup['image'] = $name;*/
            $dataup['brand_name'] = $data['brand_name'];
            $dataup['slug'] =str_slug($data['brand_name']);
            $dataup['image'] = $path;
        } else {
            $dataup['brand_name'] = $data['brand_name'];
            $dataup['slug'] =str_slug($data['brand_name']);
        }


        Brand::where('id', $id)
                ->update($dataup);

        return redirect('/view_panel');
    }

//Delete function of brands
    public function destroy($id) {

        Brand::find($id)->delete();
        Product::where('brand_id', $id)->delete();
        return redirect('/view_panel');
    }

//Products Add
    public function insertProducts(Request $request) {
        $data = $request->input();

        if ($request->hasfile('images')) {
            $file = $request->file('images');
            $tmpFilePath = '/images/images/';
            $tmpFileName = time() . '-' . $file->getClientOriginalName();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
            $dataProduct['image'] = $path;
        }

        $dataProduct["brand_id"] = $data['brand_name'];
        $dataProduct['product_name'] = $data['product_name'];
        $dataProduct['description'] = $data['description'];




        if(isset($data['men']))
        {
            $dataProduct['men'] = 'yes';
        }
        if(isset($data['women']))
        {
            $dataProduct['women'] = 'yes';
        }
        
        if(isset($data['bestSeller']))
        {
            $dataProduct['bestSeller'] = 'yes';
        }
        if(isset($data['newArrivals']))
        {
            $dataProduct['newArrivals'] = 'yes';
        }
        if(isset($data['Featured']))
        {
            $dataProduct['Featured'] = 'yes';
        }

        $dataProduct['style'] = implode(',', $data['style_name']);
        $dataProduct['occasion'] = implode(',', $data['occasion']);
        $product = Product::create($dataProduct);



        foreach($data['style_name'] as $style){

            $tag = new ProductTag();
            $tag->product_id = $product->id;
            $tag->tag_id = $style;
            $tag->save();
        }

        foreach($data['occasion'] as $occasion){
            $tag = new ProductTag();
            $tag->product_id = $product->id;
            $tag->tag_id = $occasion;
            $tag->save();
        }

        return redirect('/productView');
    }

//Product
    public function products(Request $request) {

        $brand = Brand::orderby('brand_name', 'asc')
                ->get();
        $style = Tag::orderby('id', 'asc')
                ->where('type', 'style')
                ->get();
        $occasion = Tag::orderby('id', 'asc')
                ->where('type', 'occasion')
                ->get();

        return view('adminpanel.product')
                        ->with('brands', $brand)
                        ->with('styles', $style)
                        ->with('occasions', $occasion);
    }

//Products View
    public function product_view() {


        $products = Product::join('brands' , 'products.brand_id' , '=' , 'brands.id')
                    ->select(
                        'brands.*',
                        'products.*',
                        'products.quantity AS quantity'
                    )
                    ->orderBy('brand_name', 'asc')
                    ->get();


        return view('adminpanel.productView')
                        ->with('products', $products);
    }

    //Products Edit
    public function editProducts($id) {

        $product = Product::find($id);

        $brand = Brand::orderby('brand_name', 'asc')
                ->get();

        $style = Tag::orderby('id', 'asc')
                ->where('type', 'style')
                ->get();
        $occasion = Tag::orderby('id', 'asc')
                ->where('type', 'occasion')
                ->get();

        $selected_styles = explode(',',$product->style);
        $selected_occasion = explode(',',$product->occasion);
//        dd($product);
        return view('adminpanel.editproduct')
                        ->with('products', $product)
                        ->with('brands', $brand)
                        ->with('styles', $style)
                        ->with('occasions', $occasion)
                        ->with('selected_occasion', $selected_occasion)
                        ->with('selected_styles', $selected_styles);
    }

//Products Update
    public function updateProducts(Request $request, $id) {
        $datapro = $request->input();

        $product = Product::findOrFail($id);
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $tmpFilePath = '/images/images/';
            $tmpFileName = time() . '-' . $file->getClientOriginalName();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;

            $productup['image'] = $path;
        } /*else {
            $productup['brand_id'] = $datapro['brand_name'];
            $productup['product_name'] = $datapro['product_name'];
//
//            $productup['style'] = implode(',', $datapro['style_name']);
//            $productup['occasion'] = implode(',', $datapro['occasion']);

        }*/

        $productup['description'] = $datapro['description'];

        $productup['brand_id'] = $datapro['brand_name'];
        $productup['product_name'] = $datapro['product_name'];
        $productup['style'] = implode(',', $datapro['style_name']);
        $productup['occasion'] = implode(',', $datapro['occasion']);

        if(isset($datapro['men']))
        {
            $productup['men'] = 'yes';
        }
        if(isset($datapro['women']))
        {
            $productup['women'] = 'yes';
        }

        if(isset($datapro['bestSeller']))
        {
            $productup['bestSeller'] = 'yes';
        }
        if(isset($datapro['newArrivals']))
        {
            $productup['newArrivals'] = 'yes';
        }
        if(isset($datapro['Featured']))
        {
            $productup['Featured'] = 'yes';
        }


        Product::where('id', $id)
                ->update($productup);

        $product->tags()->delete();

        foreach($datapro['style_name'] as $style){

            $tag = new ProductTag();
            $tag->product_id = $product->id;
            $tag->tag_id = $style;
            $tag->save();
        }

        foreach($datapro['occasion'] as $occasion){
            $tag = new ProductTag();
            $tag->product_id = $product->id;
            $tag->tag_id = $occasion;
            $tag->save();
        }

        return redirect('/productView');
    }

//Products Delete
    public function destroyProduct($id) {

        Product::find($id)->delete();
        Queue::where('product_id', $id)->delete();

        return response()->json(array("status" => "success"));
//        return redirect('/productView');
    }

    //User View

    public function user_view() {

        $order = Order::orderby('id', 'asc')
                ->paginate(15);
        return view('adminpanel.userView')
                        ->with('orders', $order);
    }

    /* User Queue Fouction */

    public function user_que($id) {
        $que = Queue::where('user_id', $id)
                ->orderby('id', 'desc')
                ->where("status","=","processing")
                ->orwhere("status","=","complete")
                ->get();
        return view('adminpanel.user_queue')
                       ->with('id',$id)
                        ->with('queue', $que);
    }

    /* Change Status Function */

    public function chang_status($id)
    {

        $st['status'] = "complete";
        $queu = Queue::where('id', $id)->first();
        $que = Queue::where('user_id', $queu->user_id)
            ->where('month', $queu->month)
            ->where('year', $queu->year)->get();
        foreach ($que as $q){
            if (strtolower($q->status) == 'processing') {
                $data['brand_id'] = $q->brand_id;
                $data['product_id'] = $q->product_id;
                $data['user_id'] = $q->user_id;
                Stock::create($data);
                $qu = Queue::where('id', $q->id)
                    ->update($st);
                            $prod = Product::where('id', $q->product_id)->decrement('quantity');

            }
    }

        $user =User::where('id',$queu->user_id)->first();
        $subiect="Order status in perfumeclube";
        $email="noreply@perculb.pk";
        $emailto=$user->email;
        $status = "complete";

        Mail::send('emails.order_status', [
            'email'=>$email,
            'status'=>$status,
            'queue'=>$que
        ], function($m) use($email, $subiect, $emailto) {
            $m->from($email);
            $m->to($emailto)->subject($subiect);
        });

        return view('adminpanel.invoice')
            ->with('queue',$que);

    }
    public function pdf($id){


        $queu = Queue::where('id', $id)->first();
        $que =Queue::where('user_id',$queu->user_id)
            ->where('month',$queu->month)
            ->where('year',$queu->year)->get();



        view()->share('queue',$que);
        $pdf = PDF::loadView('adminpanel.pdfInvoice');
        
        return $pdf->download('invoice.pdf');

//        $pdf->save(base_path('public/pdffiles/pdf'))->stream();

    //    return response()->download(public_path().'/pdf');

//        return response()->download(public_path().'pdffiles/pdf')->deleteFileAfterSend(true);

    }


    /* Tag Function */

    public function tag() {
        return view('adminpanel.tag');
    }

    /* Insert Tag */

    public function insertTag(Request $request) {

        if ($request->hasfile('images')) {
            $file = $request->file('images');
            $tmpFilePath = '/images/images/';
            $tmpFileName = time() . '-' . $file->getClientOriginalName();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
            $request['image'] = $path;
        } {
            $request->merge([
                'type' => implode(',', (array) $request->get('type'))
            ]);
            $request['slug'] = str_slug($request['tag_name']);;
            Tag::create($request->all());
            /* return'data saved'; */

            return redirect('/tagView');
        }
    }

    /* Tag view Functon */

    public function tagView() {

        $tag = Tag::orderby('tag_name', 'asc')
                ->get();
        return view('adminpanel.tagView')
                        ->with('tags', $tag);
    }

    /* Edit Tag */

    public function editTag($id) {
        $tag = Tag::find($id);

        return view('adminpanel.editTag')
                        ->with('tags', $tag);
    }

    public function updateTags(Request $request, $id) {
        $datatags = $request->input();
        $tags = Tag::findOrFail($id);
        if ($request->hasfile('images')) {
            $file = $request->file('images');
            $tmpFilePath = '/images/images/';
            $tmpFileName = time() . '-' . $file->getClientOriginalName();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
            $tag['image'] = $path;
        }

        $tag['type'] = implode(',', (array) $request->get('type'));

        $tag['tag_name'] = $datatags['tag_name'];
        $tag['slug'] =str_slug($datatags['tag_name']);
        Tag::where('id', $id)
                ->update($tag);

        return redirect('/tagView');
    }

    /* Delete Tag Fuction */

    public function destroyTags($id) {
        Tag::find($id)->delete();
        return redirect('/tagView');
    }

    public function dashbordView() {

        $dashque = Queue::where("status","=","processing")
                ->orderby('id', 'asc')->get();
        $brand = Brand::all()
                ->count();
        $product_count = Product::all()
                ->count();

        $orders_count = Queue::where("status","=","processing")->get()
                ->count();
        $users_count = User::whereHas('address')
                ->count();

        return view('adminpanel.dashbord')
                        ->with('dashques', $dashque)
                        ->with('pro_count', $product_count)
                        ->with('order_count', $orders_count)
                        ->with('users_count', $users_count)
                        ->with('brand_count', $brand);
    }

    public function queueorders($id) {

        $queorder = Queue::where('user_id', $id)
                    ->where("status","=","processing")
                    ->get();
        
        $queueUser =User::where("id","=",$id)
                ->first();
        
        return view('adminpanel.queueOrder')
                        ->with('queueUser',$queueUser)
                        ->with('queords', $queorder);
    }
    
    public function queueorders_sepc($id){
        $que =Queue::where('id',$id)->first();
        $queorder =Queue::where('user_id',$que->user_id)
            ->where('month',$que->month)
            ->where('year',$que->year)->get();
//        $queorder = Queue::where('id', $id)
//                    ->where("status","=","processing")
//                    ->get();
        
        $queueUser = User::
            where('id',$que->user_id)
                ->first();
        
        return view('adminpanel.queueOrder')
                        ->with('queueUser',$queueUser)
                        ->with('queords', $queorder);
    }
    
    public function completedOrders($id){
        $que =Queue::where('id',$id)->first();
        $queorder =Queue::where('user_id',$que->user_id)
            ->where('month',$que->month)
            ->where('year',$que->year)
            ->where("status","=","complete")->get();
//        $queorder = Queue::where('id', $id)
//                    ->where("status","=","complete")
//                    ->get();
//
        $queueUser = Auth::user("id","=",$que->user_id)
                ->first();
        
        return view('adminpanel.queueOrderCompleted')
                        ->with('queueUser',$queueUser)
                        ->with('queords', $queorder);
    }


    public function editQueorders($id) {
        $editqueodr = Queue::find($id);
        $brand = Brand::where("id", $editqueodr->brand_id)->get();
        $product = Product::where("id", $editqueodr->product_id)->get();
        $user = User::where("id", $editqueodr->user_id)->first();
        /* echo("<pre>");
          print_r($editqueodr);
          echo("</pre>");
          exit(); */
        return view('adminpanel.editQueueOrder')
                        ->with('brands', $brand)
                        ->with('products', $product)
                        ->with('user', $user)
                        ->with('editqueodrs', $editqueodr);
    }

    public function updteQueOdr(Request $request, $id) {
        $updateque = $request->input();
        unset($updateque['_token']);
//        $queorder['user_id'] = $updateque['user_name'];
        $queorder['brand_id'] = $updateque['brand_name'];
        $queorder['product_id'] = $updateque['product_name'];
        $queorder ['month'] = $updateque['month'];
        $queorder ['year'] = $updateque['year'];
        $queorder ['status'] = $updateque['status'];
//        
        Queue::where('id', $id)
                ->update($queorder);

        return redirect('/order_view_completed');
    }

//Order
    public function order_view() {
        $que = Queue::orderby('user_id', 'asc')->get();
        return view('adminpanel.orderViewQue')
                        ->with('queue', $que);
    }
    
    
    public function order_view_completed() {
        $que = Queue::where("status","=","complete")
                ->orderby('user_id', 'asc')->get();
        return view('adminpanel.orderViewQue')
                        ->with('queue', $que);
    }

    public function eidtOrderQue($id) {

        $orderStats = Queue::find($id);
        return view('adminpanel.editOrderQue')
                        ->with('orderStatus', $orderStats);
    }

    public function updateStatus(Request $request, $id) {
        $changestus = $request->input();
        $updtsts['status'] = $changestus['status'];

        $queu = Queue::where('id', $id)->first();
        $que = Queue::where('user_id', $queu->user_id)
            ->where('month', $queu->month)
            ->where('year', $queu->year)->get();
        foreach ($que as $q){
            if ($q->status == 'processing') {
                $data['brand_id'] = $q->brand_id;
                $data['product_id'] = $q->product_id;
                $data['user_id'] = $q->user_id;
                Stock::create($data);
                $qu = Queue::where('id', $q->id)
                    ->update($updtsts);
                $prod = Product::where('id', $q->product_id)->decrement('quantity');

            }
        }

//        Queue::where('id', $id)
//                ->update($updtsts);
//
        $userQueue = Queue::where('id', $id)
                ->first();

        
        
        return redirect('/completed-orders/'.$userQueue->id);
    }
    public function expired_subscription(){


        $expiridata= Order::whereDate('created_at', '<=', '2017-04-30 06:10:55')

            ->get();
        return view('adminpanel.expireSubcription')
            ->with('expireddata',$expiridata);

}
public function produ_stock(){

    $stock = Stock::with(['brand' , 'product'])->get();

    return view('adminpanel.productstock')
        ->with('stocks',$stock);

}
public function new_stock(){
    return view('adminpanel.new_stock');
}
public function add_stock(Request $request){
    $data =$request->input();
    $Pro= Product::where('id',$data['product_id'])->increment('quantity',$data['quantity']);
    return response()->json(array("status" => "success"));
}
public function get_product(Request $request){
    $data=$request->input();
    $pro=Product::where('brand_id',$data['id'])->get();
    return response()->json($pro);
}
public function getstock(Request $request){

    $data=$request->input();

    $stock = Stock::with('brand' , 'product')->where('product_id',$data['id'])->get();


    return response()->json($stock);

}
public function invoice_email($id){

    $queu = Queue::where('id', $id)->first();
    $que =Queue::where('user_id',$queu->user_id)
        ->where('month',$queu->month)
        ->where('year',$queu->year)->get();
    $user = User::where('id',$queu->user_id)->first();
    $subiect="Invice";
    $email="noreply@perculb.pk";
    $emailto=$user->email;


    Mail::send('emails.invoice', [
        'email'=>$email,
        'queue'=>$que
    ], function($m) use($email, $subiect, $emailto) {
        $m->from($email);
        $m->to($emailto)->subject($subiect);
    });
    return response()->json(array("status" => "success"));
}
public function user_delete($id){

    Order::where('user_id',$id)->delete();
    Queue::where('user_id',$id)->delete();
    User::find($id)->delete();
    return response()->json(array("status" => "success"));
}
public function que_delete($id){

    $qu =Queue::where('id',$id)->first();
    $q =Queue::where('month',$qu->month)
        ->where('user_id',$qu->user_id)
        ->where('year',$qu->year)->get();

    foreach ($q as $que) {
        Queue::where('id', $que->id)->delete();
    }
    return response()->json(array("status" => "success"));
}
}
