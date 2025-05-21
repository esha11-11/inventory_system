<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\purchase;
use App\Models\Unit;
use Auth;
use Illuminate\Support\Carbon;

class DefaultController extends Controller
{
 public function GetCategory(Request $request){
 
$supplier_id = $request->supplier_id;
$allCategory = Product::with(['Category'])->select('category_id')->
where('supplier_id',$supplier_id)->groupBy('category_id')->get();
return response()->json($allCategory);
 }//END METHOD//


 public function GetProduct(Request $request){
 
$category_id = $request->category_id;
$allProduct = Product::where('category_id',$category_id)->get();
return response()->json($allProduct);
 }//END METHOD//

public function GetStock(Request $request){

	$product_id = $request->product_id;
	$stock = Product::where('id',$product_id)->first()->quantity;
	return response()->json($stock);
}//END METHOD//



}
