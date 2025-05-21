<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Supplier(){
    	return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
      public function Unit(){
    	return $this->belongsTo(Unit::class,'unit_id', 'id');
    }
    public function Category(){
    	return $this->belongsTo(Category::class,'category_id', 'id');
    }
}
