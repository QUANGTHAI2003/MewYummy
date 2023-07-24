@props(['currentPage', 'pageTitle'])

<div class="pagetitle">
  <h1>{{ $currentPage }}</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/admin/dashboard">Trang chủ</a>
      </li>
      <li class="breadcrumb-item">{{ $currentPage }}</li>

      <li class="breadcrumb-item active">{{ $pageTitle }}</li>
    </ol>
  </nav>
</div>
