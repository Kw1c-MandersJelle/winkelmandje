<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
    ];

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(order::class)->withPivot('amount');
    }

//    public function orders(): HasMany
//    {
//        return $this->hasMany(order::class);
//    }
}
