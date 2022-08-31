@props([
    'col' => 'col-sm-12 col-lg-3',
    'name' => null,
    'label' => null,
    'labelclass' => null,
    'iconclass' => null,
    'inputgroup' => null,
    'value',
    'type' => 'text',
    'min' => null,
    'max' => null,
    'step' => null,
    'required' => null,
    'icon' => null,
    'disabled' => null,
    'placeholder' => null,
    'autofocus' => null,
    'autocomplete' => null,
])

<div class="{{ $col }}">
    @if($label ?? null)
        <label for="{{ $id ?? $name }}" class="form-label label {{ $labelclass ? $labelclass : '' }}">{{ $label=='' ? ucwords($name) : $label}}&nbsp;{!!   ($required ?? false) ? "<span class='text-danger'>*</span>" : '' !!}</label>
    @endif
    <div class="input-group {{ $inputgroup ?? '' }}">
        @if($icon ?? null)
            <span class="input-group-text {{ $iconclass ? $iconclass : '' }}"><span class="fa fa-{{ $icon }}"></span></span>
        @endif
        <input
            name="{{ $name }}"
            type="{{ $type }}"
            {{ $attributes->merge(['class' => 'form-control']) }}
            value="{{ old($name, $value ?? '') }}"
            {{ $min ? "min={$min}" : '' }}
            {{ $max ? "max={$max}" : '' }}
            {{ $step ? "step={$step}" : '' }}
            @if($placeholder ?? null) placeholder="{{ $placeholder }}"
            @else ($label ?? null) placeholder="{{ $label }}" @endif
            {{ ($disabled ?? false) ? 'disabled' : '' }}
            {{ ($required ?? false) ? 'required' : '' }}
            {{ ($autofocus ?? false) ? 'autofocus' : '' }}
            @if($autocomplete ?? null) autocomplete="{{ $autocomplete }}" @endif
            {{ $attributes }}
            />
    </div>

    @if($errors->has($name)) <span class="text-danger fw fs-12 error-message mb-1">@error($name){{ $message }} @enderror </span>
    @else <span class="text-danger fw fs-12 error-message mb-1">&nbsp;</span>
    @endif
</div>

