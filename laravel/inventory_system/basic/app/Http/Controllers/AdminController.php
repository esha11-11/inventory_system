<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
        
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();



        $notification = array(
            'message' => 'user log out  Successfully', 
            'alert-type' => 'info'
        );

        return redirect('/login')->with($notification);
    }//end method
 
   public function profile(){

        $id = Auth::user()->id;
        $admindata = User::find($id);
        
        return view('admin.admin_profile_view',compact('admindata'));
    }//end method



   public function editprofile(){
       $id = Auth::user()->id;
       $editdata = User::find($id);
      
       return view('admin.admin_profile_edit',compact('editdata'));
}//end method


     public function StoreProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->file('profile_image')) {
           $file = $request->file('profile_image');

           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('upload/admin_images'),$filename);
           $data['profile_image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully', 
            'alert-type' => 'info'
        );

        return redirect()->route('admin.profile')->with($notification);

    }// End Method

    public function changepassword(){


    return view('admin.admin_change_password');

    }//End Method

    public function updatepassword(Request $request){
    $validateData = $request->validate([ 
      'oldpassword' => 'required',
      'newpassword' => 'required',
      'confirm_password' => 'required|same:newpassword',
    ]);
    $hashpassword = Auth::user()->password; 
    if (Hash::check($request->oldpassword,$hashpassword )) {
      $users = User::find(Auth::id());
      $users->password = bcrypt($request->newpassword);
      $users->save();

      session()->flash('message','password updated Successfully');
      return redirect()->back();
      # code...
    } else{
          session()->flash('message','old password is not match');
      return redirect()->back();
    }
    }//End Method
}  
