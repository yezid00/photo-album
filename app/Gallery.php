<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function user(){
    	return $this->belongsTO('App\User');
    }
}
