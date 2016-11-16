<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bo_mon extends Model
{
    protected $table = 'bo_mon';
    protected $fillable = ['ten',
    'mo_ta',
    'id_khoa',
    ];

    public $timestamps = true;
}
