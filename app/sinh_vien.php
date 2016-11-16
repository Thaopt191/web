<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sinh_vien extends Model
{
    protected $table = 'sinh_vien';
    protected $fillable = ['ho_ten',
    'khoa_hoc',
    'id_khoa',
    'id_de_tai',
    ];

    public $timestamps = true;
}
