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
                            <h5 class="card-title me-2">{{$food->name}}</h5>
                            <small>{{$food->price}}€</small>
                        </div>

                      <p class="card-text">
                        {{$food->description}}
                      </p>
                    </div>
                    <div class="card-footer d-flex">
                        {{-- <a class="btn rounded-pill btn-primary me-2"
                            href="{{ route('admin.foods.show', $food->slug) }}">VEDI</a> --}}
                        <a href="{{ route('admin.foods.edit', $food->slug) }}"
                            class="btn rounded-pill btn-warning me-2">MODIFICA</a>
                        <form action="{{ route('admin.foods.destroy', ['food' => $food->slug]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn rounded-pill btn-danger">ELIMINA</button>
                        </form>
                    </div>
                  </div>
                </div>
                
        @empty
            <p>Non ci sono cibi</p>
            <a class="btn btn-primary" href="{{ route('admin.dashboard') }}">Vai alla dashboard</a>
        @endforelse
        {{-- <ul>
            @forelse ($foods as $food)
                <li>
                    <p>{{ $food->name }}</p>
                    <div class="d-flex">
                        <a class="btn rounded-pill btn-primary me-2"
                            href="{{ route('admin.foods.show', $food->slug) }}">VEDI</a>
                        <a href="{{ route('admin.foods.edit', $food->slug) }}"
                            class="btn rounded-pill btn-warning me-2">MODIFICA</a>
                        <form action="{{ route('admin.foods.destroy', ['food' => $food->slug]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn rounded-pill btn-danger">ELIMINA</button>
                        </form>
                    </div>


                </li>

            @empty
                <p>Non ci sono cibi</p>
                <a class="btn btn-primary" href="{{ route('admin.dashboard') }}">Vai alla dashboard</a>
            @endforelse

        </ul> --}}
    </div>
@endsection
