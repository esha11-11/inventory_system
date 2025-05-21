<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\defaultmodel;
use App\Models\Footer;


use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use File;



class DefaultController extends Controller
{
    public function Slider(){
    	$slider = defaultmodel::latest()->get();
    	return view('admin/slider/index',compact('slider'));
    }

    public function SliderCreate(){

    	return view('admin/slider/create');
    }


    public function Store(Request $request){
    	$request->validate([
    		'slider_img' => 'required',
    	])	;

   	if ($request->file('slider_img')) {
   		$manager = new ImageManager(new Driver());
      	$name_gen = hexdec(uniqid()).'.'.$request->file('slider_img')->getClientOriginalExtension();
      	$img = $manager->read($request->file('slider_img'));
      	$img = $img->resize(1549,516);
      	$img->tojpeg(80)->save(base_path('public/admin_imgs/slider/'.$name_gen));
      	$save_url = 'admin_imgs/slider/'.$name_gen;
}
    defaultmodel::create([
    	'slider_img' => $save_url,
    	'status' => 'DEACTIVE',
    

    ]);
     $notification = array(
            'message' => 'Book Created Successfully', 
            'success' => 'success'
        );
         return redirect()->to('/admin/slider')->with($notification); 
}
    public function status($id)
  {
    sleep(1);
    $slider = defaultmodel::findOrFail($id);
    $newStatus = ($slider->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
    $slider->update([
      'status' => $newStatus
    ]);
    
    echo $newStatus;
  } 

public function delete($id)
  {
	$slider = defaultmodel::findOrFail($id);
	$currentImage = $slider->slider_img;
	$slider->delete();
File::delete('./admin_imgs/slider/' . $currentImage);
    return 'true';
    // return redirect()->back();
  }









  public function status_active(Request $request)
  {
    $checkAll = $request->get('checkAll');
    foreach ($checkAll as $id) {
      echo defaultmodel::where('id', $id)->update([
        'status' => 'ACTIVE'
      ]);
    }
  }

  public function status_deactive(Request $request)
  {
    $checkAll = $request->get('checkAll');
    foreach ($checkAll as $id) {
      echo defaultmodel::where('id', $id)->update([
        'status' => 'DEACTIVE'
      ]);
    }
  }

  public function delete_all(Request $request)
  {
    $checkAll = $request->get('checkAll');
    foreach ($checkAll as $id) {
      echo defaultmodel::where('id', $id)->delete();
    }


}




// footer functions //

public function Index(){
  $footers = Footer::latest()->get();

      $footers = Footer::latest()->get();
      return view('admin/footer/index',compact('footers'));
 // $footers = Footer::find(1);
 // return view('admin/footer/index',compact('footers'));
}

  public function Edit($id)
  {
    $footer = Footer::findOrFail($id);
  
    return view('admin/footer/edit',
      compact('footer'));
  }
public function FooterUpdate(Request $request){
  $footer = $request->id;
  Footer::FindOrfail($footer)->Update([
    'address' => $request->get('address'),
    'phone_no' => $request->get('phone_no'),
    'email' => $request->get('email'),
    'facebook_id' => $request->get('facebook_id'),
    'twitter_id' => $request->get('twitter_id'),
    'youtube_id' => $request->get('youtube_id'),
    'pintrust_id' => $request->get('pintrust_id')


  ]);
   
     return redirect()->to('/admin/footer');
}


}





























// 	public function SliderEdit($id){

// 		$slider = defaultmodel::findOrFail($id);
// 	return view('admin/slider/edit', compact('slider'));
// }


// public function SliderUpdate(Request $request){
// 	 	$request->validate([
//       'slider_img' => 'required',
//   	]);
//   $slider = defaultmodel::findOrFail($request->id);




//  $currentImage = $slider->slider_img;
//  $fileName = null;


//   if ($request->file('slider_img')) {
//       $manager = new ImageManager(new Driver());
//         $name_gen = hexdec(uniqid()).'.'.$request->file('slider_img')->getClientOriginalExtension();
//         $img = $manager->read($request->file('slider_img'));
//         $img = $img->resize(1549,516);
//         $img->tojpeg(80)->save(base_path('public/admin_imgs/slider/'.$name_gen));
//         $save_url = 'admin_imgs/slider/'.$name_gen;
//     }
//         // Update the slider record in the database
//         $slider->Update([
//     	'slider_img' => ($save_url) ? $save_url : $currentImage,
//     ]);


//     if ($save_url) {
//       File::delete('./admin_imgs/slider/' . $currentImage);
//     }
//    // Notification setup
//         // Redirect with notification
//         return redirect()->route('slider.all');
//        // Handle case where no image is provided
//     }
   
// }





// public function SliderUpdate(Request $request){
//     // Fetch the slider object from the database using the ID from the request
//     $slider = defaultmodel::findOrFail($request->id);
//     // $currentImage = $slider->slider_img;
//     $currentImage = request()->file('slider_img');

//     if ($request->file('slider_img')) {
      
        
         
//       $manager = new ImageManager(new Driver());
//         $name_gen = hexdec(uniqid()).'.'.$request->file('slider_img')->getClientOriginalExtension();
//         $img = $manager->read($request->file('slider_img'));
//         $img = $img->resize(1549,516);
//         $img->tojpeg(80)->save(base_path('public/admin_imgs/slider/'.$name_gen));
//         $save_url = 'admin_imgs/slider/'.$name_gen;

//         // Update the slider record in the database
//     //      defaultmodel::findOrFail($slider)->Update([
//     // 	'slider_img' => $save_url,
//     // ]);


       
//         $slider->update([
//           'slider_img' => ($save_url) ? $save_url : $currentImage
//       ]);
//              if ($save_url) {
//       File::delete('./public/admin_imgs/slider/' . $currentImage);
//     }
//         // Notification setup
//         $notification = [
//             'message' => 'Slider image updated successfully', 
//             'alert-type' => 'success'
//         ];

//         // Redirect with notification
//         return redirect()->route('slider.all')->with($notification);
//     }

//     // Handle case where no image is provided
//     return back()->withErrors(['error' => 'No image uploaded']);
// }













