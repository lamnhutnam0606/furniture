<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'district_name',
        'district_type',
        'city_id'
    ];
    protected $primaryKey = 'district_id';
    protected $table = 'tbl_district';
    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }

}
