<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use Auth;
use Illuminate\Support\Carbon;

class StockController extends Controller
{
    public function StockReport(){

    	$allData = product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
    	return view('backend.stock.stock_report', compact('allData'));

    }//end method

    public function StockReportPdf(){

    	$allData = product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
    	return view('backend.pdf.stock_report_pdf', compact('allData'));

    }//end method

    public function StockSupplierWisee(){

    	$suppliers = Supplier::all();
    	$category = Category::all();
    	return view('backend.stock.supplier_product_wise_report', compact('suppliers','category'));

      }//end method

 public function SupplierWisePdf(Request $request){

 		$allData = product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->where('supplier_id',$request->supplier_id)->get();
    	return view('backend.pdf.supplier_wise_report_pdf', compact('allData'));

  }//end method

 public function ProductWisePdf(Request $request){

 		$product = product::where('category_id',$request->category_id)->where('id',$request->product_id)->first();
    	return view('backend.pdf.product_wise_report_pdf', compact('product'));

  }//end method
}
