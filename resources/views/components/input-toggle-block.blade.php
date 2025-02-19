<div class="mb-3">
    <div class="form-label">{{ $label ? $label : ucword('name') }}</div>
    <label class="form-check form-switch">
      <input class="form-check-input" name="{{ $name }}" value="1" type="checkbox" @checked($checked)>
      <span class="form-check-label">{{ $label ? $label : ucword('name') }}</span>
    </label>
    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>
