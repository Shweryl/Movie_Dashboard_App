<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'movie_image',
        'release',
        'rating',
        'movie_type_id',
        'director_id',
        'production_id',
        'admin_id',
        'trailer_link'
    ];

    use SoftDeletes;

    public function actors(): BelongsToMany {
        return $this->belongsToMany(Actor::class);
    }

    public function genres(){
        return $this->belongsToMany(Genre::class);
    }

    public function movieType(){
        return $this->belongsTo(MovieType::class);
    }

    public function director(){
        return $this->belongsTo(Director::class);
    }

    public function production(){
        return $this->belongsTo(Production::class);
    }

    public function admins(){
        return $this->belongsToMany(Admin::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
