@props(['label', 'id'])

<div>
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <input type="text" id="{{ $id }}" class="mt-1 w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg" readonly>
</div>
