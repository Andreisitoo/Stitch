@props([
    'id',
    'name' => null,
    'label',
    'type' => 'text',
    'value' => null,
    'placeholder' => null,
    'autocomplete' => null,
    'required' => false,
])

@php($fieldName = $name ?? $id)

<div>
    <div class="mb-2 flex items-center justify-between gap-3">
        <label for="{{ $id }}" class="text-xs font-semibold text-slate-700">{{ $label }}</label>
        @if ($required)
            <span class="text-[10px] font-bold uppercase tracking-[0.12em] text-[#b91c2b]">Requerido</span>
        @endif
    </div>
    <div class="relative">
        @isset($leading)
            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                {{ $leading }}
            </span>
        @endisset
        <input
            {{ $attributes->merge([
                'class' => 'block w-full rounded-md border bg-white py-3 text-sm text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-[#b91c2b] focus:ring-2 focus:ring-[#b91c2b]/15 ' . (isset($leading) ? 'pl-10 ' : 'px-3 ') . (isset($trailing) ? 'pr-10' : 'pr-3') . ($errors->has($fieldName) ? ' border-red-400' : ' border-slate-300'),
            ]) }}
            id="{{ $id }}"
            name="{{ $fieldName }}"
            type="{{ $type }}"
            value="{{ $value }}"
            @if ($placeholder) placeholder="{{ $placeholder }}" @endif
            @if ($autocomplete) autocomplete="{{ $autocomplete }}" @endif
            @if ($required) required @endif
            @if ($errors->has($fieldName)) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
        >
        @isset($trailing)
            <span class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400">
                {{ $trailing }}
            </span>
        @endisset
    </div>
    @error($fieldName)
        <p id="{{ $id }}-error" class="mt-2 text-xs font-medium text-red-700">{{ $message }}</p>
    @enderror
</div>