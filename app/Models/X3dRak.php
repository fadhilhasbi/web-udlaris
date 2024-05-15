<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class X3dRak extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    # Multiple Upload
    protected $casts = [
        'rak_filepath' => 'array',
        'laci_filepath' => 'array',
        'add1_filepath' => 'array',
        'rak_originalname' => 'array',
        'laci_originalname' => 'array',
        'add1_originalname' => 'array',
        'rak_texture_filepath' => 'array',
        'laci_texture_filepath' => 'array',
        'add1_texture_filepath' => 'array',
    ];
}