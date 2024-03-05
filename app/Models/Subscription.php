<?php

namespace App\Models;

use App\Conserns\HasPrice;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Subscription extends Model
{
    use HasFactory,HasPrice,Prunable;

    protected $fillable = [
        'plan_id',
        'user_id',
        'expired_at',
        'price',
        'period',
        'status'
    ];
    public function prunable(): Builder
    {
        return static::whereDate('expired_at','=',now());
    }

    public function price(): Attribute
    {
        return new Attribute(
            get: fn($price) => $price / 100,
            set: fn($price) => $price * 100,
        );
    }



    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    public function getPayImageAttribute(): string
    {

        return 'https://i.postimg.cc/GpdDYYv7/temp-Image-Kvqitn.avif';
    }
}
