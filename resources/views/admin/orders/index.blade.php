@extends('layouts.app')


@section('content')


@forelse ($orders as $order )

     <h3>{{$order->customer_name}}</h3>

@empty

@endforelse




@endsection
