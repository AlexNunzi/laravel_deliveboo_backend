@extends('layouts.app')


@section('content')
<h1>Incasso totale: </h1>

@forelse ($orders as $order )


<!-- foreach degli ordini -->
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed d-flex justify-content-between " data-bs-toggle="collapse" data-bs-target="#collapse{{$order->id}}" aria-expanded="true" aria-controls="collapse{{$order->id}}">
          <div class="me-5">Order n°: {{$order->id}}</div>
          <div class="me-5">{{$order->order_date}}</div>
          <div class="me-5"> Prezzo totale: {{$order->total_price}}€</div>
      </button>
      </h2>
      <div id="collapse{{$order->id}}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
        <div class="accordion-body">
          <div>
            <div>
              <span class="fs-5 fw-bold">Nome: </span><span>{{$order->customer_name}}</span>
            </div>
            <div>
              <span class="fs-5 fw-bold">Indirizzo: </span><span>{{$order->customer_address}}</span>
            </div>
            <div>
              <span class="fs-5 fw-bold">Tel: </span><span>{{$order->customer_phone_number}}</span>
            </div>
            <div>
              <span class="fs-5 fw-bold">Email: </span><span>{{$order->customer_email}}</span>
            </div>
          </div>
           <!-- foreach dei piatti -->
           @foreach ($order->food as $food )
            <div class="pt-4 d-flex">
                <h5 class="pe-2">{{$food->name}}</h5>
                <span class="pe-2">quantità</span>
                <span class="pe-2">{{$food->price}}€</span>
                <span class="pe-2">prezzo singolo * quantità</span>
            </div>
           @endforeach

           <!-- end foreach -->
        </div>
      </div>
    </div>
    <!-- end foreach -->
@empty

@endforelse






@endsection
