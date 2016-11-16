<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khoa extends Model
{
    protected $table = 'sinh_vien';
    protected $fillable = ['ten',
    'so_luong_sinh_sv',
    'id_de_tai',
    ];

    protected $hidden = ['admin_id',
    ]

    public $timestamps = true;
}
