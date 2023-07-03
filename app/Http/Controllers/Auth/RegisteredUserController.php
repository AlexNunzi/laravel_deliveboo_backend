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
use Illuminate\Support\Facades\Validator;

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

        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required', 'string', 'max:255'],
                'restaurant_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'address' => ['required', 'string', 'max:100'],
                'p_iva' => ['required', 'string', 'max:12'],
                'image' => ['nullable', 'image', 'max:2048'],
                'decription' => ['nullable', 'string', 'max:2000'],
                'type' => ['required', 'exists:types,id'],

            ],
            [
                'name.required' => "Il nome è obbligatorio",
                'name.max' => "I caratteri massimi del nome sono :max",
                'name.string' => "Il nome deve essere una stringa",
                'restaurant_name.required' => "Il nome del ristorante è obbligatorio",
                'restaurant_name.string' => "Il nome del ristorante deve essere una stringa",
                'restaurant_name.max' => "I caratteri massimi del nome del ristorante sono :max",
                'email.required' => "L'email è obbligatoria",
                'email.string' => "L'email deve essere una stringa",
                'email.email' => "L'email deve avere un formato coerente (es. info@deliveboo.com)",
                'email.max' => "L'email deve avere al massimo :max caratteri",
                'email.unique' => "L'email è gia presente nei nostri database",
                'password.required' => "La password è obbligatoria",
                'password.confirmed' => "Le password devono combaciare",
                'address.required' => "L'indirizzo è obbligatorio",
                'address.string' => "L'indirizzo deve essere una stringa",
                'address.max' => "L'indirizzo deve avere al massimo :max caratteri",
                'p_iva.required' => "La partita iva è obbligatoria",
                'p_iva.string' => "La partita iva deve essere una stringa",
                'p_iva.max' => "La partita iva deve avere al massimo :max caratteri",
                'image.image' => "L'immagine deve essere un file",
                'image.max' => "L'immagine deve pesare al massimo :max KB",
                'description.string' => "La descrizione deve essere una stringa",
                'description.max' => "La descrizione deve avere al massimo :max caratteri",
                'type.exists' => "La tipologia deve esistere nel database",
                'type.required' => "Devi selezionare almeno una tipologia",
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $restaurant_information = new RestaurantController;
        $restaurant_information->store([
            'user_id' => $user->id,
            'name' => $request->restaurant_name,
            'address' => $request->address,
            'p_iva' => $request->p_iva,
            'image' => $request->image,
            'description' => $request->description,
            'type' => $request->type

        ]);
        return redirect(RouteServiceProvider::HOME);
    }
}
