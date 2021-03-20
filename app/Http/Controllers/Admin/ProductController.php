<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use function PHPUnit\Framework\fileExists;

class ProductController extends Controller
{
   public function products(){
       $products = Product::with(['section','category'])->get();
     return view('admin.products.products')->with(compact('products'));

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
            $productData =   Product::where('id',$id)->first();
            $getProducts =  Product::all();
            $product = Product::find($id);
            $message = "product updated successfully";
        }
        $getCategories = Category::all();
        if($request->isMethod('post')){

            $data= $request->all();

         if(empty( $data['description'])){
                 $data['description'] = "";
             }
             if(empty( $data['meta_title'])){
                 $data['meta_title'] = "";
             }
             if(empty( $data['meta_description'])){
                 $data['meta_description'] = "";
             }
             if(empty( $data['meta_keywords'])){
                 $data['meta_keywords'] = "";
             }
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
            if ($request->hasFile('main_image')) {
                //  Let's do everything here
                $img_tmp = $request->file('main_image');
                if ($img_tmp->isValid()) {
                    //get image extension
                    $extension =$img_tmp->getClientOriginalExtension();
                    //generate new image name
                    $imageName =rand(111,9999).".".$extension;
                    $imagePath = '/images/product_image/'.$imageName;
                    // upload image
                    Image::make($img_tmp)->resize(300,400)->save(public_path($imagePath));
                     }
            }  else
            {
                $imageName ="";
            }
            $product->category_id=$data['category_id'];
            $product->section_id=$data['section_id'];
            $product->product_name = $data['product_name'];
            $product->description = $data['description'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            $product->product_price = $data['product_price'];
            $product->product_discount = $data['product_discount'];
            $product->product_weight = $data['product_weight'];
            $product->main_image = $imageName;
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
    public function deleteProduct($id){
        $message =   __('messages.delete_product');
        Product::where('id',$id)->delete();
//     Session()->flash("success_message",$message);
        return redirect()->back()->with("success_message",$message);
    }
    public function deleteProductImage($id){

        $productImage = Product::select('main_image')->where('id',$id)->first();

        //get category Image  path

        $productImagePath = 'images/product_image/';

        if(fileExists($productImagePath.$productImage)){

            unlink($productImagePath.$productImage->main_image);

        }

        Product::where('id',$id)->update(['main_image'=>'']);

        return redirect()->back()->with('flash_message_success',__('messages.delete_image_product'));

    }
}
