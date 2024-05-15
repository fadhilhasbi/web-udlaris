<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class X3dChair extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    # Multiple Upload
    protected $casts = [
        'papan_filepath' => 'array',
        'kaki_filepath' => 'array',
        'senderan_filepath' => 'array',
        'add1_filepath' => 'array',
        'papan_originalname' => 'array',
        'kaki_originalname' => 'array',
        'senderan_originalname' => 'array',
        'add1_originalname' => 'array',
        'papan_texture_filepath' => 'array',
        'kaki_texture_filepath' => 'array',
        'senderan_texture_filepath' => 'array',
        'add1_texture_filepath' => 'array',
    ];
}
