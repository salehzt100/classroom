<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Stream extends Model
{
    use HasFactory, HasUuids;

    protected $fillable =
        [
            'user_id',
            'classroom_id',
            'link',
            'content',
        ];

    public function getUpdatedAtColumn()
    {
    }

    public function uniqueIds()
    {
        return [
            'id'
        ];
    }

//    public static  function booted()
//    {
//        static::creating(function (Stream $stream)
//        {
//            $stream->id=Str::uuid();
//        });
//    }


    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function classroom() :BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }
}
