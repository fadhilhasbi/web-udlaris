<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class X3dCabinet extends Model
{

    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    # Multiple Upload
    protected $casts = [
        'add1_filepath' => 'array',
        'add2_filepath' => 'array',
        'add3_filepath' => 'array',
        'add4_filepath' => 'array',
        'add1_originalname' => 'array',
        'add2_originalname' => 'array',
        'add3_originalname' => 'array',
        'add4_originalname' => 'array',
        'add1_texture_filepath' => 'array',
        'add2_texture_filepath' => 'array',
        'add3_texture_filepath' => 'array',
        'add4_texture_filepath' => 'array',
    ];
}