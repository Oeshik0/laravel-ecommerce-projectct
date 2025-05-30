<?php

namespace App\Models;

use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'catagory_id',
        'name',
        'slug',
        'brand',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',

    ];
    public function catagory()
    {
        return $this->belongsTo(Catagory::class, 'catagory_id','id');
    }
    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id','id');
    }
    public function productColors(){
        return $this->hasMany(ProductColor::class,'product_id','id');
    }
}
