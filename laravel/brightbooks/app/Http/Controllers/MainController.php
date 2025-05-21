<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Media;
use App\Models\Category;
use App\Models\Author;
use App\Models\Book;

class MainController extends Controller
{
  public function index()
  {
		$slider = Media::where(['status' => 'ACTIVE', 'media_type' => 'slider'])->limit(5)->get();
		$upcoming_books = Book::where('status', 'ACTIVE')->limit(5)->get();
		$downloaded_books = Book::orderBy('downloaded', 'DESC')->get();
		$recommended_books = Book::where('rating', '1')->get();
		$categories = Category::where('status', 'ACTIVE')->get();
		$books = Book::where('status', 'ACTIVE')->paginate(10);
		$author_feature = Author::where(['status' => 'ACTIVE', 'author_feature' => 'yes'])->inRandomOrder()->first();
		$galleries = Media::where(['status' => 'ACTIVE', 'media_type' => 'gallery'])->limit(6)->get();		
      return view('index',compact('slider','upcoming_books','downloaded_books','recommended_books','categories','books','author_feature','galleries') );

  }



  public function about()
  {
  	$teams = Team::where('status', 'ACTIVE')->limit(5)->get();
  	return view('about', compact('teams'));
  }

  public function gallery()
  {
  	$galleries = Media::where(['status' => 'ACTIVE', 'media_type' => 'gallery'])->paginate(8);
  	return view('gallery', compact('galleries'));
  }

  public function author()
  {
  	$searchTerm = request()->get('letter');
  	$authors = Author::where('title', 'LIKE', "$searchTerm%")->paginate(5);
  	$downloaded_books = Book::orderBy('downloaded', 'DESC')->limit(5)->get();
  	$author_features = Author::where('author_feature', 'yes')->limit(5)->get();
  	return view('author', compact('authors', 'downloaded_books', 'author_features'));
  }

  public function author_detail($slug)
  {
  	$author_detail = Author::where('slug', $slug)->first();
  	return view('author_detail', compact('author_detail'));
  }

  public function contact()
  {
  	return view('contact');
  }
}
