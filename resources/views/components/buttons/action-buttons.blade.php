<td class="whitespace-no-wrap border-b border-gray-200 px-6 py-4">
    <a data-toggle="tooltip" data-placement="bottom"
       class="ml-2 rounded bg-yellow-600 px-4 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg"
       title="Sửa" href="{{ route($routeEdit, $idRoute) }}" id="btLeft">
        <button>
            <i class="fas fa-edit" title="Sửa"></i>
        </button>
    </a>
    <form action="{{ route($routeDelete, $idRoute) }}" method="POST">
        @csrf
        @method('DELETE')
        <button data-toggle="tooltip" data-placement="bottom"
                class="ml-2 rounded bg-red-600 px-4 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg"
                title="Xóa">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
</td>
