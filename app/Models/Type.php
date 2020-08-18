<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    public function Post(){
        return $this->belongsToMany(Post::class,'posts_types','post_id','type_id');
    }
}
