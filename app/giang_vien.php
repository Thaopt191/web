<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class giang_vien extends Model
{
    protected $table = 'giang_vien';
    protected $fillable = [
    'ho_ten',
    'id_bo_mon',
    ];

    public $timestamps = true;
}
