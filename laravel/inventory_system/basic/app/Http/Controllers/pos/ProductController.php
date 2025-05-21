<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use Auth;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function ProductAll(){
    	$products = Product::latest()->get();
    	return view('backend.product.product_all', compact('products'));
    }//END METHOD

    public function ProductAdd(){
    	$supplier = Supplier::all();
    	$category = Category::all();
    	$unit = Unit::all();
    	return view('backend.product.product_add' ,compact('supplier','category','unit'));
    }//END METHOD

    public function ProductStore(Request $request){
    product::insert([
     		'name' => $request->name,
     		'supplier_id' => $request->supplier_id,
     		'unit_id' => $request->unit_id,
     		'category_id' => $request->category_id,
     		'quantity' => '0',
    		'created_by' => Auth::user()->id,
     		'created_at' => Carbon::now(),
    ]);
    	 $notification = array(
            'message' => 'Supplier insert Successfully', 
            'alert-type' => 'success'
        );
    return redirect()->route('product.all')->with($notification);
}//END METHOD

public function ProductEdit($id){
    $supplier = Supplier::all();
    $unit = Unit::all();
    $category = Category::all();
    $product = Product::findOrFail($id);
    return view('backend.product.product_edit',compact('product','supplier','unit','category'));
}//END METHOD

public function ProductUpdate(Request $request){
    $product_id = $request->id;

      product::findOrFail($product_id)->update([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
    ]);
         $notification = array(
            'message' => 'product updated Successfully', 
            'alert-type' => 'success'
        );
    return redirect()->route('product.all')->with($notification);

}

public function ProductDelete($id){
    Product::findOrFail($id)->delete();
         $notification = array(
            'message' => 'Product delete Successfully', 
            'alert-type' => 'success'
        );
         return redirect()->back()->with($notification);
   }//END METHOD


}
