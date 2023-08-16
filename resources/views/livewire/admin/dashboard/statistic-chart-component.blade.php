<div class="row m-0 p-0">
  <!-- Reports -->
  <div class="col-lg-8">
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
  <div class="col-lg-4">
    <!-- Recent Activity -->
    <div class="card">
      <div class="filter">
        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
          <li class="dropdown-header text-start">
            <h6>Filter</h6>
          </li>

          <li><a class="dropdown-item" href="#">Today</a></li>
          <li><a class="dropdown-item" href="#">This Month</a></li>
          <li><a class="dropdown-item" href="#">This Year</a></li>
        </ul>
      </div>

      <div class="card-body">
        <h5 class="card-title">Recent Activity <span>| Today</span></h5>

        <div class="activity">
          @foreach ($notifications as $notification)
            <div class="activity-item d-flex items-start justify-between">
              <div class="activite-label">
                {{ $notification->created_at->diffForHumans() }}
                {{-- <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i> --}}
              </div>
              <div class="activity-content ps-4">
                {{ $notification->data['name'] }} - {{ $notification->data['message'] }}
              </div>
            </div><!-- End activity item-->
          @endforeach
          {{--
          <div class="activity-item d-flex">
            <div class="activite-label">56 min</div>
            <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
            <div class="activity-content">
              Voluptatem blanditiis blanditiis eveniet
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label">2 hrs</div>
            <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
            <div class="activity-content">
              Voluptates corrupti molestias voluptatem
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label">1 day</div>
            <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
            <div class="activity-content">
              Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label">2 days</div>
            <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
            <div class="activity-content">
              Est sit eum reiciendis exercitationem
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label">4 weeks</div>
            <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
            <div class="activity-content">
              Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
            </div>
          </div><!-- End activity item--> --}}

        </div>

      </div>
    </div><!-- End Recent Activity -->
  </div>
  @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.Echo.private('newuser.{{ auth()->user()->id }}')
                .notification((notification) => {
                    console.log(notification);
                    let html = `
                        <div class="activity-item d-flex items-start justify-between">
                            <div class="activite-label">
                                ${notification.created_at}
                            </div>
                            <div class="activity-content ps-4">
                                ${notification.data.name} - ${notification.data.message}
                            </div>
                        </div>
                    `;
                    $('.activity').prepend(html);
                });
        })
    </script>
  @endpush
</div>
