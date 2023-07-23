<section class="bread__crumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ $currentLink }}">{{ $currentPageName }}</a>
                    {{-- @if ($productDetailName != null)
                <li class="breadcrumb-item active" aria-current="page">{{ $productDetailName }}</li>
                @endif --}}
                </li>
            </ol>
        </nav>
    </div>
</section>
