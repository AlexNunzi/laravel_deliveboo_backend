@extends('layouts.app')

@section('content')
    <div class="row justify-content-center my-3 p-4 my-transparent-container align-items-center rounded-3 border shadow-lg">
        <div class="col-md-8 p-3 p-lg-5 pt-lg-3 ">
            <h1 class="display-4 fw-bold lh-1">Benvenuto {{ Auth::user()->name }}!</h1>
            <p class="lead">Benvenuto nella parte amministrativa di Deliveboo! Da qui puoi gestire i tuoi piatti
                aggiungendone, se vuoi, degli altri! Prova i bottoni qua sotto per provare le funzionalità!</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                <a class="btn fancy-button bg-primary px-4 me-md-3" href="{{ route('admin.foods.index') }}"><i
                        class="fa-solid fa-pizza-slice"></i> Il tuo menù</a>
                <a class="btn fancy-button bg-success px-4"href="{{ route('admin.foods.create') }}"><i
                        class="fa-solid fa-plus"></i> Aggiungi Piatto</a>
            </div>
        </div>

        {{-- card utente con dati del ristoratore --}}
        <div class="index-statistics col-md-4">
            <div class="h-100 p-3 bg-light border rounded-3">
                <h3 class="user-title"><i class="fa-solid fa-building-user"></i> Dati del ristorante </h3>

                <div id="user-info">
                    <div>
                        <strong>Nome ristorante:</strong>
                        {{ Auth::user()->restaurant->name }}
                    </div>
                    <div>
                        <strong>Email:</strong>
                        {{ Auth::user()->email }}
                    </div>
                    <div>
                        <strong>Partita IVA:</strong>
                        {{ Auth::user()->restaurant->p_iva }}
                    </div>
                    <div>
                        <strong>Fatturato totale:</strong>
                        {{ number_format($fatturato, 2) }} €
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-md-stretch">
        <h1 id="statistics" class="text-center text-white"><i class="fa-solid fa-chart-column"></i> Statistiche degli ordini
        </h1>
        <div class="col-md-6 mb-2">
            <div class="h-100 my-2 p-2 bg-light border rounded-3">
                <canvas id="revenueChart" class="mb-5"></canvas>
            </div>
        </div>
        <div class="col-md-6 mt-2 ">
            <div class="h-100 p-2 bg-light border rounded-3">
                <canvas id="orderNumberChart" class="mb-5"></canvas>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        let checkPush = false;

        // ////////////////////////
        //      revenue chart   //
        // //////////////////////
        let revenueOrders = {!! json_encode($ordersRevenue) !!};
        // console.log(revenueOrders)

        let revenueData = [];
        let revenueLabels = [];

        for (let i = 0; i < 12; i++) {
            let today = new Date();
            console.log('new date ' + today);
            console.log('meno i ' + (today.getMonth() - i));
            today.setMonth(today.getMonth() - i);
            console.log('today ' + today);
            console.log('today +1 ' + (today.getMonth() + 1));
            date = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2);
            console.log('date ' + date);

            checkPush = false;

            revenueOrders.forEach(elm => {
                if (elm.date == date) {
                    revenueData.push(elm.total);
                    revenueLabels.push(date);
                    checkPush = true;


                }
            });

            if (!checkPush) {
                revenueData.push(0);
                revenueLabels.push(date);
            }
        }

        const dataRevenue = {
            labels: revenueLabels.reverse(),
            datasets: [{
                label: 'Fatturato ultimi 12 mesi',
                backgroundColor: '#00CCBC',
                borderColor: '#00CCBC',
                data: revenueData.reverse(),
            }, ]
        };

        const configRevenue = {
            type: 'line',
            data: dataRevenue,
            options: {},
            responsive: true,
        };

        const revenueChart = new Chart(
            document.getElementById('revenueChart'),
            configRevenue
        );


        // /////////////////////////////
        //      order number chart   //
        // ///////////////////////////
        let countOrders = {!! json_encode($ordersCount) !!};

        let ordersCountData = [];
        let ordersLabels = [];

        for (let i = 0; i < 12; i++) {
            let today = new Date();
            today.setMonth(today.getMonth() - i);

            date = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2)

            checkPush = false;

            countOrders.forEach(elm => {
                if (elm.date == date) {
                    ordersCountData.push(elm.orderTotal);
                    ordersLabels.push(date);
                    checkPush = true;
                }
            });

            if (!checkPush) {
                ordersCountData.push(0);
                ordersLabels.push(date);
            }
        }

        const dataOrder = {
            labels: ordersLabels.reverse(),
            datasets: [{
                    label: 'Numero ordini ultimi 12 mesi',
                    backgroundColor: '#D0EB99',
                    borderColor: '#D0EB99',
                    data: ordersCountData.reverse(),
                },

            ]
        };

        const configOrder = {
            type: 'bar',
            data: dataOrder,
            options: {},
            responsive: true,
        };

        const orderNumberChart = new Chart(
            document.getElementById('orderNumberChart'),
            configOrder
        );
    </script>
@endsection

{{-- <a class="btn btn-primary" href="{{ route('admin.foods.index') }}">Cibi</a>
<a class="btn btn-warning" href="{{ route('admin.foods.create') }}">Aggiungi piatto</a>
Benvenuti nella parte amministrativa di Deliveboo! Da qui puoi gestire i tuoi piatti aggiungendone, se vuoi, degli altri! Prova i bottoni qua sotto per provare le funzionalità! --}}
