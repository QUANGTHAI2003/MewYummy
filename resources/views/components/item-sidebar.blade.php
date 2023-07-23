@props(['route', 'name', 'permisson'])

<li>
  <a href="{{ route($route) }}"
    @if (!auth()->user()->can($permisson)) disabled class="text-gray-500 cursor-not-allowed pointer-events-none" @endif>
    <i class="bi bi-circle"></i>
    <span>{{ $name }}</span>
  </a>
</li>
