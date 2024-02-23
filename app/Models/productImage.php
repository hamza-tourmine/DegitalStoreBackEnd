<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productImage extends Model
{
    use HasFactory;
    public $table = 'product_image';
    public $timestamps = false;
    public $fillable  = ['image' ,'Product_id'];
    // public function product()
    // {
    //     return $this->belongsTo(Product::class );
    // }
}
