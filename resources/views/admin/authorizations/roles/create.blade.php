@extends('layouts.admin')

@section('content')
  <h3 class="text-3xl font-medium text-gray-700">Thêm nhân viên mới</h3>
  <div class="mb-10 mt-10 md:grid md:grid-cols-3 md:gap-6">
    <div class="mt-5 md:col-span-6 md:mt-0">
      <form action="{{ route('admin.roles.store') }}" method="POST" spellcheck="false">
        @csrf
        <div class="overflow-hidden shadow sm:rounded-md">
          <div class="bg-white px-4 py-5 sm:p-6">
            <div class="col-span-9 sm:col-span-4">
              <div class="grid grid-cols-6 gap-6 py-3">
                <div class="col-span-6">
                  <label for="name" class="my-2 block text-sm font-medium text-gray-700">Nhập tên vai trò</label>
                  <input type="text" name="name" id="name" min="0" value="{{ old('name') }}"
                    class="input-form appearance-number-none">
                  @error('name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="grid grid-cols-6 gap-6 py-3">
                <div class="col-span-6">
                  <label for="name" class="my-2 block text-sm font-medium text-gray-700">Mô tả</label>
                  <textarea name="description" id="description" rows="4" class="input-form appearance-number-none">{{ old('description') }}</textarea>
                  @error('description')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="grid grid-cols-6 gap-6 py-3">
                <div class="col-span-6">
                  <label for="regular_price" class="my-2 block text-sm font-medium text-gray-700">Chọn các quyền </label>
                  <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @if ($permissions)
                      @foreach ($permissions as $permission)
                        <x-buttons.toggle-button label="{{ $permission->name }}" value="{{ $permission->name }}"
                          name="permissions[]" check="" />
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
