<button {{ $attributes->class(['btn', 'd-flex', 'align-items-center' ]) }} {{ $attributes->merge() }}>
    {{ $slot }}
</button>
