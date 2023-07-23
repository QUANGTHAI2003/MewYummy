@extends('layouts.admin')

@section('content')
    <h3 class="text-gray-700 text-3xl font-medium">Users</h3>

    <div class="flex flex-col mt-8">
        <div class="my-2 pb-4 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
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
                            Phone number
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>

                    </tr>
                    </thead>

                    <tbody class="bg-white">
                    {{-- @foreach ($users as $user) --}}
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="flex items-center">

                                <div class="ml-4">
                                    <div class="text-sm leading-5 font-medium text-gray-900">Trần Quang Thái</div>

                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-900">tranquangthai.10102003@gmail.com</div>

                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-900">Thị trấn thới Lai, huyện Thới Lai, thành phố Cần Thơ</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-900">0774060610</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <button class="px-4 py-2.5 ml-2 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">Online</button>


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
