<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCheckout extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_name',
        'user_password',
        'user_email',
        'user_phone'
    ];

    protected $primaryKey = 'user_id';
    protected $table = 'tbl_user';
}
