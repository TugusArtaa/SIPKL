@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-900 dark:text-white']) }}>
    {{ $value ?? $slot }}
</label>