<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'customer_id','product_id','review_content'
    ];
    protected $primaryKey = 'review_id';
    protected $table = 'tbl_reviews';

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
}
