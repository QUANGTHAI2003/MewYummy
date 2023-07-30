<div class="mt-8 flex flex-col">
  <div class="my-2 overflow-x-auto pb-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
    <div class="my-4 flex w-full flex-col items-center justify-between sm:flex-row">
      <div class="search-style-2 my-4 w-full sm:max-w-xs md:max-w-md lg:max-w-lg">
        <form action="#">
          <label for="default-search"
            class="sr-only mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Search</label>
          <div class="relative">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
              <svg class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
            </div>
            <input wire:model.debounce.500ms="search" type="search" id="default-search"
              class="bg-white-50 dark:bg-white-700 dark:text-dark block w-full rounded-lg border border-gray-300 p-4 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
              placeholder="Tìm kiếm vai trò ..." required>
            {{-- <button type="submit" class="btn px-6  py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium text-xs leading-tight uppercase rounded shadow-md  hover:shadow-lg focus:bg-blue-900  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out  absolute right-2.5 bottom-2.5">Cerca</button> --}}
          </div>
        </form>
      </div>
    </div>
    <div
      class="scroll min-w-full overflow-hidden overflow-x-auto border-b border-gray-200 align-middle shadow sm:rounded-lg">
      <table class="w-[900px] min-w-full">
        <thead>
          <tr>
            <th class="table-head w-32" wire:click.prevent="sortBy('name')">
              Name
              <x-sort-arrow name="name" :sortColumnName="$sortColumnName" :sortDirection="$sortDirection" />
            </th>
            <th class="table-head" wire:click.prevent="sortBy('description')">
              Mô tả
              <x-sort-arrow name="email" :sortColumnName="$sortColumnName" :sortDirection="$sortDirection" />
            </th>
            <th class="table-head">
              Các quyền
            </th>
            <th class="table-head w-32">
              Thao tác
            </th>
          </tr>
        </thead>
        <tbody class="bg-white">
            @if(count($roles) > 0)
          @foreach ($roles as $role)
            <tr wire:loading.class.delay="opacity-50 cursor-wait">
              <td class="table-body">
                <div class="flex items-center">
                  <div class="ml-4">
                    <div class="text-sm font-medium leading-5 text-gray-900">{{ $role->name }}</div>
                  </div>
                </div>
              </td>
              <td class="table-body">
                <div class="text-sm leading-5 text-gray-900">{{ $role->description }}</div>
              </td>
              <td class="table-body">
                <div class="text-sm leading-5 text-gray-900">
                  @if ($role->permissions)
                    @foreach ($role->permissions as $permission)
                      <span
                        class="mb-2 inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">
                        {{ $permission->name }}
                      </span>
                    @endforeach
                  @endif
                </div>
              </td>
              <td class="whitespace-no-wrap right justify-content-end border-b border-gray-200 px-6 py-4 text-right">
                <div class="flex">
                  <a data-toggle="tooltip" data-placement="bottom"
                    class="ml-2 rounded bg-yellow-600 px-4 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg"
                    title="Sửa" href="{{ route('admin.roles.edit', $role->id) }}" id="btLeft">
                    <i class="fas fa-edit" title="Sửa"></i>
                  </a>
                  <button type="button" wire:click="deleteRole({{ $role->id }})" id="deleteProductBtn"
                    title="Xóa" data-toggle="tooltip" data-placement="bottom" data-modal-target="deleteRoleModal"
                    data-modal-toggle="deleteRoleModal"
                    class="hover:shadow-lgfocus:bg-blue-700 focus:ring-active:bg-red-800 active:shadow-lgtransition ml-2 mr-4 rounded bg-red-600 px-4 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md duration-150 ease-in-out hover:bg-red-700 focus:shadow-lg focus:outline-none">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </div>
              </td>
            </tr>
          @endforeach
          @else
          <tr>
            <td colspan="8" class="py-4 text-center">
              <div class="flex items-center justify-center">
                <div class="flex flex-col items-center">
                  <div class="flex flex-col items-center">
                    <span class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                      Không có dữ liệu
                    </span>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          @endif
        </tbody>
        @include('livewire.admin.authorizations.modal-delete-role')
      </table>

    </div>
    <div class="d-flex align-items-center justify-content-between mb-5 mt-5">
      {{ $roles->links('livewire.custom-pagination') }}
    </div>
  </div>
</div>
