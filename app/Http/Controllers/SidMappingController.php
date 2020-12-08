<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sid_Mappings;
use App\Pending_Events;
use App\ReviewEvents;


class SidMappingController extends Controller
{
    //
    public function index(){

    	$sid = Sid_Mappings::all();

        return view('sid_mapping', compact('sid'));
    }

    public function sidReview($sid){

    	// $event1 = Pending_Events::where('sid', $sid)->first();

    	$event = ReviewEvents::where('sid', $sid)->first();

    	// return $event;

    	if(is_null($event)){
    		return redirect(route('sidmapping'))->with('successMsg', 'No pending events found!');
    	}
    	else{
    		return view('sid_review', compact('event'));
    	}
    	
    }

    public function stateUpdate(Request $request, $sid){

    	// $req = $request->sid;

    	$sids = Sid_Mappings::where('sid', $sid)->first();

    	$sids->state = $request->state;

    	if($sids->state == '2' || $sids->state == '0'){
            
            $event = Pending_Events::where('sid',$sid)->delete();
            $review = ReviewEvents::where('sid',$sid)->delete();
            // foreach ($event as $events) {
            // 	$events->delete();
            // }
        }

        $sids->save();

        return redirect(route('sidmapping'))->with('successMsg', 'SID State Updated!');
    }
}
