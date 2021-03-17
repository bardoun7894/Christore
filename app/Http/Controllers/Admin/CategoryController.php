<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use function PHPUnit\Framework\fileExists;

class CategoryController extends Controller
{
    public  $message ="" ;
    public function categories(){
        Session::put('page','categories');
        $categories =Category::with(['section','parentCategory'])->get();
   // echo "<pre>";print_r($categories);die();
       return view('admin.categories.categories')->with(compact('categories'));
    }
    public function updateCategoryStatus(Request $request){
        if ($request->ajax()){
            $data= $request->all();
           if($data['status']==="active")
              {
                $status =0;
              }
              else
              {
                $status =1;
              }
         Category::where( 'id', $data['category_id'] ) -> update([ 'status' => $status ]);
         return response()->json( [ 'status'=>$status , 'category_id' => $data['category_id'] ]);
        }
    }
    public function addEditCategory(Request $request,$id = null ){
        if($id==""){
            $title ='Add Category';
            $category =new Category();
            $categoryData = array();
            $getCategories = array();
            $message = "categories added successfully";
        }else{
            $title = 'Edit Category' ;
            $categoryData = Category::where('id',$id)->first();
            $getCategories = Category::with('subcategories')->where(['section_id'=>$categoryData['section_id'],'parent_id'=>0])->get();
            $category = Category::find($id);
            $message = "categories updated successfully";
          }
        if($request->isMethod('post')){
             $data=$request->all();

             if(empty( $data['description'])){
                 $data['description'] ="";
             }
             if(empty( $data['meta_title'])){
                 $data['meta_title'] ="";
             }
             if(empty( $data['meta_description'])){
                 $data['meta_description'] ="";
             }
             if(empty( $data['meta_keywords'])){
                 $data['meta_keywords'] ="";
             }
            $rules = [
                'category_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'section_id' => 'required',
                'url' => 'required',
                'category_image' => 'image|max:10000' // max 10000kb
            ];
            $this->validate($request, $rules, __('validation'));
             $category->parent_id = $data['parent_id'];
             $category->section_id =  $data['section_id'];
             $category->category_name =  $data['category_name'];
             $category->category_discount =  $data['category_discount'];
             $category->description =   $data['description'];
             $category->url =  $data['url'];
            if ($request->hasFile('category_image')) {
                //  Let's do everything here
                $img_tmp = $request->file('category_image');
                if ($img_tmp->isValid()) {
                    //get image extension
                    $extension =$img_tmp->getClientOriginalExtension();
                    //generate new image name
                    $imageName =rand(111,9999).".".$extension;
                    $imagePath = '/images/category_image/'.$imageName;
                    // upload image
                    Image::make($img_tmp)->resize(300,400)->save(public_path($imagePath));
                     }
            }  else
            {
                $imageName ="";
            }
             $category->category_image =  $imageName;
             $category->meta_title =  $data['meta_title'];
             $category->meta_description =   $data['meta_description'];
             $category->meta_keywords =   $data['meta_keywords'];
             $category->status =  1;
             $category->save();
             Session()->flash("success_message",$message);
             return  redirect('/admin/categories');
         }
         $getSections =Section::get();
        return view('admin.categories.add_edit_category')->with( compact('title','getSections','categoryData','getCategories') );
    }

    public function appendCategoryLevel(Request $request){
       if($request->ajax()){
          $data = $request->all();
          $getCategories =Category::with('subcategories')->where(['section_id'=>$data['section_id'],'parent_id'=>0,'status'=>1])->get();
         $getCategories = json_decode(json_encode($getCategories),true);
//       echo "<pre>";print_r($getCategories);die();
          return view('admin.categories.append_categories_level')->with(compact('getCategories'));
          }
    }
    public function deleteCategoryImage($id){
     $categoryImage = Category::select('category_image')->where('id',$id)->first();
     //get category Image  path
     $categoryImagePath = 'images/category_image/';
      if(fileExists($categoryImagePath.$categoryImage)){
         unlink($categoryImagePath.$categoryImage->category_image);
      }
     Category::where('id',$id)->update(['category_image'=>'']);
      return redirect()->back()->with('flash_message_success',__('messages.delete_image_category'));
    }

    public function deleteCategory($id){
      $message =   __('messages.delete_category');
     Category::where('id',$id)->delete();
//     Session()->flash("success_message",$message);
     return redirect()->back()->with("success_message",$message);
    }
}
