<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use function PHPUnit\Framework\fileExists;

class BannerController extends Controller
{
 public function banners(){
     Session::put('page','banners');
     $banners=Banner::all();
     return view('admin.banners.banners')->with(compact('banners'));
 }

 public function deleteBanner($id)
 {
         $existBanner=Banner::find($id);

     $image_path="images/banner_images/".$existBanner->image;
     if(fileExists($image_path)){
         unlink($image_path);
     }
         $existBanner->delete();
         return redirect('/admin/banner')->with('flash_message_success',__('messages.delete_banner'));
 }
 public function addEditBanner(Request $request,$id = null)
 {
     if ($id==""){
         $title ='add banner';
         $bannerData =array();
         $banner =new Banner();
         $message = __('messages.add_success');
     }else {
         $banner=Banner::find($id);
         $bannerData=json_decode(json_encode($banner),true);
         $title ='edit banner';
         $message = __('messages.update_success');

     }

     if ($request->isMethod('post')){
         $data =$request->all();


         if($request->hasfile('banner_image'))
         {
             $image =$request->file('banner_image');
             $image_temp=  Image::make($image);
                 $extension=$image->getClientOriginalExtension();
                 $image_name= rand(100,99999).time().".".$extension;
                 //make path for small medium large images
                $image_path="images/banner_images/".$image_name;
             Image::make($image_temp)->save($image_path);
         }else{
            $image_path="";
         }
         $banner->image = $image_name;
         $banner->url = $data['banner_url'];
         $banner->title = $data['banner_title'];
         $banner->alt = $data['banner_alt'];
         $banner->save();
         return redirect('/admin/banner')->with('flash_message_success',$message);

     }

     return view('admin.banners.add_edit_banner')->with(compact(['title','bannerData']));
   }

 public function updateStatus(Request $request , $id ){


     $existBanner=Banner::find($id);
     $existBanner->status=$request->item['status'];
     $existBanner->save();
     return $existBanner ;

 }


}
