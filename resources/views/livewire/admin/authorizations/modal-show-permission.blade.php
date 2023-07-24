<div wire:ignore.self id="showPermissionModal" tabindex="-1"
  class="fixed left-0 right-0 top-0 z-50 hidden max-h-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
  <div class="relative max-h-full max-w-lg">
    <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
      <div class="px-6 py-4">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Danh sách các quyền</h2>
      </div>
      <button type="button"
        class="absolute right-2.5 top-3 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
        data-modal-hide="showPermissionModal">
        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close modal</span>
      </button>
      <div wire:loading role="status" class="text-cente animate-pulse p-6">
        @for ($i = 0; $i < 12; $i++)
          <span
            class="mb-2 inline-flex h-3 w-28 items-center gap-5 rounded-full bg-gray-200 px-3 py-1.5 text-xs dark:bg-gray-700"></span>
        @endfor
      </div>
      <div wire:loading.remove class="p-6 text-center">
        @if (!empty($permissions))
          @foreach ($permissions as $permission)
            <span
              class="mb-2 inline-flex items-center gap-5 rounded-full bg-blue-500 px-3 py-1.5 text-xs font-medium text-white">{{ $permission }}</span>
          @endforeach
        @endif
      </div>
    </div>
  </div>
</div>
