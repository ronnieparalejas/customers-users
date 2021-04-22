@props(['name'])
<div>
    <label class="block font-medium text-sm text-gray-700" for="{{ $name }}">{{ $slot }}</label>
    <input name="{{ $name }}" {{ $attributes->merge(['id' => $name, 'class' => 'px-4 py-3 leading-5 border rounded-md focus:outline-none focus:ring focus:border-blue-400 w-full']) }}>
    @error($name)
        <span class="text-xs text-red-500">{{ $message }}</span>
    @enderror
</div>