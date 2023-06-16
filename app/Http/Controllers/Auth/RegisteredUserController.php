<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Admin\RestaurantController;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Type;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $types = Type::all();
        return view('auth.register', compact('types'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'restaurant_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string', 'max:100'],
            'p_iva' => ['required', 'string', 'max:12'],
            'image' => ['nullable','string', 'max:150'],
            'decription' => ['nullable','string', 'max:2000'],
            'type' => ['nullable', 'exists:types,id'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

       $restaurant_information = new RestaurantController;
       $restaurant_information->store([
        'user_id'=> $user->id,
        'name' => $request->restaurant_name,
        'address' =>$request->address,
        'p_iva' =>$request->p_iva,
        'image' =>'url',
        'description' =>$request->description,
        'type' => $request->type

       ]);
       return redirect(RouteServiceProvider::HOME);
    }
}
