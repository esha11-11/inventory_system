<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
  public function profile()
  {
    return view('admin.custom_auth.profile');
  }

  public function profile_update(Request $request)
  {
$id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
       
        $data->designation = $request->designation;
        $data->bio = $request->bio;
       

        if ($request->file('user_img')) {
           $file = $request->file('user_img');

           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('uploads'),$filename);
           $data['user_img'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully', 
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);


  }

  public function update_password(Request $request)
  {
      

 $validateData = $request->validate([ 
      'current_password' => 'required',
      'new_password' => 'required',
      'new_confirm_password' => 'required|same:new_password',
    ]);
    $hashpassword = Auth::user()->password; 
    if (Hash::check($request->current_password,$hashpassword )) {
      $users = User::find(Auth::id());
      $users->password = bcrypt($request->new_password);
      $users->save();


      session()->flash('message','password updated Successfully');
      return redirect()->back();
      # code...
    } else{
          session()->flash('message','old password is not match');
      return redirect()->back();
    }



}




}
