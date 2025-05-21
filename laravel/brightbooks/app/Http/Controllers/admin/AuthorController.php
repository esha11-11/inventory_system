<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Country;
use File;

class AuthorController extends Controller
{
  public function index()
  {
    // $authors = Author::get(); select all authors without pagination
    $searchTerm = request()->get('s');
    $authors = Author::orWhere('title', 'LIKE', "%$searchTerm%")->latest()->paginate(15);
  	return view('admin/author/index')
      ->with(compact('authors'));
  }

  public function create()
  {
  	$countries = Country::get();
  	return view('admin/author/create')
  		->with(compact('countries'));
  }

  public function store(Request $request)
  {
  	$request->validate([
  		'title' => 'required',
  		'slug' => 'required',
  		'designation' => 'required',
  		'dob' => 'required',
  		'email' => 'required',
      'country' => 'required|not_in:none',
  		'phone' => 'required',
      'description' => 'required',
      'author_img' => 'required',
      'facebook_id' => 'required',
      'twitter_id' => 'required',
      'youtube_id' => 'required',
      'pinterest_id' => 'required',
      'author_feature' => 'required|not_in:none',

  	]);

    $fileName = null;
    if (request()->hasFile('author_img')) 
    {
      $file = request()->file('author_img');
      $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
      $file->move('./uploads/', $fileName);
    }

  	Author::create([
  		'title' => $request->get('title'),
  		'slug' => $request->get('slug'),
  		'designation' => $request->get('designation'),
  		'dob' => $request->get('dob'),
  		'country' => $request->get('country'),
  		'email' => $request->get('email'),
  		'phone' => $request->get('phone'),
  		'description' => $request->get('description'),
  		'author_feature' => $request->get('author_feature'),
  		'facebook_id' => $request->get('facebook_id'),
  		'twitter_id' => $request->get('twitter_id'),
  		'youtube_id' => $request->get('youtube_id'),
  		'pinterest_id' => $request->get('pinterest_id'),
  		'author_img' => $fileName,
  		'status' => 'DEACTIVE',
  		'created_by' => '1',
  		'updated_by' => '1'
  	]);

 $notification = array(
            'message' => 'Author Created Successfully', 
            'success' => 'success'
        );
  	return redirect()->to('/admin/author')->with($notification); 
  }

  public function edit($id)
  {
  	$author = Author::findOrFail($id);
  	$countries = Country::get();
  	return view('admin/author/edit')
  		->with(compact('author', 'countries'));
  }
  
  public function update(Request $request, $id)
  {
  	$author = Author::findOrFail($id);
  	
    $currentImage = $author->author_img;
    
    $fileName = null;
    if (request()->hasFile('author_img')) 
    {
      $file = request()->file('author_img');
      $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
      $file->move('./uploads/', $fileName);
    }

    $author->update([
  		'title' => $request->get('title'),
  		'slug' => $request->get('slug'),
  		'designation' => $request->get('designation'),
  		'dob' => $request->get('dob'),
  		'country' => $request->get('country'),
  		'email' => $request->get('email'),
  		'phone' => $request->get('phone'),
  		'description' => $request->get('description'),
  		'author_feature' => $request->get('author_feature'),
  		'facebook_id' => $request->get('facebook_id'),
  		'twitter_id' => $request->get('twitter_id'),
  		'youtube_id' => $request->get('youtube_id'),
  		'pinterest_id' => $request->get('pinterest_id'),
  		'author_img' => ($fileName) ? $fileName : $currentImage,
  		'created_by' => '1',
  		'updated_by' => '1'
  	]);

    if ($fileName) {
      File::delete('./uploads/' . $currentImage);
    }

     $notification = array(
            'message' => 'Author Updated Successfully', 
            'success' => 'success'
        );
    
  	return redirect()->to('/admin/author')->with($notification);
  }

  public function status($id)
  {
    sleep(1);
    $author = Author::findOrFail($id);
    $newStatus = ($author->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
    $author->update([
      'status' => $newStatus
    ]);
    
    echo $newStatus;
  } 

  public function delete($id)
  {
    $author = Author::findOrFail($id);
    $currentImage = $author->author_img;
    $author->delete();
    File::delete('./uploads/' . $currentImage);
        
    return 'true';
        
    // return redirect()->back();
  }

  public function status_active(Request $request)
  {
    $checkAll = $request->get('checkAll');
    foreach ($checkAll as $id) {
      echo Author::where('id', $id)->update([
        'status' => 'ACTIVE'
      ]);
    }
  }

  public function status_deactive(Request $request)
  {
    $checkAll = $request->get('checkAll');
    foreach ($checkAll as $id) {
      echo Author::where('id', $id)->update([
        'status' => 'DEACTIVE'
      ]);
    }
  }

  public function delete_all(Request $request)
  {


    $checkAll = $request->get('checkAll');
    foreach ($checkAll as $id) {
      echo Author::where('id', $id)->delete();

    }
     
   
  }


}
