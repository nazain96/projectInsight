<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pending_Events;
use App\Sid_Mappings;
use App\ReviewEvents;

class PendingEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $event = Pending_Events::all();

        return view('pending_events', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $check = $request->input('check_select');

        foreach ($check as $checks) {
            # code...
            $sid = Sid_Mappings::where('sid', $checks)->first();

            # create new sid_mapping if no record in database
            if($sid == null){

                $sid = new Sid_Mappings;
                $sid->sid = $checks;
                $sid->technique_name = $request->technique_name;
                $sid->threat_name = $request->threat_name;
                $sid->threat_class = $request->threat_class;
                $sid->severity = $request->severity;

                if($request->has('ignore')){
                    $sid->state = $request->ignore;
                    Pending_Events::where('sid',$checks)->first()->delete();
                }
                else{
                    $sid->state = 1;
                    $event = Pending_Events::where('sid',$checks)->first();
                    // $review = new ReviewEvents;
                    // $review->sid = $event->sid;
                    // $review->hits = $event->hits;
                    // $review->firstseen_at = $event->firstseen_at;
                    // $review->lastseen_at = $event->lastseen_at;
                    // $review->signature = $event->signature;
                    // $review->save();
                    // $events = Pending_Events::where('sid',$checks)->first()->delete();
                    $event->status = true;
                    $event->save();
                }
                

                $sid->save();
            }
            else {
                # update existing sid_mapping
                $sid->sid = $checks;
                $sid->technique_name = $request->technique_name;
                $sid->threat_name = $request->threat_name;
                $sid->threat_class = $request->threat_class;
                $sid->severity = $request->severity;

                if($request->has('ignore')){
                    $sid->state = $request->ignore;
                    Pending_Events::where('sid',$checks)->first()->delete();
                }
                else{
                    $sid->state = 1;

                    $event = Pending_Events::where('sid',$checks)->first();

                    // $review = ReviewEvents::where('sid',$checks)->first();

                    // if($review == null){#create new review data
                    //     $review = new ReviewEvents;
                    //     $review->sid = $event->sid;
                    //     $review->hits = $event->hits;
                    //     $review->firstseen_at = $event->firstseen_at;
                    //     $review->lastseen_at = $event->lastseen_at;
                    //     $review->signature = $event->signature;
                    //     $review->save();
                    // }
                    // else{#update existing review data
                    //     $review->sid = $event->sid;
                    //     $review->hits = $event->hits;
                    //     $review->firstseen_at = $event->firstseen_at;
                    //     $review->lastseen_at = $event->lastseen_at;
                    //     $review->signature = $event->signature;
                    //     $review->save();
                    // }
                    
                    // $events = Pending_Events::where('sid',$checks)->first()->delete();
                    $event->status = true;
                    $event->save();
                }

                $sid->save();
            }
            
        }
        
        return redirect(route('sidMapping'))->with('successMsg', 'Rules Successfully Generated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
