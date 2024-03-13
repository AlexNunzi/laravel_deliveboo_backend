<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Models\Food;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        $user = User::find(Auth::user()->id);

        $foods = Food::where('restaurant_id', $user->restaurant->id)->get();

        return view('admin.foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.foods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodRequest $request)
    {

        $form_data = $request->validated();

        if ($request->has('visibility')) {
            $form_data['visibility'] = true;
        } else {
            $form_data['visibility'] = false;
        }

        $user = User::find(Auth::user()->id);

        $form_data['restaurant_id'] = $user->restaurant->id;

        $form_data['slug'] = Food::generateSlug($request->name, $user->restaurant->id);

        $checkPost = Food::where('slug', $form_data['slug'])->first();
        if ($checkPost) {
            return back()->withInput()->withErrors(['slug' => 'Impossibile creare lo slug per questo piatto, cambia il nome']);
        }

        if ($request->hasFile('image')) {
            $img_path = Storage::put('image', $request->image);
            $form_data['image'] = $img_path;
        }

        $newFood = Food::create($form_data);

        return redirect()->route('admin.foods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        if ($food->restaurant_id == Auth::user()->restaurant->id) {
            return view('admin.foods.show', compact('food'));
        } else {
            return view('admin.error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        if ($food->restaurant_id == Auth::user()->restaurant->id) {
            return view('admin.foods.edit', compact('food'));
        } else {
            return view('admin.error');
        }
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
        if ($food->restaurant_id == Auth::user()->restaurant->id) {

            $validated_data = $request->validated();

            if ($request->has('visibility')) {
                $validated_data['visibility'] = true;
            } else {
                $validated_data['visibility'] = false;
            }
            $validated_data['slug'] = Food::generateSlug($request->name, $food->restaurant->id);
            $checkFood = Food::where('slug', $validated_data['slug'])->where('id', '<>', $food->id)->first();

            if ($checkFood) {
                return back()->withInput()->withErrors(['slug' => 'Non è possibile generare lo slug!']);
            }



            if ($request->hasFile('image')) {

                if ($food->image) {
                    Storage::delete($food->image);
                }

                $img_path = Storage::put('image', $request->image);
                $validated_data['image'] = $img_path;
            }

            $food->update($validated_data);
            return redirect()->route('admin.foods.index');
        } else {
            return view('admin.error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        if ($food->restaurant_id == Auth::user()->restaurant->id) {
            if ($food->image) {
                Storage::delete($food->image);
            }
            $food->delete();
            return redirect()->route('admin.foods.index');
        } else {
            return view('admin.error');
        }
    }

    public function deleteImage($slug)
    {

        $food = Food::where('slug', $slug)->firstOrFail();

        if ($food->image) {
            Storage::delete($food->image);
            $food->image = null;
            $food->save();
        }

        return redirect()->route('admin.foods.edit', $food->slug);
    }

    public function getDbFoods($foodIds)
    {
        foreach ($foodIds as $food) {
            $food_ids[] = $food['id'];
        }

        $food_ids = array_unique($food_ids);

        return Food::whereIn('id', $food_ids)->get();
    }
}
