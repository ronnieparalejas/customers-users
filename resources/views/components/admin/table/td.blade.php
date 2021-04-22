<td class="px-6 py-3 whitespace-nowrap">
    <div class="flex flex-col">
        <span {{ $attributes->merge(['class' => 'text-sm text-gray-900']) }}>
            {{ $slot }}
        </span>
    </div>
</td>