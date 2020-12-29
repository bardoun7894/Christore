<?php
//
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{

    public  function dashboard(){
        return view('admin.admin_dashboard');
    }
    public  function settings(){
    $admindetails =  Auth::guard('admin')->user() ;
        return view('admin.admin_settings')->with(compact('admindetails'));
    }
    public  function check_current_password(Request $request){
       $data =$request->all();
      if(Hash::check($data['currentPassword'],Auth::guard('admin')->user()->getAuthPassword())){
           return "true";
             }else{
           return "false" ;
              }
             }
    public  function update_current_password(Request $request){
         if($request->isMethod('post')){
             $data =$request->all();
         if(Hash::check($data['current_password'],Auth::guard('admin')->user()->getAuthPassword())){
            //check if new password and confirm password is match
           if($data['new_password']===$data['confirm_password']){
           Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_password'])]);
           Session()->flash('success_message','your password has been updated succesfully');
               return redirect()->back();
           }else{
               Session()->flash('wrong_password','Your Passwords not matches');
               return redirect()->back();
             }

          }else{
         Session()->flash('wrong_password','Your current Password is wrong');
          return redirect()->back();
          }   }  }
    public  function update_admin_details(Request $request){
        if($request->isMethod('post')){
            $data =$request->all();
            $rules = [
           'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
           'admin_number' => 'required|numeric',
           'image' => 'image|max:10000' // max 10000kb
               ];

            $this->validate($request, $rules, __('validation'));
            //upload image
            if ($request->hasFile('image')) {
                //  Let's do everything here
             $img_tmp =$request->file('image');
           if ($img_tmp->isValid()) {


                }

            }
             Admin::where('email',Auth::guard('admin')->user()->email)->update([
                 'name'=>$data['admin_name'],'mobile'=>$data['admin_number']
             ]);
             Session::flash('success_message','Admin message updated succesfully');
        }
       return view('admin.update_admin_details');
              }
    public  function login(Request $request){

        if($request->isMethod('post')){
            $rules =[
               'email'=>'required|email|max:255',
                'password'=>'required|min:8'
               ];
            $this->validate($request,$rules,__('validation'));
            $data =$request->all();
     if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
            return redirect('admin/dashboard');
       }else{
         Session::flash('error_message','invalid email or password');
        return  redirect()->back();
     }
        }
        return view('admin.admin_login');
}
    public  function logout(){
  Auth::guard('admin')->logout();
  return redirect('/admin');
}


}
