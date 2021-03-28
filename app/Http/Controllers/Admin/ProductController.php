<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use function PHPUnit\Framework\fileExists;

class ProductController extends Controller
{
   public function products(){
       $products = Product::with(['section','category'])->get();
     return view('admin.products.products')->with(compact('products'));

   }
   public function addImages(Request $request,$id){
       $productData = Product::with('images')->select('id','product_name','product_color','product_code','main_image')->where('id',$id)->first();
//    echo "<pre>"; dd(json_decode(json_encode($productData)),true);die;

       if($request->isMethod('post')){

        if($request->hasfile('images'))
         {
             $images =$request->file('images');
             foreach($images as $key=>$image)
            {
            $productImage= new ProductImage();

            $image_tmp=Image::make($image);
            $extension=$image->getClientOriginalExtension();
            $image_name= rand(100,99999).time().".".$extension;
            //make path for small medium large images
            $large_image_temp="images/product_image/large/".$image_name;
            $medium_image_temp="images/product_image/medium/".$image_name;
            $small_image_temp="images/product_image/small/".$image_name;
            //upload image  with different sizes
            Image::make($image_tmp)->save($large_image_temp);
            Image::make($image_tmp)->resize(520,600)->save($medium_image_temp);
            Image::make($image_tmp)->resize(260,300)->save($small_image_temp);

            $productImage->image= $image_name;
            $productImage->product_id =$id;
            $productImage->save();
            }
             $message = __('messages.add_success') ;
             Session::flash('success_message',$message);
         }

           return redirect()->back();
       }
     return view('admin.products.add_product_images')->with(compact('productData'));

   }
    public function addEditProduct(Request $request,$id = null ){

        if($id == ""){
            $title = 'Add Product';
            $product = new Product();
            $productData= array();
            $getProducts = array();
            $getCategories = array();
            $message = "products added successfully";
        }else{
            $title = 'Edit Category' ;
            $productData =Product::where('id',$id)->first();
            $getProducts =  Product::all();
            $product = Product::find($id);
            $message = "product updated successfully";
             }
        $getCategories = Category::all();
        if($request->isMethod('post')){

            $data= $request->all();

            $rules =
                [
                'product_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'product_code' => 'required|regex:/^[\w-]*$/',
                'product_color' => 'required',
                'product_price' => 'required|numeric',
                'product_weight' => 'required|numeric',
                'section_id' => 'required',
                'category_id' => 'required',
                'main_image' => 'image|max:10000' // max 10000kb
                ];

            $this->validate($request, $rules, __('validation'));
            if ($request->hasFile('product_image') ) {
                //  Let's do everything here
                $image = $request->file('product_image');

                   $image_tmp=Image::make($image);

                    $extension=$image->getClientOriginalExtension();
                    $image_name= rand(100,99999).time().".".$extension;
                    //make path for small medium large images
                    $large_image_temp="images/product_image/large/".$image_name;
                    $medium_image_temp="images/product_image/medium/".$image_name;
                    $small_image_temp="images/product_image/small/".$image_name;
                    //upload image  with different sizes
                    Image::make($image_tmp)->save($large_image_temp);
                    Image::make($image_tmp)->resize(520,600)->save($medium_image_temp);
                    Image::make($image_tmp)->resize(260,300)->save($small_image_temp);

             }  else
            {
                $image_name ="";
            }

//            echo "<pre>";print_r(json_decode(json_encode($data)));die();

            $product->category_id=$data['category_id'];
            $product->section_id=$data['section_id'];
            $product->product_name = $data['product_name'];
            $product->description = $data['description'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            $product->product_price = $data['product_price'];
            $product->product_discount = $data['product_discount'];
            $product->product_weight = $data['product_weight'];

             if($image_name!=""){
                 $product->main_image = $image_name;

             }

//          print_r($imageName);die;
            if($request->has('is_featured')){
                $product->is_featured= 'Yes';
            }else{
                $product->is_featured= 'No';
            }

            $product->fabric= $data['fabric'];
            $product->product_video = "";
            $product->meta_title =  $data['meta_title'];
            $product->meta_description = $data['meta_description'];
            $product->meta_keywords =  $data['meta_keywords'];
            $product->status =  1 ;
            $product->save();
            Session()->flash("success_message",$message);
            return  redirect('/admin/products');
        }
        $fabricArray =array('cotton','polister','threed');
        $getSections =Section::get()->where('status',1);
        return view('admin.products.add_edit_product')->with( compact('title','fabricArray','getSections','getCategories','productData','getProducts') );
    }
   public function updateProductStatus(Request $request){
       if ($request->ajax())
       {
         $data = $request->all();
           if ( $data['status'] === "active")
             {
            $status = 0;
             }
           else
             {
             $status =1 ;
             }

       }

       Product::where('id',$data['product_id'])->update(['status'=> $status]);
       return response()->json([ 'status'=>$status,'product_id' => $data['product_id']]);
   }
   public function updateProductImageStatus(Request $request){
       if ($request->ajax())
       {
         $data = $request->all();
           if ( $data['status'] === "active")
             {
            $status = 0;
             }
           else
             {
             $status =1 ;
             }

       }

       ProductImage::where('id',$data['product_image_id'])->update(['status'=> $status]);
       return response()->json([ 'status'=>$status,'product_image_id' => $data['product_image_id']]);
   }
    public function deleteProduct($id){
        Product::where('id',$id)->delete();
//     Session()->flash("success_message",$message);
        $message =   __('messages.delete_product');
        return redirect()->back()->with("success_message",$message);
    }
    public function deleteProductImage($id){

        $productImage = Product::select('main_image')->where('id',$id)->first();

        //get category Image  path

        $productLargeImagePath = 'images/product_image/large/';
        $productMediumImagePath = 'images/product_image/medium/';
        $productSmallImagePath = 'images/product_image/small/';

        if(fileExists($productLargeImagePath.$productImage)){
            unlink($productLargeImagePath.$productImage->main_image);
        }
        if(fileExists($productMediumImagePath.$productImage)){
            unlink($productMediumImagePath.$productImage->main_image);
        }
        if(fileExists($productSmallImagePath.$productImage)){
            unlink($productSmallImagePath.$productImage->main_image);
        }

        Product::where('id',$id)->update(['main_image'=>'']);

        return redirect()->back()->with('flash_message_success',__('messages.delete_image_product'));

    }
    public function deleteProductImages($id){
       $productImage= ProductImage::select('image')->where('id',$id)->first();
        $productLargeImagePath = 'images/product_image/large/';
        $productMediumImagePath = 'images/product_image/medium/';
        $productSmallImagePath = 'images/product_image/small/';
        if(fileExists($productLargeImagePath.$productImage)){
            unlink($productLargeImagePath.$productImage->image);
        }
        if(fileExists($productMediumImagePath.$productImage)){
            unlink($productMediumImagePath.$productImage->image);
        }
        if(fileExists($productSmallImagePath.$productImage)){
            unlink($productSmallImagePath.$productImage->image);
        }
        $productImage->where('id',$id)->delete();
        $message =   __('messages.delete_product');
        return redirect()->back()->with("success_message",$message);
    }


}
