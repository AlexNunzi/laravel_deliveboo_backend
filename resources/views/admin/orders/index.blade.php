@extends('layouts.app')


@section('content')

    <div class="bg-light rounded-3 p-3 my-3">
        <!-- forelse degli ordini -->
        @forelse ($orders as $order)
            <div class="accordion mt-3">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed d-flex justify-content-between " data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $order->id }}" aria-expanded="true"
                            aria-controls="collapse{{ $order->id }}">
                            <div class="me-5">Order n°: {{ $order->id }}</div>
                            <div class="me-5">{{ $order->order_date }}</div>
                            <div class="me-5"> Prezzo totale: {{ $order->total_price }}€</div>
                        </button>
                    </h2>
                    <div id="collapse{{ $order->id }}" class="accordion-collapse collapse " aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample" style="">
                        <div class="accordion-body">
                            <ul class="list-unstyled">
                                <li>
                                    <span class="fs-5"><strong>Nome: </strong>{{ $order->customer_name }}</span>
                                </li>
                                <li>
                                    <span class="fs-5 fw-bold">Indirizzo: </span><span>{{ $order->customer_address }}</span>
                                </li>
                                <li>
                                    <span class="fs-5 fw-bold">Tel: </span><span>{{ $order->customer_phone_number }}</span>
                                </li>
                                <li>
                                    <span class="fs-5 fw-bold">Email: </span><span>{{ $order->customer_email }}</span>
                                </li>

                                <!-- foreach dei piatti -->
                                @foreach ($order->food as $food)
                                    <li class="mt-3">
                                        <h5 class="pe-2">{{ $food->name }}</h5>
                                        <span class="pe-2">Quantità: {{ $food->pivot->quantity }}</span>
                                        <span class="pe-2">Prezzo singolo: {{ $food->price }}€</span>
                                    </li>
                                    <!-- end foreach -->
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end forelse -->
        @empty
            <h3 class="text-center mt-3">Non ci sono ordini!</h3>
        @endforelse
        <div class="d-flex justify-content-center">
            <a class="btn fancy-button bg-warning mt-4 mb-4" href="{{ route('admin.dashboard') }}">Visualizza
                grafico
                ordini</a>
        </div>
    </div>




@endsection
