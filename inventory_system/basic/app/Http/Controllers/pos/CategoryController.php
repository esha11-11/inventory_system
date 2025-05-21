<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
        public function CategoryAll(){
    	// $Suppliers = supplier::all();
    	$categories = Category::latest()->get();
    	return view('backend.Category.Category_all',compact('categories'));

    }//END METHOD

      public function CategoryAdd(){
    	return view('backend.Category.Category_add');

    }//END METHOD

       public function CategoryStore(Request $request){
     	Category::insert([
     		'name' => $request->name,
     	
     		'created_by' => Auth::user()->id,
     		'created_at' => Carbon::now(),
     	]);

 		 $notification = array(
            'message' => 'unit insert Successfully', 
            'alert-type' => 'success'
        );
    return redirect()->route('category.all')->with($notification);

    }//END METHOD

     public function CategoryEdit($id){

    	$category = Category::findOrFail($id);
    	return view('backend.category.category_edit',compact('category'));
    }//END METHOD

     public function CategoryUpdate(Request $request){

    	$category_id = $request->id;

    	     Category::findOrFail($category_id)->update([
     		'name' => $request->name,
     		'updated_by' => Auth::user()->id,
     		'updated_at' => Carbon::now(),
     	]);

 		 $notification = array(
            'message' => 'category updated Successfully', 
            'alert-type' => 'success'
        );
    return redirect()->route('category.all')->with($notification);


    }//END METHOD

 public function CategoryDelete($id){

    Category::findOrFail($id)->delete();

    	 $notification = array(
            'message' => 'Category delete Successfully', 
            'alert-type' => 'success'
        );
    return redirect()->back()->with($notification);

    }//END METHOD
}
