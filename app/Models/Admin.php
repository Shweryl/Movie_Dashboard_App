<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function creatMovies(){
        return $this->hasMany(Movie::class);
    }

    public function genre(){
        return $this->belongsToMany(Genre::class);
    }

    public function movies(){
        return $this->belongsToMany(Movie::class);
    }
}
