@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <a class="btn btn-primary m-5" href="{{route('admin.foods.index')}}">Cibi</a>
            <a class="btn btn-warning" href="{{route('admin.foods.create')}}">Aggiungi piatto</a>
        </div>
    </div>
</div>
@endsection
