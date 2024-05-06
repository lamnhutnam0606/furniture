<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'product_name','product_price','product_desc','product_content','product_img','product_status',
        'category_id','brand_id'
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'tbl_product';

    public function brand(){
        //truyền khóa ngoại từ $fillable vào đây để
        //có thể truy xuất data từ collection $product
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function category(){
         //truyền khóa ngoại từ $fillable vào đây để
        //có thể truy xuất data từ collection $product
        return $this->belongsTo(Category::class,'category_id');
    }
}
