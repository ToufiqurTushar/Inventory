@props([
    'col' => 'col-sm-12 col-lg-3',
    'id' => null,
    'name' => null,
    'text' => null
])

<div class="form-check  form-check-inline">
    <input {{ $attributes->merge(['class' => 'form-check-input']) }} type="checkbox" id="{{ $id ?? $name }}" name="{{ $name }}">
    <label class="form-check-label fs-14  pointer" for="{{ $id ?? $name }}">{{ $text ?? '' }}</label>
</div>
