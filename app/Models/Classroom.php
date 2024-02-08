<?php

namespace App\Models;

use App\Models\Scopes\UserClassroomScope;
use App\Observers\ClassroomObserver;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class Classroom extends Model
{
    use HasFactory, SoftDeletes;

    public static string $disk = 'public';

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


    protected static function booted()
    {
        static::addGlobalScope(new UserClassroomScope());
        static::observe(ClassroomObserver::class);


//        static::addGlobalScope('user',function (Builder $query){
//            $query->where('user_id','=',Auth::id());
//        });
//         I can use withoutGlobalScope({name of global scope }) or withoutGlobalScopes() to avoid  scopes
    }

    public function classworks(): HasMany
    {
        return $this->hasMany(Classwork::class);
    }

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }

    public function users()
    {
        return $this->belongsToMany(
            User::class,           // related model
            'classroom_user',       // pivot table
            'classroom_id', // FK for current model in pivot table
            'user_id',      // FK for related model in pivot table
            'id',               // PK for currant model
            'id'                // PK for related model

        )->withPivot(['role','created_at']);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function students()
    {
        return $this->users()->wherePivot('role', '=', 'student');
    }

    public function teachers()
    {
        return $this->users()->wherePivot('role', '=', 'teacher');
    }


    public static function uploadCoverImage($file)
    {
        return $file->store('/covers', [
            'disk' => static::$disk
        ]);

    }
    public function posts()
    {
        return $this->hasMany(Post::class,'classroom_id');
    }

    public function streams() :HasMany
    {
        return $this->hasMany(Stream::class,'classroom_id','id');
    }
    public static function deleteCoverImage($path)
    {
        if ($path && Storage::disk(static::$disk)->exists($path)) {
            return Storage::disk(static::$disk)->delete($path);
        }
    }

    // local scopes

    public function scopeActive(Builder $query)
    {
        $query->where('status', '=', 'active');
    }

    public function scopeRecent(Builder $query)
    {
        $query->orderBy('updated_at', 'DESC');
    }

    public function scopeStatus(Builder $query, string $status = 'active')
    {
        $query->where('status', '=', $status);

    }

    public function join(string $user_id, string $role = 'student')
    {
        $exists = $this->users()
            ->where('id', '=', $user_id)
            ->exists();

        if ($exists) {
            throw new \Exception('this user joined in this classroom');
        }
        $this->users()->attach($user_id,[
            'role'=>$role,
            'created_at'=>now()
        ]);

    }


    /*   --------------------   Accessors   --------------------- */

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }
    protected $appends =[
        'cover_image_url'
    ];
    protected $hidden=[
        'deleted_at',
        'cover_image_path'
    ];

    public function getCoverImageUrlAttribute()
    {
        if ($this->cover_image_path) {
            return  Storage::disk(static::$disk)->url($this->cover_image_path);
        }
        return 'https://placehold.co/600x165/033E3E/@2x.png?text=' . $this->name;

    }
    public function scopeFilter(Builder $builder, $filters)
    {

        $builder->when($filters['search'] ?? '', function ($builder, $value) {
            $builder->where(function ($builder) use ($value) {
                $builder->where('name', 'LIKE', "%{$value}%")
                    ->orWhere('section', 'LIKE', "%{$value}%");
            });

        })
       ;

    }


    ///  rout to show action
    public function getUrlAttribute()
    {
        return route('classrooms.show', $this->id);

    }


    public function getInvitationLinkAttribute()
    {
        return URL::signedRoute('classrooms.join', [
            'classroom' => $this->id,
            'code' => $this->code,
        ]);
    }


    /*   --------------------   Mutators   --------------------- */


    /*   public function setSectionAttribute($value)
       {
           $this->attributes['section']=strtoupper($value);
       }*/

//  make set (mutator) and get(accessor) in the same function
    public function section(): Attribute
    {
        return Attribute::make(
            get: fn(?string $value) => ucwords($value),
            set: fn(?string $value) => strtolower($value)
        );
    }



    /*   --------------------   casts   --------------------- */


//
//    protected $casts=[
////        'room'=>'boolean'
////        'created_at'=>'datetime:y.m.d'
////        'is_admin'=>'boolean',
////        'option'=>'array',
//
//    ];


    /*   --------------------   Events   --------------------- */

    /**
     *   declaration in {booted()} function in model  or on {Observer}
     *
     * Creating    => event before create
     * Created     => event after  create
     * Updating    => event before update
     * Updated     => event after update
     * Saving      => event before create || update
     * Saved       => event after create || update
     * Deleting    => event before delete
     * Deleted     => event after delete
     *
     * * when use soft delete
     *
     * Restoring
     * Restored
     * ForceDeleting
     * ForceDeleted
     *
     * * * * * * **
     * Retrieved  *
     * * * * * * **
     *
     * findOrFail , old , get , first -> after select
     *
     *
     * */

}
