@props([
    'col' => 'col-sm-12 col-lg-3',
    'id' => null,
    'name' => null,
    'text' => null,
    'label' => null,
    'labelclass' => null,
    'required' => null,
    'disabled' => null,
])

<div class="{{ $col }}">
    @if($label ?? null)
        <label for="{{ $id ?? $name }}" class="form-label label {{ $labelclass ? $labelclass : '' }}">{{ $label=='' ? ucwords($name) : $label}} {!!   ($required ?? false) ? "<span class='text-danger'>*</span>" : '' !!}</label>
    @endif
    <select
        {{ $attributes->merge(['class' => 'form-select']) }}
        name="{{ $name }}"
        {{ ($required ?? false) ? 'required' : '' }}
        {{ ($disabled ?? false) ? 'disabled' : '' }}
        {{ $attributes }}>

        {{ $slot }}
    </select>
    <span class="text-danger fw fs-12 error-message">@error($name){{ $message }} @enderror</span>
    @if(!$errors->has($name)) <span class="text-danger fw fs-12">&nbsp;</span> @endif
</div>
