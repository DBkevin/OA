<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
   public  function Doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function setImagesAttribute($images){
        if(is_array($images)){
            $this->attributes['images']=json_encode($images);
        }
    }
    public function getImagesAttribute($images){
        return json_decode($images,true);
    }

    public function Type(){
        return $this->belongsToMany(Type::class,'posts_types','type_id','post_id');
    }
}
