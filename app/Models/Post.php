<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public  function Doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function setZXImagesAttribute($images)
    {
        if (is_array($images)) {
            $this->attributes['ZXimages'] = json_encode($images);
        }
    }
    public function setWCImagesAttribute($images)
    {
        if (is_array($images)) {
            $this->attributes['WCimages'] = json_encode($images);
        }
    }
    public function setPFImagesAttribute($images)
    {
        if (is_array($images)) {
            $this->attributes['PFimages'] = json_encode($images);
        }
    }
    public function setKQImagesAttribute($images)
    {
        if (is_array($images)) {
            $this->attributes['KQimages'] = json_encode($images);
        }
    }
    public function getZXImagesAttribute($images)
    {
        return json_decode($images, true);
    }

    public function getPFImagesAttribute($images)
    {
        return json_decode($images, true);
    }
    public function getKQImagesAttribute($images)
    {
        return json_decode($images, true);
    }

    public function Type()
    {
        return $this->belongsToMany(Type::class, 'posts_types', 'type_id', 'post_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
