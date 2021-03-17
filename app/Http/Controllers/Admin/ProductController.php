<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function products(){
       $products = Product::with(['section','category'])->get();
     return view('admin.products')->with(compact('products'));

   }
    public function addEditProduct(Request $request,$id = null ){
        if($id == ""){
            $title = 'Add Product';
            $product = new Product();
//          $categoryData = array();
            $getProducts = array();
            $message = "products added successfully";
        }else{
            $title = 'Edit Category' ;
            $productData = Product::where('id',$id)->first();
            $getProducts = Product::get();
            $product = Product::find($id);
            $message = "product updated successfully";
        }
        if($request->isMethod('post')){
            $data=$request->all();

//             if(empty( $data['description'])){
//                 $data['description'] = "";
//             }
             if(empty( $data['meta_title'])){
                 $data['meta_title'] = "";
             }
             if(empty( $data['meta_description'])){
                 $data['meta_description'] = "";
             }
             if(empty( $data['meta_keywords'])){
                 $data['meta_keywords'] = "";
             }
//            $rules = [
//                'category_name' => 'required|regex:/^[\pL\s\-]+$/u',
//                'section_id' => 'required',
//                'url' => 'required',
//                'category_image' => 'image|max:10000' // max 10000kb
//            ];

//            $this->validate($request, $rules, __('validation'));

//            if ($request->hasFile('category_image')) {
//                //  Let's do everything here
//                $img_tmp = $request->file('category_image');
//                if ($img_tmp->isValid()) {
//                    //get image extension
//                    $extension =$img_tmp->getClientOriginalExtension();
//                    //generate new image name
//                    $imageName =rand(111,9999).".".$extension;
//                    $imagePath = '/images/category_image/'.$imageName;
//                    // upload image
//                    Image::make($img_tmp)->resize(300,400)->save(public_path($imagePath));
//                     }
//            }  else
//            {
//                $imageName ="";
//            }
            $product->name = $data['name'];
            $product->description = $data['description'];
            $product->code = $data['code'];
            $product->color = $data['color'];
            $product->product_price = $data['product_price'];
            $product->product_discount = $data['product_discount'];
            $product->product_weight = $data['product_weight'];
            $product->main_image = $data['main_image'];
            $product->wash_care = $data['wash_care'];
//            $product->fabric= $data['fabric'];
//            $product->pattern= $data['pattern'];
//            $product->sleeve= $data['sleeve'];
//            $product->fit= $data['fit'];
            $product->product_video = $data['product_video'];
//          $category->category_image =  $imageName;
            $product->meta_title =  $data['meta_title'];
            $product->meta_description = $data['meta_description'];
            $product->meta_keywords =  $data['meta_keywords'];
            $product->status =  1 ;
            $product->save();
            Session()->flash("success_message",$message);
            return  redirect('/admin/products');
        }
        $getSections =Section::get();
        return view('admin.categories.add_edit_product')->with( compact('title','getSections','productData','getProducts') );
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
}
