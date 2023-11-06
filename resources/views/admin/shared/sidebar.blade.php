<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Trang chủ</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Quản lý sản phẩm</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <x-item-sidebar route="admin.categories.index" name="Quản lý danh mục" permisson="View categories" />
        <x-item-sidebar route="admin.products.index" name="Quản lý sản phẩm" permisson="View products" />
        <x-item-sidebar route="admin.coupons.index" name="Quản lý coupons" permisson="View coupons" />
        <x-item-sidebar route="admin.attributes.index" name="Quản lý biến thể" permisson="View attrbutes" />
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Quản lý đơn hàng</span><i
          class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <x-item-sidebar route="admin.orders.index" name="Quản lý đơn hàng" permisson="View attrbutes" />
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#authorize" data-bs-toggle="collapse" href="#">
        <i class="bi bi-bar-chart"></i><span>Quản lý phân quyền</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="authorize" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <x-item-sidebar route="admin.users.index" name="Quản lý người dùng" permisson="Manage users" />
        <x-item-sidebar route="admin.roles.index" name="Quản lý vai trò" permisson="Authorizations" />
        {{-- <x-item-sidebar route="admin.users.index" name="Thêm quyên" permisson="Authorizations" /> --}}
      </ul>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-bar-chart"></i><span>Thống kê</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="charts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="charts-chartjs.html">
            <i class="bi bi-circle"></i><span>Thống kê sản phẩm</span>
          </a>
        </li>
        <li>
          <a href="charts-apexcharts.html">
            <i class="bi bi-circle"></i><span>Thông kê đơn hàng</span>
          </a>
        </li>
      </ul>
    </li> --}}
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ url('log-viewer') }}">
        <i class="bi bi-grid"></i>
        <span>Xem log</span>
      </a>
    </li>
  </ul>
</aside>
