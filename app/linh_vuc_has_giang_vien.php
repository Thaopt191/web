<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class linh_vuc_has_giang_vien extends Model
{	
	protected $table = 'linh_vuc_has_giang_vien';
    protected $fillable = ['id_giang_vien',
    'id_sinh_vien',
    ];

	public $timestamps = true;    
}
