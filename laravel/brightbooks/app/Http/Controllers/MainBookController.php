<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;

class MainBookController extends Controller
{
   public function show($slug)
   {
   		$book = Book::where('slug', $slug)->first();
   		return view('book_detail', compact('book'));
   }
}
