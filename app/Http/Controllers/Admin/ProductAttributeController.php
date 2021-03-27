<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductAttributeController extends Controller
{
  public function EditProductAttributes($id,Request $request){

    if($request->isMethod('post')){
        $data = $request->all();
        foreach ($data['attr_id'] as $key=>$attr){
            if (!empty($attr)){
                ProductAttribute::where('id',$data['attr_id'][$key])->update([
                    'stock'=>$data['stock'][$key],'price'=>$data['price'][$key]
                ]);
                 }
            }

        $message = __('messages.update_success') ;
        Session::flash('success_message',$message);
        return  redirect()->back();
    }
}
    public function deleteProductAttribute($id){
        $message =   __('messages.delete_product');
        ProductAttribute::where('id',$id)->delete();
//     Session()->flash("success_message",$message);
        return redirect()->back()->with("success_message",$message);
    }
public function addAttributes(Request $request,$id)
{

    $productData =Product::find($id);

    $pros = ProductAttribute::where('product_id',$id)->get();
    $productData = json_decode(json_encode($productData),true);
    $productAttributes = new ProductAttribute();
    if($request->isMethod('post')){

        $data=$request->all();
        foreach($data['sku'] as $key=>$value){
            if(!empty($value)){
                $attrcheckSku =ProductAttribute::where('sku',$value)->count()  ;
                if($attrcheckSku>0){
                    $message = __('messages.sku_message') ;
                    Session::flash('error_message',$message);
                    return redirect()->back();
                }
                $attrcheckSize =ProductAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count()  ;
                if($attrcheckSize>0){
                    $message = __('messages.size_message') ;
                    Session::flash('error_message',$message);
                    return redirect()->back();
                }
                $productAttributes->product_id =$id;
                $productAttributes->size =  $data['size'][$key];
                $productAttributes->sku =   $value;
                $productAttributes->price = $data['price'][$key];
                $productAttributes->stock = $data['stock'][$key];
                $productAttributes->status = 1;
                $productAttributes->save();

            }

        }

        $message = __('messages.add_success') ;
        Session::flash('success_message',$message);
    }
    return redirect()->back();
}
 public function moveaddAttributes($id){
     $productData =Product::find($id);
     $pros = ProductAttribute::where('product_id',$id)->get();
     $productData = json_decode(json_encode($productData),true);
     return view('admin.products.add_product_attributes')->with(compact(['productData','pros']));
 }
public function updateAttributeStatus(Request $request){
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

    ProductAttribute::where('id',$data['attr_id'])->update(['status'=> $status]);
    return response()->json([ 'status'=>$status,'attr_id' => $data['attr_id']]);
}
}
