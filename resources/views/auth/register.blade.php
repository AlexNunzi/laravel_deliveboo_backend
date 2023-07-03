@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form id="registration-form" method="POST" action="{{ route('register') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <h6 class="mb-5 mt-3">I campi contrassegnati da (*) sono obbligatori</h6>
                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome Utente (*)') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name', 'Brambilla Fumagalli') }}" autocomplete="name" autofocus
                                        required minlength="2" maxlength="255">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="restaurant_name" class="col-md-4 col-form-label text-md-right">Nome Ristorante
                                    (*)</label>

                                <div class="col-md-6">
                                    <input id="restaurant_name" type="text"
                                        class="form-control @error('restaurant_name') is-invalid @enderror"
                                        name="restaurant_name" value="{{ old('restaurant_name', 'Il telone') }}" required
                                        minlength="2" maxlength="100">

                                    @error('restaurant_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo (*)') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address', 'Via Giovanni da Procida') }}" autocomplete="address"
                                        required minlength="2" maxlength="100">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="p_iva"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA (*)') }}</label>

                                <div class="col-md-6">
                                    <input id="p_iva" type="text"
                                        class="form-control @error('p_iva') is-invalid @enderror" name="p_iva"
                                        value="{{ old('p_iva', '313131313131') }}" required autocomplete="p_iva"
                                        minlength="2" maxlength="12">

                                    @error('p_iva')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo Email (*)') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email', 'brambilla@iltelone.it') }}" required autocomplete="email"
                                        maxlength="255">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password (*)') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" minlength="8" value="ciaociao">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password (*)') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password" minlength="8"
                                        value="ciaociao">
                                    <span class="d-none text-danger password_equal_register fs-6">Le password inserite devo
                                        essere uguali</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Immagine</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Descrizione</label>
                                <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                                    name="description" maxlength="1000">{{ old('description', 'Voglia di cucina italiana? Da Il telone puoi trovare solo i migliori piatti. Prendi pure una cadrega e accomodati!') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <span class="pb-3 d-inline-block">Tipologia (*)</span>
                            <span class="d-none text-danger types_required_register fs-6">Devi selezionare almeno una
                                tipologia</span>
                            <div class="mb-3 d-flex flex-wrap">
                                @foreach ($types as $type)
                                    <div class="pe-3">
                                        <input class="register_check" id="type_{{ $type->id }}"
                                            onclick="disableButton()" @if (in_array($type->id, old('type', []))) checked @endif
                                            type="checkbox" name="type[]" value="{{ $type->id }}">
                                        <label for="type_{{ $type->id }}">{{ $type->name }}</label>
                                    </div>
                                @endforeach
                                @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="register_submit" type="submit" class="btn fancy-button bg-primary"
                                        disabled>
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const checkboxes = document.getElementsByClassName('register_check');
        const register_submit = document.getElementById('register_submit');
        const types_required_register = document.querySelector('.types_required_register');
        const register_password = document.getElementById('password');
        const register_password_confirm = document.getElementById('password-confirm');
        const password_equal_register = document.querySelector('.password_equal_register');
        const registrationForm = document.getElementById('registration-form');

        const registraionName = document.getElementById('name');
        const registraionRestaurantName = document.getElementById('restaurant_name');
        const registraionAddress = document.getElementById('address');
        const registraionPIva = document.getElementById('p_iva');
        const registraionMail = document.getElementById('email');
        const registraionPassword = document.getElementById('password');
        const registraionPasswordConfirm = document.getElementById('password-confirm');

        registraionName.addEventListener('focusout', disableButton);
        registraionRestaurantName.addEventListener('focusout', disableButton);
        registraionAddress.addEventListener('focusout', disableButton);
        registraionPIva.addEventListener('focusout', disableButton);
        registraionMail.addEventListener('focusout', disableButton);
        registraionPassword.addEventListener('focusout', disableButton);
        registraionPasswordConfirm.addEventListener('focusout', disableButton);



        let passwordCheck = false;
        let checkboxCheck = false;

        register_password_confirm.addEventListener('focusout', () => {
            passwordCheck = checkPassword();
        });

        function checkIfChecked() {
            let validationCheck = false
            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked == true) {
                    validationCheck = true
                }
            }
            if (validationCheck == false) {
                types_required_register.classList.remove('d-none');
                console.log('true')
                return false;
            } else {
                types_required_register.classList.add('d-none');
                console.log('false')
                return true;
            }

        }

        function checkPassword() {
            if (register_password.value != register_password_confirm.value) {
                password_equal_register.classList.remove('d-none');
                return false;
            } else {
                password_equal_register.classList.add('d-none');
                return true;
            }
        }

        function disableButton() {
            console.log('button disable');
            if (registraionName.value && registraionRestaurantName.value && registraionAddress.value && registraionPIva
                .value &&
                registraionPassword.value && registraionPasswordConfirm.value && checkPassword() && checkIfChecked()) {
                register_submit.disabled = false;
            } else {
                register_submit.disabled = true;
            }
        }
    </script>

@endsection
