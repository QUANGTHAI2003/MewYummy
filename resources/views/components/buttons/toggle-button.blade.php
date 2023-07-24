
@props(['label', 'value', 'name', 'check'])

<div class="flex items-center justify-between gap-4 max-w-[200px]">
  <label for="{{ $label }}" class="text-md ml-3 font-medium text-gray-900 dark:text-gray-300 cursor-pointer user-select-none">{{$label}}</label>
  <label class="relative inline-flex cursor-pointer items-center">
    <input id="{{ $label }}" type="checkbox" {{ $check !== '' ? 'checked' : '' }}  name="{{ $name }}" value="{{$value}}" class="peer sr-only">
    <div
      class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:left-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:ring-4 peer-focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-blue-800">
    </div>
  </label>
</div>