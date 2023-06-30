@extends('layouts.app')

@section('content')
    <div class="row">
        @forelse ($foods as $food)
            <div class="col-12 col-md-6 col-lg-4 py-2">
                <div class="card h-100">
                    @if ($food->image)
                        <img class="card-img-top" src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}" />
                    @else
                        <img src="https://placehold.co/600x400" alt="Nessuna Immagine">
                    @endif
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title me-2">{{ $food->name }}</h5>
                            <small>{{ $food->price }}€</small>
                        </div>

                        <p class="card-text">
                            {{ $food->description }}
                        </p>
                    </div>
                    <div class="card-footer d-flex">
                        {{-- <a class="btn rounded-pill btn-primary me-2"
                            href="{{ route('admin.foods.show', $food->slug) }}">VEDI</a> --}}
                        <a href="{{ route('admin.foods.edit', $food->slug) }}"
                            class="btn fancy-button bg-warning me-3">MODIFICA</a>
                        <form action="{{ route('admin.foods.destroy', ['food' => $food->slug]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn fancy-button bg-danger">ELIMINA</button>
                        </form>
                    </div>
                </div>
            </div>

        @empty
            <p>Non ci sono cibi</p>
            <a class="btn btn-warning" href="{{ route('admin.dashboard') }}">Vai alla dashboard</a>
        @endforelse
    </div>
    <div class="text-center">
        <a class="btn fancy-button bg-primary mt-4 mb-4" href="{{ route('admin.dashboard') }}">Torna alla dashboard</a>
    </div>
@endsection
