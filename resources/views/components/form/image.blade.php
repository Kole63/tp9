<div class="mb-3 row">
  <label for="{{ $name }}" class="col-sm-2 col-form-label">{{ $label }}</label>
  <div class="col-sm-10">
    <input type="file" name="{{ $name }}" id="{{ $name }}" accept="image/*">
    <input type="hidden" name="MAX_FILE_SIZE" value="{{ $size }}" />
  </div>
  @error($name)<div class="offset-sm-2 invalid-feedback" style="display: block;">{{ $message }}</div>@enderror
</div>