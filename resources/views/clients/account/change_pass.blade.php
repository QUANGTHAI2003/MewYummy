@extends('layouts.client')
@section('content')
    <!-- Breadcrumb -->
    <x-breadcrumb currentLink="#" currentPageName="Đổi mật khẩu"/>

    <!-- Info Section -->
    <section class="account">
        <div class="container">
            <div class="row">
                @include('clients.shared.menu_account')
                <div class="col-12 col-lg-8">
                    <div class="change__pass rounded p-3 mt-4 mt-lg-0">
                        <h1 class="change__pass-title">Đổi mật khẩu</h1>
                        <form action="{{ route('account.postUpdatePassword', auth()->user()->id) }}" method="POST" id="form" spellcheck="false" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <p>Để đảm bảo tính bảo mật vui lòng đặt mật khẩu với ít nhất 8 kí tự</p>
                            <div class="form-floating mb-3">
                                <input type="text" name="password" class="form-control" id="password" placeholder="Mật khẩu mới">
                                <label for="floatingInput">Mật khẩu mới</label>
                                <small></small>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="password_confirmation" class="form-control" id="cfpassword" placeholder="Xác nhận mật khẩu mới">
                                <label for="floatingInput">Xác nhận mật khẩu mới</label>
                                <small></small>
                                @error('password_confirmation')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="button btn btn-primary" id="btnSubmit">Đổi mật khẩu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
