
<!-- The only way to do great work is to love what you do. - Steve Jobs -->
@php
    $labelAttributes = collect($attributes->getAttributes())
        ->filter(fn($value, $key) => str_starts_with($key, 'label:'))
        ->mapWithKeys(fn($value, $key) => [str_replace('label:', '', $key) => $value])
        ->merge(['for' => $id, 'class' => 'form-label']);

    $inputAttributes = $attributes->whereDoesntStartWith('label:');
@endphp

@if($label)
    <label {{ $labelAttributes }}>
        {{ $label }}
    </label>
@endif

<input
    {{ $attributes->whereDoesntStartWith('label:')->merge([
        'id' => $id,
        'type' => $type,
        'name' => $id,
        'placeholder' => $placeholder,
        'required' => $required,
        'value' => old($id, $value),
    ])->class([
        'is-invalid' => $errors->has($id),
        $classes,
    ])}}
/>
@error($id)
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
