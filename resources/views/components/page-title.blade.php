<div class="pagetitle">
    <h1>{{ $currentPage }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin/dashboard">Trang chủ</a>
            </li>
            @if ($categoryTitle != '')
                <li class="breadcrumb-item">{{ $categoryTitle }}</li>
            @else
            @endif
            <li class="breadcrumb-item active">{{ $pageTitle }}</li>
        </ol>
    </nav>
</div>
