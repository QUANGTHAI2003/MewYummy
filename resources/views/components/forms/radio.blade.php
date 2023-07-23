@props(['class', 'label'])

<div {{ $attributes->merge(['class' => $class]) }}>
    <label for="published" class="my-2 block text-sm font-medium text-gray-700">{{ $label }}</label>
    <div class="mt-4">
        {{ $slot }}
    </div>
    @error('is_active')
    <span class="text-sm text-red-500">{{ $message }}</span>
    @enderror
</div>
