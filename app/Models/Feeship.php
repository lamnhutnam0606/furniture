<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeship extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'fee_cityId',
        'fee_districtId',
        'fee_wardsId',
        'fee_feeship'
    ];
    protected $primaryKey = 'fee_id';
    protected $table = 'tbl_feeship';
    public function city(){
        return $this->belongsTo(City::class,'fee_cityId');
    }
    public function district(){
        return $this->belongsTo(District::class,'fee_districtId');
    }
    public function wards(){
        return $this->belongsTo(Wards::class,'fee_wardsId');
    }
}
