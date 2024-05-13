<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'order_total',
        'order_code',
        'order_status',
        'customer_id',
        'shipping_id',
        'payment_id',
        'created_at',
    ];
    
    protected $primaryKey = 'order_id';

    protected $table = 'tbl_order';

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
    public function shipping(){
        return $this->belongsTo(Shipping::class,'shipping_id');
    }
    public function payment(){
        return $this->belongsTo(Payment::class,'payment_id');
    }
}
