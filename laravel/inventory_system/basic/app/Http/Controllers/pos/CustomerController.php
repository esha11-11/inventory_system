<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Payment;

use App\Models\PaymentDetail;

use Auth;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CustomerController extends Controller
{
    //
    public function CustomerAll(){
    	$customers = Customer::latest()->get();
    	return view('backend.customer.customer_all',compact('customers'));
    }

    public function CustomerAdd(){

    	return view('backend.customer.customer_add');

    }

    public function CustomerStore(Request $request)
    {
    	if ($request->file('customer_image')) {
   		$manager = new ImageManager(new Driver());
      	$name_gen = hexdec(uniqid()).'.'.$request->file('customer_image')->getClientOriginalExtension();
      	$img = $manager->read($request->file('customer_image'));
      	$img = $img->resize(100,100);
      	$img->tojpeg(80)->save(base_path('public/upload/customer/'.$name_gen));
      	$save_url = 'upload/customer/'.$name_gen;
      	customer::insert([
   	'name' => $request->name,
   	'mobile_no' => $request->mobile_no,
   	'email' => $request->email,
   	'address' => $request->address,
   	'customer_image' => $save_url,
   	'created_by' => Auth::user()->id, 
   	'created_at' => Carbon::now(),
   ]);

      	}
    		 $notification = array(
            'message' => 'customer insert Successfully', 
            'alert-type' => 'success'
        );
    return redirect()->route('customer.all')->with($notification);
    }  //end method//

    public function  CustomerEdit($id){
    	$customer = Customer::findOrFail($id);
    	return view('backend.customer.customer_edit', compact('customer'));

    } //end method//

    public function CustomerUpdate(Request $request){
    	$customer_id = $request->id;
    	if ($request->file('customer_image')) {
   		$manager = new ImageManager(new Driver());
      	$name_gen = hexdec(uniqid()).'.'.$request->file('customer_image')->getClientOriginalExtension();
      	$img = $manager->read($request->file('customer_image'));
      	$img = $img->resize(100,100);
      	$img->tojpeg(80)->save(base_path('public/upload/customer/'.$name_gen));
      	$save_url = 'upload/customer/'.$name_gen;
       
      	customer::findOrFail($customer_id)->update([
   	'name' => $request->name,
   	'mobile_no' => $request->mobile_no,
   	'email' => $request->email,
   	'address' => $request->address,
   	'customer_image' => $save_url,
   	'updated_by' => Auth::user()->id, 
   	'updated_at' => Carbon::now(),
   ]);

      	
    		 $notification = array(
            'message' => 'customer updated with image Successfully', 
            'alert-type' => 'success'
        );
    return redirect()->route('customer.all')->with($notification);
    }else{
    	 	customer::findOrFail($customer_id)->update([
   	'name' => $request->name,
   	'mobile_no' => $request->mobile_no,
   	'email' => $request->email,
   	'address' => $request->address,
   	'updated_by' => Auth::user()->id, 
   	'updated_at' => Carbon::now(),
   ]);

      	
    		 $notification = array(
            'message' => 'customer updated without image Successfully', 
            'alert-type' => 'success'
        );
    return redirect()->route('customer.all')->with($notification);
      }
     }
   
   public function CustomerDelete($id){
    
    $customers = Customer::findOrFail($id);
    $img = $customers->customer_image;
    unlink($img);


    Customer::findOrFail($id)->delete();
    $notification = array(
      'message' => 'customer delete Successfully',
      'alert-type' => 'Success'
    );
    return redirect()->back()->with($notification);
   }//end method


   public function CreditCustomer(){
  
    $allData = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
    return view('backend.customer.customer_credit',compact('allData'));
   }//end method
 
  public function CreditCustomerPrintPdf(){

    $allData = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
    return view('backend.pdf.customer_credit_pdf',compact('allData'));
  }//end method

  public function CustomerEditInvoice($invoice_id){

    $payment = Payment::where('invoice_id',$invoice_id)->first();
    return view('backend.customer.edit_customer_invoice' , compact('payment'));

  }//end method

     public function CustomerUpdateInvoice(Request $request,$invoice_id){

        if ($request->new_paid_amount < $request->payed_amount) {
            $notification = array(
            'message' => 'sorry you reach  maximmun payment amount', 
            'alert-type' => 'error'
        );
    return redirect()->back()->with($notification);
         
        }else{
          $payment = Payment::where('invoice_id',$invoice_id)->first();
          $payment_details = new PaymentDetail();
          $payment->paid_status = $request->paid_status;
          if ($request->paid_status == 'full_paid'  ) {
            $payment->payed_amount = Payment::where('invoice_id',$invoice_id)->first()['payed_amount']+$request->new_paid_amount;
            $payment->due_amount = '0';
            $payment_details->current_paid_amount = $request->new_paid_amount;

          }elseif ($request->paid_status == 'partial_paid'  ) {
          $payment->payed_amount = Payment::where('invoice_id',$invoice_id)->first()['payed_amount']+$request->payed_amount;
          $payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['due_amount']-$request->payed_amount;
          $payment_details->current_paid_amount = $request->payed_amount;
        }
          $payment->save();
          $payment_details->invoice_id = $invoice_id;
          $payment_details->date = date('Y-m-d',strtotime($request->date));
          $payment_details->updated_by = Auth::user()->id;
          $payment_details->save();

           $notification = array(
            'message' => 'udated successfully', 
            'alert-type' => 'success'
        );
    return redirect()->route('credit.customer')->with($notification);

          }
        
      }//end method

public function CustomerInvoiceDetails($invoice_id){

$payment = Payment::where('invoice_id',$invoice_id)->first();
return view('backend.pdf.invoice_details_pdf', compact('payment'));
}//end method

  public function PaidCustomer(){

    $allData = Payment::where('paid_status', '!=', 'full_due')->get();
    return view('backend.customer.customer_paid', compact('allData'));
  }//end method

public function PaidCustomerPrintPdf(){

   $allData = Payment::where('paid_status', '!=', 'full_due')->get();
    return view('backend.pdf.customer_paid_pdf', compact('allData'));
}//end method

  public   function CustomerWiseReport(){

    $customers = Customer::all();
    return view('backend.customer.customer_wise_report', compact('customers'));
  }//end method

  public function CustomerWiseCreditReport(Request $request){

    $allData = Payment::where('customer_id',$request->customer_id)->whereIn('paid_status', ['full_due','partial_paid'])->get();
    return view('backend.pdf.customer_wise_credit_pdf', compact('allData'));
  }//end method

    public function CustomerWisePaidReport(Request $request){

    $allData = Payment::where('customer_id',$request->customer_id)->where('paid_status', '!=', 'full_due')->get();
    return view('backend.pdf.customer_wise_paid_pdf', compact('allData'));
   }//end method

 }

