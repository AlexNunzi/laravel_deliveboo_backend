@extends('layouts.app')

@section('content')
    <div>
        <div class="card">
            <div class="card-body">
                @if ($food->image)
                    <img class="w-100" src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}" />
                @endif

                <h5 class="card-title">{{ $food->name }}</h5>
                <p class="card-text">{{ $food->description }}</p>
                <p>{{ $food->price }}€</p>
                <a class="btn btn-primary" href="{{ route('admin.foods.index') }}">Torna indietro</a>

            </div>
        </div>
    </div>
@endsection
