<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
  public function index()
  {
  	$categories = Category::get();
  	return view('admin/category/index')
  		->with(compact('categories'));
  }

  public function create()
  { 
    
  	return view('admin/category/create');
  }

  public function CategoryStore(Request $request){
    Category::create([
      'title' => $request->get('title'),
      'slug' => $request->get('slug'),
      'description' => $request->get('description'),
      'status' => 'DEACTIVE',
      'created_by' => '1',
      'updated_by' => '1'
    ]);
     $notification = array(
            'message' => 'Category Created Successfully', 
            'success' => 'success'
        );

         return redirect()->to('/admin/category')->with($notification); 
  }


  public function edit($id)
  {
    $categories = Category::findOrFail($id);
  	return view('admin/category/edit', compact('categories'));
  }

public function CategoryUpdate(Request $request){
  $cat = $request->id;
  Category::findOrFail($cat)->Update([
      'title' => $request->get('title'),
      'slug' => $request->get('slug'),
      'description' => $request->get('description'),

  ]);
     $notification = array(
            'message' => 'Category Updated Successfully', 
            'success' => 'success'
        );
     return redirect()->to('/admin/category')->with($notification); 

}

public function status($id)
{
  $cat = Category::findOrFail($id);
  $newStatus = ($cat->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
  $cat->update([
    'status' => $newStatus
  ]);
  echo $newStatus;
   // return redirect()->back();
}
  
  public function delete($id){
    $cat = Category::findOrFail($id);
    $cat->delete();
    return 'true';
    // return redirect()->back();
  }


 public function status_active(Request $request)
  {
    $checkAll = $request->get('checkAll');
    foreach ($checkAll as $id) {
      echo Category::where('id', $id)->update([
        'status' => 'ACTIVE'
      ]);
    }
  }

  public function status_deactive(Request $request)
  {
    $checkAll = $request->get('checkAll');
    foreach ($checkAll as $id) {
      echo Category::where('id', $id)->update([
        'status' => 'DEACTIVE'
      ]);
    }
  }

  public function delete_all(Request $request)
  {
    $checkAll = $request->get('checkAll');
    foreach ($checkAll as $id) {
      echo Category::where('id', $id)->delete();
    }
  }
}
