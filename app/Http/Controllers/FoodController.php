<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(StoreFoodRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        return view('admin.foods.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoodRequest $request, Food $food)
    {
        $validated_data = $request->validated();
        $validated_data['slug'] = Food::generateSlug($request->name);

        $checkFood = Food::where('slug', $validated_data['slug'])->where('id', '<>', '$food->id')->first();

        if ($checkFood) {
            return back()->withInput()->withErrors(['slug' => 'Non è possibile generare lo slug!']);
        }

        //DA GUARDARE MEGLIO LA GESTIONE DELL'IMMAGINE!

        // if ($request->image) {
        //     Storage::delete($food->image);
        //     $image = Storage::disk('public')->put('image_restaurants', $request->image);
        //     $validatedData['image'] = $image;
        // }

        $food->update($validated_data);
        return redirect()->route('admin.foods.show', ['food' => $food->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();
        return redirect()->route('admin.foods.index');
    }
}
