<div class="col-12 col-lg-4">
    <div class="row mb-3 h-100">
        <div class="col-12">
            <div class="account-action rounded h-100">
                <div class="item_acc border-bottom">
                    <a href="{{ route('account.index') }}" class="active" title="Thông
            tin tài khoản">
                        <i class="fa-solid fa-user icon"></i>
                        <span class="ms-3">Thông tin tài khoản</span>
                    </a>
                </div>
                <div class="item_acc border-bottom">
                    <a href="{{ route('account.updateInfo') }}" class=" d-flex w-100 align-items-center" title="Quản lý địa chỉ">
                        <i class="fa-solid fa-pen-to-square icon"></i>
                        <span class="ms-3">Cập nhật tài khoản</span>
                    </a>
                </div>
                <div class="item_acc border-bottom">
                    <a href="{{ route('account.updatePassword') }}" class=" d-flex w-100 align-items-center" title="Đổi mật khẩu">
                        <i class="fa-solid fa-shuffle icon"></i>
                        <span class="ms-3">Đổi mật khẩu</span>
                    </a>
                </div>
                <div class="item_acc">
                    <a class="d-flex w-100 align-items-center" href="#" title="Đăng xuất">
                        <i class="fa-solid fa-arrow-right-from-bracket icon"></i>
                        <span class="ms-3">Đăng xuất</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
