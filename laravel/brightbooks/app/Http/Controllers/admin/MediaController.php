<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use File;

class MediaController extends Controller
{
     public function index()
  {
    $searchTerm = request()->get('s');
    $medias = Media::orWhere('title', 'LIKE', "%$searchTerm%")->latest()->paginate(15);
  	return view('admin/media/index')
    ->with(compact('medias'));
  }

  public function create()
  {
  	return view('admin/media/create');
  }
public function store(Request $request)

  {
  	$request->validate([
  		'title' => 'required',
  		'slug' => 'required',
  		'media_type' => 'required|not_in:none',
  		'media_img' => 'required',
  		
  	]);

   $fileName = null;
    if (request()->hasFile('media_img')) 
    {
      $file = request()->file('media_img');
      $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
      $file->move('./admin_imgs/media/', $fileName);
    }
    Media::create([
      'title' => $request->get('title'),
      'slug' => $request->get('slug'),
    'media_type' => $request->get('media_type'),
    'description' => $request->get('description'),
    'media_img' => $fileName,
    'status' => 'DEACTIVE',
    'created_by' => '1',
    'updated_by' => '1'
    ]);

     $notification = array(
            'message' => 'Media Created Successfully', 
            'success' => 'success'
        );
    return redirect()->to('/admin/media')->with($notification); 

  }

  public function edit($id)
  {
    $media = Media::findOrFail($id);
  	return view('admin/media/edit')
    ->with(compact('media'));
  }

public function update(Request $request, $id)

  { 
    $media = Media::findOrFail($id);

     $currentImage = $media->media_img;
    
    $fileName = null;
    if (request()->hasFile('media_img')) 
    {
      $file = request()->file('media_img');
      $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
      $file->move('./admin_imgs/media/', $fileName);
    }



    $media->update([
      'title' => $request->get('title'),
      'slug' => $request->get('slug'),
    'media_type' => $request->get('media_type'),
    'description' => $request->get('description'),
    'media_img' =>  ($fileName) ? $fileName : $currentImage,
    'status' => 'DEACTIVE',
    'created_by' => '1',
    'updated_by' => '1'
    ]);
     if ($fileName) {
      File::delete('./admin_imgs/media/' . $currentImage);
    }
         $notification = array(
            'message' => 'Media Updated Successfully', 
            'success' => 'success'
        );
    return redirect()->to('/admin/media')->with($notification); 

  }



  public function status($id)
  {
    $media = Media::findOrFail($id);
    $newStatus = ($media->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
    $media->update([
      'status' => $newStatus
    ]);
     echo $newStatus;
  }
 


  public function delete($id)
  {
    $media = Media::findOrFail($id);
    $currentImage = $media->media_img;
    $media->delete();
    File::delete('./admin_imgs/media/' . $currentImage);
    return 'true';
  }










  public function status_active(Request $request)
  {
    $checkAll = $request->get('checkAll');
    foreach ($checkAll as $id) {
      echo Media::where('id', $id)->update([
        'status' => 'ACTIVE'
      ]);
    }
  }

  public function status_deactive(Request $request)
  {
    $checkAll = $request->get('checkAll');
    foreach ($checkAll as $id) {
      echo Media::where('id', $id)->update([
        'status' => 'DEACTIVE'
      ]);
    }
  }

  public function delete_all(Request $request)
  {
    $checkAll = $request->get('checkAll');
    foreach ($checkAll as $id) {
      echo Media::where('id', $id)->delete();
    }
  }
}
