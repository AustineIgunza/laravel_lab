@props(['disabled' => false])

@php
$selectClasses = 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 ' .
    'focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 ' .
    'dark:focus:ring-indigo-600 rounded-md shadow-sm';
@endphp

<select :disabled="$disabled" {{ $attributes->merge(['class' => $selectClasses]) }}>
    <option value="" disabled selected>Select a Role</option>
    {{ $slot }}
</select>
