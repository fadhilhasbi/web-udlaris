<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class X3dTable extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    # Multiple Upload
    protected $casts = [
        'papan_filepath' => 'array',
        'kaki_filepath' => 'array',
        'rak_filepath' => 'array',
        'papan_originalname' => 'array',
        'kaki_originalname' => 'array',
        'rak_originalname' => 'array',
        'papan_texture_filepath' => 'array',
        'kaki_texture_filepath' => 'array',
        'rak_texture_filepath' => 'array',
    ];
}