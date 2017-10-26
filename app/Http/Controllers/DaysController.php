<?php

namespace App\Http\Controllers;

use App\Day;
use Illuminate\Http\Request;

class DaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $days = auth()->user()->days;

        $calendar = \Calendar::setCallbacks([
            'dayClick' => 'function(calEvent, jsEvent, view) {
                var newDate = calEvent.format();
                console.log(newDate);
                window.location.href = "/app/days/create?date=" + newDate;
            }',
        ])->addEvents($days);

        // dd($calendar->script());

        return view('days.index', compact('days', 'calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $newDate = $request->query('date') ? $request->query('date') : \Carbon\Carbon::now("America/New_York")->toDateString();

        return view('days.create', compact('newDate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        auth()->user()->addDay(request('date'), request('weight'));

        return redirect('/app/days');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function show(Day $day)
    {
        $foods = $day->foods;

        if (request()->wantsJson()) {
            return $day;
        }

        return view('days.show', compact('day', 'foods'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function edit(Day $day)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Day $day)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function destroy(Day $day)
    {
        //
    }
}
