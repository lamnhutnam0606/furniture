<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'campaign_name','campaign_type','campaign_value','product_id'
    ];
    protected $primaryKey = 'campaign_id';
    protected $table = 'tbl_promotion_campaign';

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
