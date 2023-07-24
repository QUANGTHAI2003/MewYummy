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
                placeholder="Tìm kiếm sản phẩm ..." required>
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
            <th class="table-head" wire:click.prevent="sortBy('name')">
              Name
            <x-sort-arrow name="name" :sortColumnName="$sortColumnName" :sortDirection="$sortDirection"/>
            </th>
            <th class="table-head" wire:click.prevent="sortBy('email')">
              Email
            <x-sort-arrow name="email" :sortColumnName="$sortColumnName" :sortDirection="$sortDirection"/>
            </th>
            <th class="table-head" wire:click.prevent="sortBy('name')">
              Vai trò
            <x-sort-arrow name="name" :sortColumnName="$sortColumnName" :sortDirection="$sortDirection"/>
            </th>
            <th class="table-head" wire:click.prevent="sortBy('is_active')">
              Trạng thái
            <x-sort-arrow name="is_active" :sortColumnName="$sortColumnName" :sortDirection="$sortDirection"/>
            </th>
            <th class="table-head" wire:click.prevent="sortBy('last_seen_at')">
              Đăng nhập lần cuối
            <x-sort-arrow name="last_seen_at" :sortColumnName="$sortColumnName" :sortDirection="$sortDirection"/>
            </th>
            <th class="table-head w-32">
              Thao tác
            </th>
          </tr>
        </thead>
        <tbody class="bg-white">
          @foreach ($users as $user)
            <tr wire:loading.class.delay="opacity-50 cursor-wait">
              <td class="table-body">
                <div class="flex items-center">

                  <div class="ml-4">
                    <div class="text-sm font-medium leading-5 text-gray-900">{{ $user->name }}</div>

                  </div>
                </div>
              </td>

              <td class="table-body">
                <div class="text-sm leading-5 text-gray-900">{{ $user->email }}</div>
              </td>
              <td class="table-body">
                <div class="text-sm leading-5 text-gray-900">
                  @if ($user->roles->isNotEmpty())
                    @foreach ($user->roles as $role)
                      <span
                        class="mb-2 inline-flex items-center gap-5 rounded-full bg-blue-500 px-3 py-1.5 text-xs font-medium text-white">{{ $role->name }}</span>
                    @endforeach
                  @else
                    <span
                      class="mb-2 inline-flex items-center gap-5 rounded-full bg-green-500 px-3 py-1.5 text-xs font-medium text-white">Khách
                      hàng</span>
                  @endif
                </div>
              </td>
              <td class="table-body">
                <div class="text-sm leading-5 text-gray-900">
                  @if ($user->is_active == 1)
                    <span
                      class="status mb-2 inline-flex items-center gap-5 rounded-full bg-green-500 px-3 py-1.5 text-xs font-medium text-white">Online</span>
                  @else
                    <span
                      class="status mb-2 inline-flex items-center gap-5 rounded-full bg-red-500 px-3 py-1.5 text-xs font-medium text-white">Offline</span>
                  @endif
                </div>
              </td>
              <td class="table-body">
                <div class="text-sm leading-5 text-gray-900">
                    {{ formatTime($user->last_seen_at) }}
                </div>
              </td>
              <td class="whitespace-no-wrap right justify-content-end border-b border-gray-200 px-6 py-4 text-right">
                <div class="flex">
                  <button type="button" wire:click="showPermissions('{{ $user->id }}')" id="showPermission"
                    title="Xóa" data-toggle="tooltip" data-placement="bottom" data-modal-target="showPermissionModal"
                    data-modal-toggle="showPermissionModal"
                    class="hover:shadow-lgfocus:bg-blue-700 focus:ring-active:bg-red-800 ml-2 rounded bg-blue-600 px-4 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-blue-700 focus:shadow-lg focus:outline-none active:shadow-lg">
                    <i class="fas fa-eye"></i>
                  </button>
                  <a data-toggle="tooltip" data-placement="bottom"
                    class="ml-2 rounded bg-yellow-600 px-4 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg"
                    title="Sửa" href="{{ route('admin.users.edit', $user->id) }}" id="btLeft">
                    <i class="fas fa-edit" title="Sửa"></i>
                  </a>
                  <button type="button" id="deleteProductBtn" title="Xóa" data-toggle="tooltip"
                    data-placement="bottom" data-modal-target="deleteUserModal"
                    data-modal-toggle="deleteUserModal"
                    class="hover:shadow-lgfocus:bg-blue-700 focus:ring-active:bg-red-800 active:shadow-lgtransition ml-2 mr-4 rounded bg-red-600 px-4 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md duration-150 ease-in-out hover:bg-red-700 focus:shadow-lg focus:outline-none">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </div>
              </td>
            </tr>
          @endforeach
          @include('livewire.admin.authorizations.modal-show-permission')
        </tbody>

      </table>

    </div>

  </div>

  {{-- {{ $users->links('vendor.pagination.tailwind') }} --}}

</div>
