@props(['type' => 'button'])

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => 'inline-flex min-h-11 items-center justify-center gap-2 rounded-md bg-[#c91f2d] px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-[#aa1724] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c91f2d] focus-visible:ring-offset-2']) }}
>
    {{ $slot }}
</button>