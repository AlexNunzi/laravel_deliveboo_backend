@extends('layouts.app')

@section('content')
    <h1>Pagina non trovata!</h1>
    <a class="btn btn-primary" href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a>
@endsection
