@extends('layouts.app')

@section('content')

<div>
    <ul>
        @forelse ($foods as $food)

            <li>
                <p>{{$food->name}}</p>
                <a class="btn rounded-pill btn-primary me-2" href="{{route('admin.foods.show', $food->slug)}}">VEDI</a>
            </li>

        @empty
            <p>Non ci sono cibi</p>
        @endforelse

    </ul>
</div>

@endsection