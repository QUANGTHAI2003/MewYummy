@extends('layouts.admin')

@section('content')
    <div class="row dashboard">
        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots"></i>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Đơn hàng <span>| Hôm nay</span>
                    </h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cart"></i>
                        </div>
                        <div class="ps-3">
                            <h6>145</h6>
                            <span class="text-muted small pt-2 ps-1">tăng</span>
                            <span class="text-success small pt-1 fw-bold">12%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Sales Card -->
        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots"></i>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Tổng tiền <span>| Tháng này</span>
                    </h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div class="ps-3">
                            <h6>$3,264</h6>
                            <span class="text-muted small pt-2 ps-1">tăng</span>
                            <span class="text-success small pt-1 fw-bold">8%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Revenue Card -->
        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">
            <div class="card info-card customers-card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots"></i>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Khách hàng <span>| Năm này</span>
                    </h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6>1244</h6>
                            <span class="text-muted small pt-2 ps-1">giảm</span>
                            <span class="text-danger small pt-1 fw-bold">12%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Customers Card -->
        <div class="row p-0 m-0">
            <!-- Reports -->
            <div class="col-12">
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-three-dots"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Báo cáo <span>| Hôm nay</span>
                        </h5>
                        <!-- Line Chart -->
                        <div id="reportsChart"></div>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#reportsChart"), {
                                    series: [{
                                        name: 'Sales',
                                        data: [31, 40, 28, 51, 42, 82, 56],
                                    }, {
                                        name: 'Revenue',
                                        data: [11, 32, 45, 32, 34, 52, 41]
                                    }, {
                                        name: 'Customers',
                                        data: [15, 11, 32, 18, 9, 24, 11]
                                    }],
                                    chart: {
                                        height: 350,
                                        type: 'area',
                                        toolbar: {
                                            show: false
                                        },
                                    },
                                    markers: {
                                        size: 4
                                    },
                                    colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                    fill: {
                                        type: "gradient",
                                        gradient: {
                                            shadeIntensity: 1,
                                            opacityFrom: 0.3,
                                            opacityTo: 0.4,
                                            stops: [0, 90, 100]
                                        }
                                    },
                                    dataLabels: {
                                        enabled: false
                                    },
                                    stroke: {
                                        curve: 'smooth',
                                        width: 2
                                    },
                                    xaxis: {
                                        type: 'datetime',
                                        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                                    },
                                    tooltip: {
                                        x: {
                                            format: 'dd/MM/yy HH:mm'
                                        },
                                    }
                                }).render();
                            });
                        </script>
                        <!-- End Line Chart -->
                    </div>
                </div>
            </div>
            <!-- End Reports -->
        </div>
    </div>
@endsection
