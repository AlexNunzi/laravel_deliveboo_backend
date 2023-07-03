@extends('layouts.app')

@section('content')

    <div class="bg-light p-3 rounded-3 mt-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('admin.foods.store') }}" enctype="multipart/form-data">

            @csrf

            <h6 class="mb-5 mt-3">I campi contrassegnati da (*) sono obbligatori</h6>
            <div class="mb-3">
                <label for="name" class="form-label">Nome (*)</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', 'Pasta con le sarde') }} " required minlength="5" maxlength="100">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                    name="image">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    maxlength="1000">{{ old('description', 'Un bacile di pasta con il finocchietto fresco come lo metteva la nonna') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo (*)</label>
                <input type="number" min="0" max="99.99" step="0.01"
                    class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                    value="{{ old('price', '10.00') }}" required>
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="visibility" name="visibility"
                    value="1" @if (old('visibility')) checked @endif>
                <label class="form-check-label" for="visibility">Visibile</label>
            </div>
            <div class="mt-4">
                <a class="btn fancy-button bg-primary me-4" href="{{ route('admin.dashboard') }}"><i
                    class="fa-solid fa-house"></i> Torna alla dashboard</a>
                <button type="submit" class="btn fancy-button bg-success me-3">
                    <i class="fa-solid fa-check"></i>
                    Salva
                </button>
            </div>

        </form>
    </div>

@endsection
