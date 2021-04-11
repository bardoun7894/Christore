<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Section;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{


 public function brands(){
    Session::put('page','brands');
    $brands = Brand::all();
    return view('admin.brands.brand')->with(compact('brands'));
 }
 public function addEditBrand(Request $request,$id = null){
     if($id==""){
         $brandData=array();
         $title ="add Brand";
         $brands = new Brand();
         $message=__('messages.add_success');
     }else{
              $brandData=Brand::select('name')->where('id',$id)->first();
              $brands=Brand::find($id);
              $title ="edit Brand";
              $message=__('messages.update_success');
       }
     if($request->isMethod('post')){

         $data = $request->all();
         $brands->name = $data['brand_name'];
         $brands->save();

         return  redirect('/admin/brand')->with('flash_message_success',$message);
     }
     return view('admin.brands.add_edit_brand')->with(compact(['brands','title','brandData']));
 }

 public function updateBrandStatus(Request $request){
     if($request->ajax()){
         $data= $request->all();
        response()->json([$data]);
         if($data['status']==="active"){
             $status =0;
         }else{
             $status =1;
         }
         Brand::where('id',$data['brand_id'])->update(['status'=>$status]);
         return response()->json(['status'=>$status,'brand_id'=>$data['brand_id']]);
     }

 }

public function deleteBrand($id){

 Brand::where('id',$id)->delete();
 return redirect()->back()->with('flash_message_success',__('messages.delete_brand'));

}

}
