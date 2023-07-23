@extends('layouts.admin')

@section('content')
  <h3 class="text-3xl font-medium text-gray-700">Users</h3>

  <div class="mt-8 flex flex-col">
    <div class="my-2 overflow-x-auto pb-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
      <div
        class="scroll min-w-full overflow-hidden overflow-x-auto border-b border-gray-200 align-middle shadow sm:rounded-lg">
        <table class="w-[900px] min-w-full">
          <thead>
            <tr>
              <th class="table-head">
                Name
              </th>
              <th class="table-head">
                Email
              </th>
              <th class="table-head">
                Vai trò
              </th>
              <th class="table-head">
                Các quyền
              </th>
              <th class="table-head">
                Thao tác
              </th>
            </tr>
          </thead>
          <tbody class="bg-white">
            @foreach ($users as $user)
              <tr>
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
                    @foreach ($user->roles as $role)
                      {{ $role->name }}
                    @endforeach
                  </div>
                </td>
                <td class="table-body">
                  <div class="text-sm leading-5 text-gray-900">
                    @foreach ($user->roles[0]->permissions as $permission)
                      <span
                        class="mb-2 inline-flex items-center gap-5 rounded-full bg-blue-500 px-3 py-1.5 text-xs font-medium text-white">{{ $permission->name }}</span>
                    @endforeach
                  </div>
                </td>
                <td class="whitespace-no-wrap right justify-content-end border-b border-gray-200 px-6 py-4 text-right">
                  <div class="flex">
                    <a data-toggle="tooltip" data-placement="bottom"
                      class="ml-2 rounded bg-yellow-600 px-4 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg"
                      title="Sửa" href="#" id="btLeft">
                      <i class="fas fa-edit" title="Sửa"></i>
                    </a>
                    <button type="button" id="deleteProductBtn" title="Xóa" data-toggle="tooltip"
                      data-placement="bottom" data-modal-target="deleteProductModal"
                      data-modal-toggle="deleteProductModal"
                      class="hover:shadow-lgfocus:bg-blue-700 focus:ring-0active:bg-red-800 active:shadow-lgtransition ml-2 mr-4 rounded bg-red-600 px-4 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md duration-150 ease-in-out hover:bg-red-700 focus:shadow-lg focus:outline-none">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </div>
                </td>
              </tr>
            @endforeach

          </tbody>

        </table>

      </div>

    </div>

    {{-- {{ $users->links('vendor.pagination.tailwind') }} --}}

  </div>
@endsection
