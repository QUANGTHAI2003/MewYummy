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
        <i class="bi bi-journal-text"></i><span>Sản phẩm</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <x-item-sidebar route="admin.categories" name="Quản lý danh mục" permisson="view_categories" />
        <x-item-sidebar route="admin.products" name="Quản lý sản phẩm" permisson="view_products" />
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Quản lý</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Quản lý đơn hàng</span>
            </a>
          </li>
      </ul>
    </li>
    <li class="nav-item">
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
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#authorize" data-bs-toggle="collapse" href="#">
        <i class="bi bi-bar-chart"></i><span>Quản lý người dùng</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="authorize" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <x-item-sidebar route="admin.users.index" name="Quản lý người dùng" permisson="manage_users" />
        <x-item-sidebar route="admin.users.index" name="Thêm vai trò" permisson="authorize" />
        <x-item-sidebar route="admin.users.index" name="Thêm quyên" permisson="authorize" />
      </ul>
    </li>
  </ul>
</aside>
