<x-admin.layout>
    <div class="w-full sm:max-w-lg mt-6 px-6 py-3 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <h2 class="font-medium text-gray-800 uppercase">@lang('app.customer_list')</h2>
        <table class="min-w-full divide-y divide-gray-200 mt-2">
            <thead class="bg-gray-50">
                <tr>
                    <x-admin.table.th class="w-10">#</x-admin.table.th>
                    <x-admin.table.th>@lang('app.customers')</x-admin.table.th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($customers as $customer)
                <tr>
                    <x-admin.table.td>
                        <span class="text-gray-500 text-xs">{{ $loop->iteration }}</span>
                    </x-admin.table.td>
                    <x-admin.table.td>
                        <a href="{{ route('customers.show', $customer->id) }}" class="text-sm font-medium text-gray-900 hover:underline">
                            {{ $customer->name }}
                        </a>
                    </x-admin.table.td>
                </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-6 py-3 text-sm text-gray-500">@lang('app.no_data')</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin.layout>