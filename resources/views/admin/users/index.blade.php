@extends('layouts.admin')

@section('content')
    <h3 class="text-gray-700 text-3xl font-medium">Users</h3>

    <div class="flex flex-col mt-8">
        <div class="my-2 pb-4 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle overflow-x-auto scroll min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table style="width: 1000px" class="min-w-full">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Address
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Phone
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>

                    </tr>
                    </thead>

                    <tbody class="bg-white">
                    {{-- @foreach ($users as $user) --}}
                    <tr>
                        <td style="width: 200px" class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="flex items-center">

                                <div class="ml-4">
                                    <div class="text-sm leading-5 font-medium text-gray-900">Trần Quang Thái</div>

                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-900">tranquangthai.10102003@gmail.com</div>

                        </td>
                        <td style="width: 500px" class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-900"> thị trấn Thới Lai, huyện Thới Lai, thành phố
                                Cần Thơ
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-900"> 0774060610</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            {{-- <button type="button" title="Xóa"
                                class="px-4 py-2.5 ml-2 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lgfocus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0active:bg-green-800 active:shadow-lgtransition duration-150 ease-in-out mr-4">
                                Online

                            </button> --}}
                            <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-green-500 text-white">Active</span>
                            {{-- <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-500 text-white">Unactive</span> --}}
                            {{-- <button type="button" title="Xóa"
                                class="px-4 py-2.5 ml-2 bg-yellow-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-700 hover:shadow-lgfocus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0active:bg-yellow-800 active:shadow-lgtransition duration-150 ease-in-out mr-4">
                                Offine
                            </button> --}}
                        </td>
                        {{-- <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <form action="{{ route('customers.destroy' ,$user->billing_id) }}" id="myform" method="post">

                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="bottom"
                                   title="Modifica" href="{{ route('customers.edit',$user->billing_id) }}"><i
                                        class="fas fa-edit"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" data-toggle="tooltip" data-placement="bottom" title="Elimina"
                                        class="btn btn-danger"
                                        data-confirm="Sei sicuro di voler eliminare questo articolo?"><i
                                        class="fas fa-trash-alt"></i></button>
                            </form>
                        </td> --}}

                    </tr>
                    {{-- @endforeach --}}

                    </tbody>

                </table>


            </div>

        </div>

        {{-- {{ $users->links('vendor.pagination.tailwind') }} --}}


    </div>
@endsection
