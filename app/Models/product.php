<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\productImage;
use App\Models\Categorie;
class product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected  $fillable = [
        'name','description','price','digitalFilePath','image','stockQuantity',
    ];

    public function review(){
        return $this->hasMany(review::class ,'productsId');
    }
    public function category()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function images()
    {
        return $this->hasMany(productImage::class);
    }
}



