@extends('layouts.admin')

@section('content')
  <x-page-title currentPage="Quản lý vai trò" pageTitle="Sửa vai trò" />
  <h3 class="text-3xl font-medium text-gray-700">Sửa vai trò</h3>
  <div class="mb-10 mt-10 md:grid md:grid-cols-3 md:gap-6">
    <div class="mt-5 md:col-span-6 md:mt-0">
      <form action="{{ route('admin.roles.update', $role->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="overflow-hidden shadow sm:rounded-md">
          <div class="bg-white px-4 py-5 sm:p-6">
            <div class="col-span-9 sm:col-span-4">
              <div class="grid grid-cols-6 gap-6 py-3">
                <div class="col-span-6">
                  <label for="name" class="my-2 block text-sm font-medium text-gray-700">Nhập tên vai trò</label>
                  <input type="text" name="name" id="name" min="0"
                    value="{{ old('name', $role->name) }}" class="input-form appearance-number-none">
                  @error('name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="grid grid-cols-6 gap-6 py-3">
                <div class="col-span-6">
                  <label for="name" class="my-2 block text-sm font-medium text-gray-700">Mô tả</label>
                  <textarea name="description" id="description" rows="4" class="input-form appearance-number-none">{{ old('description', $role->description) }}</textarea>
                  @error('description')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="grid grid-cols-6 gap-6 py-3">
                <div class="col-span-6">
                  <label for="regular_price" class="my-2 block text-sm font-medium text-gray-700">Chọn các quyền ( cần
                    thêm ngoài các quyền trong vai trò)</label>
                  <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @if ($permissions)
                      @foreach ($permissions as $permission)
                        <x-buttons.toggle-button label="{{ $permission->name }}" value="{{ $permission->id }}"
                          name="permissions[]" check="{{ $permission->checked }}" />
                      @endforeach
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <x-forms.feature-button back="{{ route('admin.roles.index') }}" />
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
          url: `/admin/authorizations/roles/roles/${roleId}/permissions`,
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
