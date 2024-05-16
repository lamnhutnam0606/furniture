<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'customer_id',
        
    ];
    protected $primaryKey = 'wishlist_id';
    protected $table = 'tbl_wishlist';

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
}
