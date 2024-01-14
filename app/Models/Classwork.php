<?php

namespace App\Models;

use App\Enums\ClassworkTypes;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Classwork extends Model
{
    use HasFactory;


    const TYPE_ASSIGNMENT = ClassworkTypes::ASSIGNMENT;
    const TYPE_MATERIAL = ClassworkTypes::MATERIAL;
    const TYPE_QUESTION = ClassworkTypes::QUESTION;
    const STATUS_PUBLISHED = 'published';
    const STATUS_DRAFT = 'draft';

    protected $fillable = [
        'classroom_id',
        'user_id',
        'topic_id',
        'title',
        'description',
        'type',
        'status',
        'published_at',
        'options'
    ];

    protected $casts = [
        'options' => 'json',
        'published_at' => 'date',
        'type' => ClassworkTypes::class,
        'classroom_id' => 'integer'
    ];

    protected static function booted()
    {
        parent::booted();

        static::creating(function (Classwork $classwork) {
            if (!$classwork->published_at) {
                $classwork->published_at = date(now());
            }
        });
    }

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class, 'classroom_id', 'id');
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot(['grade', 'submitted_at', 'status', 'created_at'])
            ->using(ClassworkUser::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->latest();
    }

    public function getPublishedDateAttribute($value)
    {

        if ($this->published_at) {
            return $this->published_at->format('Y-m-d');
        }
    }
}
