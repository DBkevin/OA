<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departmernt extends Model
{
    //
    public function Post(){
        return $this->hasMany(Post::class);
    }
}
