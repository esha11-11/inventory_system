<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  use HasFactory;
  protected $table = 'book';
    protected $guarded = ['id'];

   public function author()
  {
    return $this->belongsTo(Author::class, 'author_id', 'id');
  }

  public function category()
  {
    return $this->belongsTo(Category::class, 'category_id');
  }
    public function country()
  {
    return $this->belongsTo(country::class, 'country_of_publisher','id');
  }

}
