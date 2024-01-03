<button {{ $attributes->class(['btn']) }} {{ $attributes->merge() }}>
    {{ $slot }}
</button>
