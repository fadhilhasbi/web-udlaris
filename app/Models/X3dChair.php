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
        'model1_filepath' => 'array',
        'model2_filepath' => 'array',
        'model3_filepath' => 'array',
        'model1_originalname' => 'array',
        'model2_originalname' => 'array',
        'model3_originalname' => 'array',
        'model1_texture_filepath' => 'array',
        'model2_texture_filepath' => 'array',
        'model3_texture_filepath' => 'array',
        'price1' => 'array',
        'price2' => 'array',
        'price3' => 'array',
    ];
}
