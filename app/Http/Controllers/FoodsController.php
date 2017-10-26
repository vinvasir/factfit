<?php

namespace App\Http\Controllers;

use App\Day;
use App\Food;
use App\FoodTypes\FoodTypeFactory;
use App\Transformers\FoodTransformer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FoodsController extends Controller
{
    /**
     * @var  App\Transformers\FoodTransformer
     */
    protected $foodTransformer;

    // public function __construct(FoodTransformer $foodTransformer)
    // {
    //     $this->foodTransformer = $foodTransformer;
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Day $day)
    {
        return response()->json([
            'foods' => (new FoodTransformer)->transformCollection($day->foods)
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Day $day)
    {
        $food = new Food();

        $foodTypes = FoodTypeFactory::foodTypeNames();

        return view('foods.create', compact('day', 'food', 'foodTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Day $day)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'type_name' => 'required',
            'processed' => 'required',
            'meal' => 'required',
        ]);

        $day->addFood([
            'user_id' => $day->user->id,
            'name' => request('name'),
            'description' => request('description'),
            'type_name' => request('type_name'),
            'processed' => request('processed'),
            'meal' => request('meal')
        ]);

        return redirect('/app/days/' . $day->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        //
    }
}
