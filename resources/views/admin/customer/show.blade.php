<x-admin.layout>
    <div class="w-full sm:max-w-4xl mt-6">
        <div class="flex flex-row justify-between">
            <x-admin.button.back href="{{ route('customers.index') }}">
                @lang('app.btn.go_back_cust')
            </x-admin.button.back>
            <a href="{{ route('users.create', $customer->id) }}" class="bg-gray-200 px-3 py-1 rounded-md flex flex-row items-center mb-2 text-sm text-gray-500 hover:text-gray-100 hover:bg-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span>@lang('app.btn.add')</span>
            </a>
        </div>
        <div class="px-6 py-3 bg-white shadow-md overflow-auto sm:rounded-lg">
            <h2 class="font-medium text-gray-800 uppercase">{{ $customer->name }}</h2>
            @if (session()->has('success'))
                <x-admin.alert>
                    {!! session('success') !!}
                </x-admin.alert>
            @endif 
            <table class="min-w-full divide-y divide-gray-200 mt-2">
                <thead class="bg-gray-50">
                    <tr>
                        <x-admin.table.th class="w-10">#</x-admin.table.th>
                        <x-admin.table.th>@lang('app.users')</x-admin.table.th>
                        <x-admin.table.th>@lang('app.email')</x-admin.table.th>
                        <x-admin.table.th>@lang('app.serial')</x-admin.table.th>
                        <x-admin.table.th></x-admin.table.th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($users as $user)
                    <tr>
                        <x-admin.table.td>
                            <span class="text-gray-500 text-xs">{{ $loop->iteration }}</span>
                        </x-admin.table.td>
                        <x-admin.table.td>{{ $user->name }}</x-admin.table.td>
                        <x-admin.table.td>{{ $user->email }}</x-admin.table.td>
                        <x-admin.table.td class="text-green-500 text-xs">{{ $user->serial }}</x-admin.table.td>
                        <x-admin.table.td>
                            <form action="{{ route('users.destroy', $user->id) }}"method="post">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="text-sm bg-red-100 hover:bg-red-200 text-red-500 p-1 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>
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
       <div class="mt-3">
        {{ $users->links() }}
       </div>
    </div>
</x-admin.layout>