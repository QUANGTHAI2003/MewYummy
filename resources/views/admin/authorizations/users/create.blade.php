@extends('layouts.admin')

@section('content')
  <h3 class="text-3xl font-medium text-gray-700">Thêm nhân viên mới</h3>
  <div class="mb-10 mt-10 md:grid md:grid-cols-3 md:gap-6">
    <div class="mt-5 md:col-span-6 md:mt-0">
      <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="overflow-hidden shadow sm:rounded-md">
          <div class="bg-white px-4 py-5 sm:p-6">
            <div class="col-span-9 sm:col-span-4">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="name" class="my-2 block text-sm font-medium text-gray-700">Tên nhân viên</label>
                  <input type="text" name="name" id="name" value="{{ old('name') }}" class="input-form">
                  @error('name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                  <label for="email" class="my-2 block text-sm font-medium text-gray-700">Email</label>
                  <input type="email" name="email" id="email" value="{{ old('email') }}" class="input-form">
                  @error('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="password" class="my-2 block text-sm font-medium text-gray-700">Mật khẩu</label>
                  <input type="password" name="password" id="password" min="0" value="{{ old('password') }}"
                    class="input-form appearance-number-none">
                  @error('password')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                  <label for="cfpassword" class="my-2 block text-sm font-medium text-gray-700">Xác nhận mật khẩu</label>
                  <input type="password" name="cfpassword" id="cfpassword" min="0" value="{{ old('cfpassword') }}"
                    class="input-form appearance-number-none">
                  @error('cfpassword')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="grid grid-cols-6 gap-6 py-3">
                <div class="col-span-6">
                  <label for="role" class="my-2 block text-sm font-medium text-gray-700">Chọn vai trò</label>
                  <select class="input-form" name="role" id="role" autocomplete="role">
                    <option disabled selected value> -- Chọn vai trò</option>
                    @foreach ($roles as $role)
                      <option value="{{ $role->id }}" @if (old('role') == $role->id) selected @endif>
                        {{ $role->name }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="grid grid-cols-6 gap-6 py-3">
                <div class="col-span-6">
                  <label for="regular_price" class="my-2 block text-sm font-medium text-gray-700">Chọn các quyền ( cần
                    thêm ngoài các quyền trong vai trò)</label>
                  <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @if ($permissions)
                      @foreach ($permissions as $permission)
                        <x-buttons.toggle-button label="{{ $permission->name }}" value="{{ $permission->id }}" name="permissions[]" check="" />
                      @endforeach
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <x-forms.feature-button back="{{ route('admin.products') }}" />
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {
      $('#role').on('change', function() {
        let roleId = $(this).val();
        var permissons = [];
        $.ajax({
          url: `/admin/authorizations/users/roles/${roleId}/permissions`,
          method: 'GET',
          success: function(data) {
            var permissions = Object.keys(data);
            permissions.forEach(function(permission) {
              permissons.push(parseInt(permission));
            });
            $('input[type="checkbox"]').each(function() {
              if (permissons.includes(parseInt($(this).val()))) {
                $(this).prop('checked', true);
              } else {
                $(this).prop('checked', false);
              }
            });
          },

        })
      })
    });
  </script>
@endpush
