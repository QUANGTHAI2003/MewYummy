@props(['class', 'label', 'name', 'value', 'type'])

<div {{ $attributes->merge(['class' => $class]) }}>
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <input type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name) }}"
           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
    @error($name)
    <span class="text-sm text-red-500">{{ $message }}</span>
    @enderror
</div>
