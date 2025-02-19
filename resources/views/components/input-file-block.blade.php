<div class="form-group mb-3">
    <label  class="mb-2 form-label">{{ $label ? $label : ucwords($name) }}</label>
    <input type="file" name="{{ $name }}" class="form-control">
    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>
