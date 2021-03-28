<?php
//
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public  function dashboard(){
      Session::put('page','dashboard');
        $admins_counts=  Admin::all()->count();
        $products =Product::all()->count();
        return view('admin.admin_dashboard')->with(compact(["admins_counts","products"]));
    }
    public  function settings(){

     Session::put('page','settings');
     $admindetails =  Auth::guard('admin')->user() ;
     return view('admin.admin_settings')->with(compact('admindetails'));
    }
    public  function check_current_password(Request $request){
       $data =$request->all();
      if(Hash::check($data['currentPassword'],Auth::guard('admin')->user()->getAuthPassword())){
           return "true";
             }
             else
             {
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
          }   }
    }

    public  function update_admin_details(Request $request){
        Session::put('page','update_admin_details');
        if($request->isMethod('post')){
            $data =$request->all();
            $rules =
                [
           'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
           'admin_number' => 'required|numeric',
           'image' => 'image|max:10000' // max 10000kb
               ];

            $this->validate($request, $rules, __('validation'));
            //upload image
            if ($request->hasFile('admin_image')) {
                //  Let's do everything here
             $img_tmp = $request->file('admin_image');
           if ($img_tmp->isValid()) {
              //get image extension
               $extension =$img_tmp->getClientOriginalExtension();
               //generate new image name
               $imageName =rand(111,9999).".".$extension;
               $imagePath = '/images/adminLTE_img/admin_photos/'.$imageName;
               // upload image
               Image::make($img_tmp)->resize(300,400)->save(public_path($imagePath));

                } elseif(!empty($data['current_admin_image'])){
                 $imageName = $data['current_admin_image'];
                      }

                  }  else
            {
                $imageName ="";
            }
      Admin::where('email',Auth::guard('admin')->user()->email)->update(['name'=>$data['admin_name'],'mobile'=>$data['admin_number'],'image'=>$imageName ]);
         Session::flash('success_message','Admin message updated succesfully');
        }
       return view('admin.update_admin_details');

              }
    public  function login(Request $request){
        if($request->isMethod('post')){

            $messages=$this->getMessages();
            $rules =$this->getRules();
          $this->validate($request,$rules,$messages);
          $data =$request->all();
        if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
            return redirect('/admin/dashboard');
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

    private function getMessages()
    {
       return  [
            'email.required'=> __('messages.email.required'),
            'password.required'=> __('messages.password.required')
        ];
    }

    private function getRules()
    {
     return  [
            'email'=>'required|email|max:255',
            'password'=>'required|min:8'
        ];
    }


}
