<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function house(){
        return $this->belongsTo(Area::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}
