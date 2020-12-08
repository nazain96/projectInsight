<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pending_Events extends Model
{
    //
    public function sidmapping(){
    	return $this->belongsTo('App\Sid_Mappings');
    }
}
