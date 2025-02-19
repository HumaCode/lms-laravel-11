<div class="form-group">
    <label  class="mb-2 form-label">{{ $label ? $label : ucwords($name) }}</label>
    <input type="text" name="{{ $name }}" class="form-control"
        placeholder="{{ $placeholder }}" value="{{ $value }}">
    <x-input-error :messages="$errors->get($name)" class="mt-2" />

    @isset($hint)
        {{ $hint }}
    @endisset
</div>
