@props([
    'id',
    'name' => null,
    'label',
    'value' => null,
    'options' => [],
    'required' => false,
])

@php($fieldName = $name ?? $id)

<div>
    <label for="{{ $id }}" class="mb-2 block text-xs font-semibold text-slate-700">{{ $label }}</label>
    <select
        {{ $attributes->merge(['class' => 'block w-full rounded-md border bg-white px-3 py-3 text-sm text-slate-900 shadow-sm outline-none transition focus:border-[#b91c2b] focus:ring-2 focus:ring-[#b91c2b]/15 ' . ($errors->has($fieldName) ? 'border-red-400' : 'border-slate-300')]) }}
        id="{{ $id }}"
        name="{{ $fieldName }}"
        @if ($required) required @endif
        @if ($errors->has($fieldName)) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
    >
        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" @selected((string) old($fieldName, $value) === (string) $optionValue)>{{ $optionLabel }}</option>
        @endforeach
    </select>
    @error($fieldName)
        <p id="{{ $id }}-error" class="mt-2 text-xs font-medium text-red-700">{{ $message }}</p>
    @enderror
</div>