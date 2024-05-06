<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'wards_name',
        'wards_type',
        'district_id'
    ];
    protected $primaryKey = 'wards_id';
    protected $table = 'tbl_wards';

    public function dictrict(){
        return $this->belongsTo(District::class,'district_id');
    }

}
