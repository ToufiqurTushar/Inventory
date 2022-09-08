<label class="{{ ($required ?? false) ? 'label label-required ' : 'label ' }}" for="{{ $name }}">
    {{ $label }}<span class="text-danger">{{ ($required ?? false) ? '*' : '' }}</span>
</label>
