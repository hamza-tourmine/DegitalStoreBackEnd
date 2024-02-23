<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Categorie extends Model
{
    use HasFactory;
    public $table ='catigories';
    public $timestamps = false;
    public $fillable = ['name',	'ProductId'];
    // Category.php
    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }

}
