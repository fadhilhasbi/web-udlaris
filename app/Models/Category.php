<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, foreignKey: 'parent_id');
    }

    public function child(): HasMany
    {
        return $this->hasMany(Category::class, foreignKey: 'parent_id');
    }
}
