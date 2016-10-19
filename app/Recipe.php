<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function image() {
      return $this->hasOne('App\Image');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
