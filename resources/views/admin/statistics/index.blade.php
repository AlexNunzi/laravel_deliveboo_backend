@extends('layouts.app')

@section('content')
    <div class="container index-statistics">
        <div class="row">

            {{-- benvenuto/gestisci utente --}}
            <div class="col-lg-9 statistic">
                <div class="benvenuto-statistic mb-3">
                    <h1 class="text-center">Statistiche degli ordini</h1>
                </div>

                <div class="row no-gutters">
                    <div class="col">
                        <canvas id="revenueChart" class="mb-5"></canvas>
                        <canvas id="orderNumberChart" class="mb-5"></canvas>
                        <canvas id="dishesRankChart" class="mb-5"></canvas>
                    </div>
                </div>
            </div>

            {{-- aside lg --}}
            <aside class="col-lg-3 px-0 aside">

                {{-- card utente --}}
                <h3 class="user-title">
                    Dati del ristoratore
                </h3>
                <div id="user-info">
                    <ul>
                        {{-- nome utente --}}
                        <li>
                            <div>

                                <span>Nome utente</span>
                            </div>
                            <span class="info">
                                {{ Auth::user()->name }} {{ Auth::user()->surname }}
                            </span>
                        </li>
                        {{-- email utente --}}
                        <li>
                            <div>

                                <span>Email</span>
                            </div>
                            <span class="info">
                                {{ Auth::user()->email }}
                            </span>
                        </li>
                        {{-- partita iva utente --}}
                        <li>
                            <div>

                                <span>Partita iva</span>
                            </div>
                            <span class="info">
                                {{ Auth::user()->restaurant->p_iva }}
                            </span>
                        </li>
                    </ul>
                </div>

                {{-- container bottoni --}}
                @if ($restaurant)
                    <div id="btn-container">
                        {{-- bottone ristorante --}}
                        <a href="{{ route('admin.foods.index') }}" class="text-center btn btn-primary">
                            Piatti
                        </a>
                        {{-- bottone ordini da aggiungere rotta --}}
                        {{-- <a href="{{ route('') }}"> --}}
                        <button class="btn">
                            <i class="fa-solid fa-basket-shopping"></i> Ordini
                        </button>
                        </a>

                    </div>
                @endif
            </aside>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            let checkPush = false;

            // ////////////////////////
            //      revenue chart   //
            // //////////////////////
            let revenueOrders = {!! json_encode($ordersRevenue) !!};

            let revenueData = [];
            let revenueLabels = [];

            for (let i = 0; i < 12; i++) {
                let today = new Date();
                today.setMonth(today.getMonth() - i);

                date = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2)

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
