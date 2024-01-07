<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Classroom extends Model
{
    use HasFactory;

    public static string $disk='public';

    protected $fillable = [
        'name',
        'code',
        'status',
        'section',
        'subject',
        'room',
        'cover_image_path',
        'theme',
    ];

    public static function uploadCoverImage($file)
    {
        return  $file->store('/covers', [
           'disk'=> static::$disk
        ]);

    }
    public static function deleteCoverImage($path)
    {
       return Storage::disk(static::$disk)->delete($path);
    }
}
