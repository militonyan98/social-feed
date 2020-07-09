<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function canEdit(){
        if($this->user_id == auth()->id()){
            return true;
        }
        return false;
    }
}
