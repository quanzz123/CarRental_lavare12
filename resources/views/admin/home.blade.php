@extends('admin_layout')
@section('admin')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Thống kê đơn hàng</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon blue mb-2">
                                            <i class="fas fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Tổng đơn hàng</h6>
                                        <h6 class="font-extrabold mb-0">{{ number_format($totalOrders) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon green mb-2">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Doanh thu</h6>
                                        <h6 class="font-extrabold mb-0">{{ number_format($totalRevenue, 0, '.', ',') }} VND</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Đơn đặt hàng và doanh thu hàng tháng (12 tháng trước)</h4>
                            </div>
                            <div class="card-body">
                                <div id="order-stats-chart"></div>
                                <script>
                                    var options = {
                                        series: [{
                                            name: 'Orders',
                                            type: 'column',
                                            data: @json($orders)
                                        }, {
                                            name: 'Revenue (VND)',
                                            type: 'line',
                                            data: @json($revenue)
                                        }],
                                        chart: {
                                            height: 350,
                                            type: 'line',
                                            toolbar: {
                                                show: true
                                            }
                                        },
                                        stroke: {
                                            width: [0, 3]
                                        },
                                        dataLabels: {
                                            enabled: true,
                                            enabledOnSeries: [0]
                                        },
                                        labels: @json($months),
                                        xaxis: {
                                            type: 'datetime'
                                        },
                                        yaxis: [{
                                            title: {
                                                text: 'Orders',
                                            },
                                        }, {
                                            opposite: true,
                                            title: {
                                                text: 'Revenue (VND)'
                                            },
                                            labels: {
                                                formatter: function(value) {
                                                    return new Intl.NumberFormat('vi-VN', { 
                                                        style: 'currency', 
                                                        currency: 'VND',
                                                        maximumFractionDigits: 0
                                                    }).format(value);
                                                }
                                            }
                                        }]
                                    };

                                    var chart = new ApexCharts(document.querySelector("#order-stats-chart"), options);
                                    chart.render();
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-5">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="{{asset('public/backend/assets/images/faces/1.jpg')}}" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">John Duck</h5>
                                <h6 class="text-muted mb-0">@johnducky</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Messages</h4>
                    </div>
                    <div class="card-content pb-4">
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="{{asset('public/backend/assets/images/faces/4.jpg')}}">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">Hank Schrader</h5>
                                <h6 class="text-muted mb-0">@johnducky</h6>
                            </div>
                        </div>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="{{asset('public/backend/assets/images/faces/5.jpg')}}">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">Dean Winchester</h5>
                                <h6 class="text-muted mb-0">@imdean</h6>
                            </div>
                        </div>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="{{asset('public/backend/assets/images/faces/1.jpg')}}">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">John Dodol</h5>
                                <h6 class="text-muted mb-0">@dodoljohn</h6>
                            </div>
                        </div>
                        <div class="px-4">
                            <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Start
                                Conversation</button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Visitors Profile</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-visitors-profile"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 &copy; Mazer</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                        href="http://ahmadsaugi.com">A. Saugi</a></p>
            </div>
        </div>
    </footer>
</div>
@endsection