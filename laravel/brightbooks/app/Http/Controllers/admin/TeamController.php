<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use File;

class TeamController extends Controller
{
  public function index()
  {
    $team = Team::latest()->get();
  	return view('admin/team/index',compact('team'));
  }

  public function create()
  {
  	return view('admin/team/create');
  }

  public function store(Request $request){
    $filename = null;
    if (request()->file('team_img')) {
      $file = request()->file('team_img');
      $filename = md5($file->getClientOriginalName()) . '.' . time().$file->getClientOriginalExtension();
      $file->move('./admin_imgs/team/',$filename);
    }
    Team::create([
      'fullname' => $request->get('fullname'),
      'designation' => $request->get('designation'),
      'telephone' => $request->get('telephone'),
      'mobile' => $request->get('mobile'),
      'email' => $request->get('email'),
      'description' => $request->get('description'),
      'facebook_id' => $request->get('facebook_id'),
      'twitter_id' => $request->get('twitter_id'),
      'pinterest_id' => $request->get('pinterest_id'),
      'team_img' => $filename,
      'status'  => 'DEACTIVE',
       'created_by' => '1',
      'updated_by' => '1'
      

    ]);
     $notification = array(
            'message' => 'Team Created Successfully', 
            'success' => 'success'
        );
 return redirect()->to('/admin/team')->with($notification); 

  }

  public function edit($id)
  {
    $team = Team::findOrFail($id);
  	return view('admin/team/edit',compact('team'));
  }


 public function Update(Request $request,$id){

    $team = Team::findOrFail($id);
    $currentImage = $team->team_img;

    $filename = null;
    if (request()->file('team_img')) {
      $file = request()->file('team_img');
      $filename = md5($file->getClientOriginalName()) . '.' . time().$file->getClientOriginalExtension();
      $file->move('./admin_imgs/team/',$filename);
    }
    $team->Update([
      'fullname' => $request->get('fullname'),
      'designation' => $request->get('designation'),
      'telephone' => $request->get('telephone'),
      'mobile' => $request->get('mobile'),
      'email' => $request->get('email'),
      'description' => $request->get('description'),
      'facebook_id' => $request->get('facebook_id'),
      'twitter_id' => $request->get('twitter_id'),
      'pinterest_id' => $request->get('pinterest_id'),
      'team_img' => ($filename) ? $filename : $currentImage,
      'status'  => 'DEACTIVE',
       'created_by' => '1',
      'updated_by' => '1'

    ]);
    if($filename){
      File::delete('./admin_imgs/team/' . $currentImage);
    }

         $notification = array(
            'message' => 'Team Updated Successfully', 
            'success' => 'success'
        );


 return redirect()->to('/admin/team')->with($notification); 

  }












  public function status($id){
    $team = Team::findOrFail($id);
    $newStatus = ($team->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
    $team->update([
      'status' => $newStatus
    ]);
    echo $newStatus;
  }


public function Delete($id){
  $team = Team::findOrFail($id);
  $currentImage = $team->team_img;
  $team->delete();
  File::delete('./admin_imgs/team/'.$currentImage);
  return 'true';
}



  public function status_active(Request $request)
  {
    $checkAll = $request->get('checkAll');
    foreach ($checkAll as $id) {
      echo Team::where('id', $id)->update([
        'status' => 'ACTIVE'
      ]);
    }
  }

  public function status_deactive(Request $request)
  {
    $checkAll = $request->get('checkAll');
    foreach ($checkAll as $id) {
      echo Team::where('id', $id)->update([
        'status' => 'DEACTIVE'
      ]);
    }
  }

  public function delete_all(Request $request)
  {
    $checkAll = $request->get('checkAll');
    foreach ($checkAll as $id) {
      echo Team::where('id', $id)->delete();
    }
  

}



}
