<div class="row m-0 p-0">
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
                  name: 'Đơn hàng',
                  data: [31, 40, 28, 51, 42, 82, 45],
                }, {
                  name: 'Doanh thu',
                  data: [11, 32, 45, 32, 34, 52, 41]
                }, {
                  name: 'Khách hàng',
                  data: [15, 54, 32, 18, 9, 24, 11]
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
                  categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z",
                    "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z",
                    "2018-09-19T06:30:00.000Z"
                  ]
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
