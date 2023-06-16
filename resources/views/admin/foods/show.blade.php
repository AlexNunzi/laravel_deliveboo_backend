@extends('layouts.app')

@section('content')
    <div>
        <div class="card">
            <div class="card-body">
                
                <h5 class="card-title">{{ $food->name }}</h5>
                <p class="card-text">{{ $food->description }}</p>
                <p>{{$food->price}}</p>
            </div>
        </div>
    </div>
@endsection
