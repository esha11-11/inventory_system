<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Country;
use App\Models\Category;
use App\Models\Author;
use File;

class BookController extends Controller
{
  public function index()
  {
    $searchTerm = request()->get('s');
    $books = Book::orWhere('title', 'LIKE', "%$searchTerm%")->latest()->paginate(15);
   
  	return view('admin/book/index')
    ->with(compact('books'));
  }

  public function create()
  {
    $books = Book::get('category_id');
    $countries = Country::get();
    $categories = Category::get();
    $authors = Author::get();
    return view('admin/book/create')
      ->with(compact('countries','books', 'categories', 'authors'));
  }

  public function store(Request $request)
  {
 $fileName = null;
    if (request()->hasFile('book_img')) 
    {
      $file = request()->file('book_img');
      $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
      $file->move('./admin_imgs/books/', $fileName);
    }

    Book::create([
      'title' => $request->get('title'),
      'slug' => $request->get('slug'),
      'author_id' => $request->get('author_id'),
      'category_id' => $request->get('category_id'),
      'availability' => $request->get('availability'),
      'price' => $request->get('price'),
      'rating' =>'1',
      'publisher' => $request->get('publisher'),
      'country_of_publisher' => $request->get('country_of_publisher'),
      'isbn' => $request->get('isbn'),
      'isbn-10' => 'isbn-10',
      'audience' => $request->get('audience'),
      'format' => $request->get('format'),
      'language' => 'language',
      'description' => 'description',
      'book_upload' => 'no pdf found',
      'book_img' => $fileName,
      'total_pages' => 'total_pages',
      'downloaded' => 'downloaded',
      'edition_number' => 'edition_number',
      'recommended' => 'recommended',
      'status' => 'DEACTIVE',
      'created_by' => '1',
      'updated_by' => '1'
    ]);

 $notification = array(
            'message' => 'Book Created Successfully', 
            'success' => 'success'
        );

    return redirect()->to('/admin/book')->with($notification); 
  }

  public function edit($id)
  {
    $book = Book::findOrFail($id);
    $categories = Category::get();
    $authors = Author::get();
    $countries = Country::get();
    return view('admin/book/edit')
      ->with(compact('book', 'categories', 'authors','countries'));
  }
  
 

  public function update(Request $request, $id)
  {
    $book = Book::findOrFail($id);
     $currentImage = $book->book_img;
 	$fileName = null;
    if (request()->hasFile('book_img')) 
    {
      $file = request()->file('book_img');
      $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
      $file->move('./admin_imgs/books/', $fileName);
    }

     $book->update([
      'title' => $request->get('title'),
      'slug' => $request->get('slug'),
      'author_id' => $request->get('author_id'),
      'category_id' => $request->get('category_id'),
      'availability' => $request->get('availability'),
      'price' => $request->get('price'),
      'rating' =>'1',
      'publisher' => $request->get('publisher'),
      'country_of_publisher' => $request->get('country_of_publisher'),
      'isbn' => $request->get('isbn'),
      'isbn-10' => 'isbn-10',
      'audience' => $request->get('audience'),
      'format' => $request->get('format'),
      'language' => 'language',
      'description' => 'description',
      'book_upload' => 'no pdf found',
      'book_img' =>($fileName) ? $fileName : $currentImage,
      'total_pages' => 'total_pages',
      'downloaded' => 'downloaded',
      'edition_number' => 'edition_number',
      'recommended' => 'recommended',
      'status' => 'DEACTIVE',
      'created_by' => '1',
      'updated_by' => '1'
  	]);

    if ($fileName) {
      File::delete('./admin_imgs/books/' . $currentImage);
    }
    
  	return redirect()->to('/admin/book');
  }



  public function status($id)
  {
    sleep(1);
    $book = Book::findOrFail($id);
    $newStatus = ($book->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
    $book->update([
      'status' => $newStatus
    ]);
    
    echo $newStatus;
  } 
  // public function status($id)
  // {

  //   $book = Book::findOrFail($id);
  //   $newStatus = ($book->status == 'DEACTIVE') ?'AVTIVE' : 'DEACTIVE';
  //   $book->update([
  //     'status' => $newStatus
  //   ]);
    
  //   return redirect()->back();
  // }




public function delete($id)
  {
	$book = Book::findOrFail($id);
	$currentImage = $book->book_img;
	$book->delete();
File::delete('./admin_imgs/books/' . $currentImage);
    return 'true';
    // return redirect()->back();
  }





  public function status_active(Request $request)
  {
    $checkAll = $request->get('checkAll');
    foreach ($checkAll as $id) {
      echo Book::where('id', $id)->update([
        'status' => 'ACTIVE'
      ]);
    }
  }

  public function status_deactive(Request $request)
  {
    $checkAll = $request->get('checkAll');
    foreach ($checkAll as $id) {
      echo Book::where('id', $id)->update([
        'status' => 'DEACTIVE'
      ]);
    }
  }

  public function delete_all(Request $request)
  {
    $checkAll = $request->get('checkAll');
    foreach ($checkAll as $id) {
      echo Book::where('id', $id)->delete();
    }


}


}