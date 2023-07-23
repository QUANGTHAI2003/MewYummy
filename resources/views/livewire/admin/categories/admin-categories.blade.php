<div class="mt-8 flex flex-col">
    <div class="-my-2 py-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
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
                               placeholder="Tìm kiếm danh mục ..." required>
                        {{-- <button type="submit" class="btn px-6  py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium text-xs leading-tight uppercase rounded shadow-md  hover:shadow-lg focus:bg-blue-900  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out  absolute right-2.5 bottom-2.5">Cerca</button> --}}
                    </div>
                </form>
            </div>
            {{-- deleteall --}}
            <div class="flex w-full items-center justify-between gap-x-3 sm:w-auto">
                <button wire:click.prevent="deleteSelected" @if (empty($selectedCategories)) disabled @endif
                class="btn rounded bg-red-600 px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-red-700 hover:shadow-lg focus:bg-red-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg">
                    {{-- loading when delete in livewire --}}
                    <x-loading target="deleteSelected"/>
                    Delete All {{ count($selectedCategories) }}
                </button>
            </div>
        </div>
        <div
            class="scrollbar min-w-full overflow-auto overflow-x-auto whitespace-nowrap border-b border-gray-200 align-middle shadow sm:rounded-lg">
            <table style="width: 600px" class="min-w-full">
                <thead>
                <tr>
                    <th class="table-head">
                        <input wire:model="selectAllCategories" id="checkAllCategory" type="checkbox" class="checkbox">
                    </th>
                    <th class="table-head cursor-pointer" wire:click.prevent="sortBy('name')">
                        Tên danh mục
                        <x-sort-arrow name="name" :sortColumnName="$sortColumnName" :sortDirection="$sortDirection"/>
                    </th>
                    <th class="table-head" wire:click.prevent="sortBy('slug')">
                        Slug
                        <x-sort-arrow name="slug" :sortColumnName="$sortColumnName" :sortDirection="$sortDirection"/>
                    </th>
                    <th class="table-head" wire:click.prevent="sortBy('is_active')">
                        Trạng thái
                        <x-sort-arrow name="is_active" :sortColumnName="$sortColumnName"
                                      :sortDirection="$sortDirection"/>
                    </th>
                    <th class="table-head w-32">
                        Thao tác
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white">
                @if (count($categories) > 0)
                    @foreach ($categories as $category)
                        <tr wire:loading.class.delay="opacity-50 cursor-wait">
                            <td class="table-body">
                                <div class="flex items-center">
                                    <input wire:model="selectedCategories" wire:key='{{ $category->id }}'
                                           value="{{ $category->id }}"
                                           type="checkbox" class="checkbox">
                                </div>
                            </td>
                            <td class="table-body">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium leading-5 text-gray-900">{{ $category->name }}</div>
                                </div>
                            </td>
                            <td class="table-body">{{ $category->slug }}</td>
                            <td class="right table-body">
                                <livewire:admin.buttons.toggle-button :model="$category" field="is_active"
                                                                      key="{{ $category->id }}"/>
                            </td>
                            <td class="right justify-content-end table-body">
                                <div class="flex">
                                    <a data-toggle="tooltip" data-placement="bottom"
                                       class="ml-2 rounded bg-yellow-600 px-4 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg"
                                       title="Sửa" href="{{ route('admin.categories.edit', $category->id) }}"
                                       id="btLeft">
                                        <button>
                                            <i class="fas fa-edit" title="Sửa"></i>
                                        </button>
                                    </a>
                                    <button wire:click="deleteCategory({{ $category->id }})" data-toggle="tooltip"
                                            data-placement="bottom" data-modal-target="deleteCategoryModal"
                                            data-modal-toggle="deleteCategoryModal"
                                            class="ml-2 rounded bg-red-600 px-4 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg"
                                            title="Xóa">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="py-4 text-center">
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
                @include('livewire.admin.categories.modal-delete')
            </table>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-between mb-5 mt-5">
        {{ $categories->links('livewire.custom-pagination') }}
    </div>
</div>
