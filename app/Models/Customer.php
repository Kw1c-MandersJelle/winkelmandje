<?php

namespace App\Models;

use App\Http\Controllers\OrderController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        '',
    ];

    public function orders(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

}
