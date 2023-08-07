<div class="row m-0 p-0">
  <div class="col-xxl-4 col-md-6">
    <div class="card info-card sales-card">

      <div class="filter">
        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
          <li class="dropdown-header text-start">
            <h6>Lọc theo</h6>
          </li>

          <li><a wire:click="todayOrder" class="dropdown-item" href="#">Hôm nay</a></li>
          <li><a wire:click="monthOrder" class="dropdown-item" href="#">Tháng này</a></li>
          <li><a wire:click="yearOrder" class="dropdown-item" href="#">Năm nay</a></li>
        </ul>
      </div>

      <div class="card-body">
        <h5 class="card-title">Đơn hàng <span>| {{ $selectedFilterOrder }}</span></h5>

        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-cart"></i>
          </div>
          <div class="ps-3">
            <h6>{{ $totalOrders }} đơn hàng</h6>
          </div>
        </div>
      </div>

    </div>
  </div><!-- End Sales Card -->

  <!-- Revenue Card -->
  <div class="col-xxl-4 col-md-6">
    <div class="card info-card revenue-card">

      <div class="filter">
        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
          <li class="dropdown-header text-start">
            <h6>Lọc theo</h6>
          </li>

          <li><a wire:click="todayRevenue" class="dropdown-item" href="#">Hôm nay</a></li>
          <li><a wire:click="monthRevenue" class="dropdown-item" href="#">Tháng này</a></li>
          <li><a wire:click="yearRevenue" class="dropdown-item" href="#">Năm nay</a></li>
        </ul>
      </div>

      <div class="card-body">
        <h5 class="card-title">Doanh thu <span>| {{ $selectedFilterRevenue }}</span></h5>

        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-currency-dollar"></i>
          </div>
          <div class="ps-3">
            <h6>{{ formatNumber($totalRevenue) }}</h6>
          </div>
        </div>
      </div>

    </div>
  </div><!-- End Revenue Card -->

  <!-- Customers Card -->
  <div class="col-xxl-4 col-xl-12">

    <div class="card info-card customers-card">

      <div class="filter">
        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
          <li class="dropdown-header text-start">
            <h6>Lọc theo</h6>
          </li>

          <li><a wire:click="todayCustomer" class="dropdown-item" href="#">Hôm nay</a></li>
          <li><a wire:click="monthCustomer" class="dropdown-item" href="#">Tháng này</a></li>
          <li><a wire:click="yearCustomer" class="dropdown-item" href="#">Năm nay</a></li>
        </ul>
      </div>

      <div class="card-body">
        <h5 class="card-title">Khánh hàng <span>| {{ $selectedFilterUser }}</span></h5>

        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-people"></i>
          </div>
          <div class="ps-3">
            <h6>{{ $totalCustomer }}</h6>
          </div>
        </div>

      </div>
    </div>

  </div>

</div>
