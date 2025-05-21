<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
  use HasFactory;
  protected $table = 'author';
  protected $guarded = ['id', 'created_at', 'updated_at' ];
  // protected $fillable = ['title', 'slug', 'designation', 'dob' '...'];


  public function author_books()
  {
  	return $this->hasMany(Book::class, 'author_id');
  }


}
