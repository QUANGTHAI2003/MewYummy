@extends('layouts.client')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <section class="thankyou">
                    <div class="thankyou-content">
                        <div class="thankyou-title">Cảm ơn bạn đã mua hàng</div>
                        <div class="thankyou-desc">Đơn hàng của bạn đã được đặt thành công! Vui lòng kiểm tra mail để xác nhận đơn hàng</div>
                        <div class="thankyou-btn">
                            <a href="{{ route('home') }}" class="btn btn-primary">Tiếp tục mua hàng</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
