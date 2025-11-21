<div class="mb-3 row">
  <label for="{{ $name }}" class="col-sm-2 col-form-label">{{ $label }}</label>
  <div class="col-sm-10">
    <textarea 
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $attributes->class([
                'form-control',
                'is-invalid' => $errors->has($name),
            ])
            ->except(['label']) }}
    >{{ old($name, $value) }}</textarea>
  </div>
  @error($name)<div class="offset-sm-2 invalid-feedback" style="display: block;">{{ $message }}</div>@enderror
</div>