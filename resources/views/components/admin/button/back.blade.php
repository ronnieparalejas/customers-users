@props(['href'])
<div>
    <a href="{{ $href }}" class="flex flex-row items-center mb-2 text-sm text-gray-500 hover:text-gray-800">
        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        <span>{{ $slot }}</span>
    </a>
</div>