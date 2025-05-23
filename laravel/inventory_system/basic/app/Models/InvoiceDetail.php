<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

     public function product(){
    	return $this->belongsTo(product::class, 'product_id','id');
    }
  
      public function category(){
    	return $this->belongsTo(Category::class, 'category_id','id');

}
