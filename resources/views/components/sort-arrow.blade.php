@props(['name', 'sortColumnName', 'sortDirection'])

<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
     stroke="{{ $sortColumnName === $name && $sortDirection === 'asc' ? 'black' : 'currentColor' }}"
     class="w-3 h-3 inline-block">
    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75L12 3m0 0l3.75 3.75M12 3v18"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
     stroke="{{ $sortColumnName === $name && $sortDirection === 'desc' ? 'black' : 'currentColor' }}"
     class="w-3 h-3 inline-block">
    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25L12 21m0 0l-3.75-3.75M12 21V3"/>
</svg>
