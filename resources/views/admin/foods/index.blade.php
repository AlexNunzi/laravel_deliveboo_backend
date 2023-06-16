@extends('layouts.app')

@section('content')

<div>
    <ul>
        @forelse ($foods as $food)
        
            <li>
                <p>{{$food->name}}</p>
                <div class="d-flex">
                    <a class="btn rounded-pill btn-primary me-2" href="{{route('admin.foods.show', $food->slug)}}">VEDI</a>
                    <a href="{{route('admin.foods.edit', $food->slug)}}" class="btn rounded-pill btn-warning me-2">MODIFICA</a>
                    <form action="{{route('admin.foods.destroy', ['food' => $food->slug])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn rounded-pill btn-danger">ELIMINA</button>
                    </form>
                </div>
            </li>

        @empty
            <p>Non ci sono cibi</p>
        @endforelse

    </ul>
</div>

@endsection