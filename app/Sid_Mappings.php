<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sid_Mappings extends Model
{
    //
    public function events(){
    	return $this->hasMany('App\Pending_Events');
    }
}
