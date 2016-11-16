<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tai_khoan extends Model
{
    protected $table = 'tai_khoan';
    protected $fillable = ['name',
    'password',
    'email',
    ];

    protected $guarded =['loai_tai_khoan'];

    public $timestamps = true;
}
