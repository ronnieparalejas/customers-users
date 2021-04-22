<x-admin.layout>
    <div class="w-full sm:max-w-lg mt-6">
        <div class="flex flex-row justify-between">
            <x-admin.button.back href="{{ route('customers.show', $customer->id) }}">
                @lang('app.btn._go_back_to', ['customer' => $customer->name])
            </x-admin.button.back>
        </div>
        <div class="px-6 py-3 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <h2 class="font-medium text-gray-800 uppercase">@lang('app.add_new_user')</h2>
        @if (session()->has('success'))
            <x-admin.alert>
                {!! session('success') !!}
            </x-admin.alert>
        @endif 
        <form class="mt-2 space-y-4" action="{{ route('users.store', $customer->id) }}" method="post">
            @csrf
            <x-admin.form.input name="name" type="text" value="{{ old('name') }}">
                @lang('app.user_name')
            </x-admin.form.input>

            <x-admin.form.input name="email" type="email" value="{{ old('email') }}">
                @lang('app.email')
            </x-admin.form.input>

            <x-admin.form.input name="serial" type="text" value="{{ \Str::random() }}" class="bg-gray-100 text-gray-500" readonly>
                @lang('app.email')
            </x-admin.form.input>

            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">@lang('app.btn.submit')</button>
            </div>
        </form>
    </div>
</x-admin.layout>