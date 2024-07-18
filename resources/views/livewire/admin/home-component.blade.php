@section('title', 'Dashboard')
<div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">PAINEL DE ADMINISTRADOR</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="ecommerce-widget">

        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">
                            <i class="fa fa-users"></i>
                            Utentes
                        </h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{$utentes->count()}}</h1>
                        </div>
                    </div>
                    <div id="sparkline-revenue"></div>
                </div>
            </div>
            
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">
                            <i class="fa fa-tag"></i>
                            Plantas 
                        </h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{$plantas->count()}}</h1>
                        </div>
                    </div>
                    <div id="sparkline-revenue3"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">
                            <i class="fas fa-clipboard-list"></i>
                            Consultas Hoje
                        </h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{$consultas->count()}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">
                        <i class="fa fa-chart-pie"></i>
                        CONSULTA NO SITE
                    </h5>
                    <div class="card-body">
                        <canvas id="deliveryChart"></canvas>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>




<script src="{{ asset('/admin/libs/js/chart.min.js') }}"></script>

<script>
    const ctx = document.getElementById('deliveryChart');
    var dv = JSON.parse('{!! json_encode($deliveryMonth ?? '') !!}');
    var dh = JSON.parse('{!! json_encode($deliveryMonthCount ?? '') !!}');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: dv,
            datasets: [{
                label: 'Estatística Mensal',
                data: dh,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    const ctx_order = document.getElementById('orderChart');
    var ov = JSON.parse('{!! json_encode($monthOrder ?? '') !!}');
    var oh = JSON.parse('{!! json_encode($monthOrderCount ?? '') !!}');
    new Chart(ctx_order, {
        type: 'bar',
        data: {
            labels: ov,
            datasets: [{
                label: 'Estatística Mensal',
                data: oh,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
