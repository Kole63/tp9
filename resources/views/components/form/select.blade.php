<div class="mb-3 row">
  <label for="{{ $name }}" class="col-sm-2 col-form-label">{{ $label }}</label>
  <div class="col-sm-10">
    <select 
      {{ $attributes->class([
        'form-select',
        'is-invalid' => $errors->has('supplier_id')
      ])
      ->except(['label', 'default', 'data', 'key', 'title', 'value'])
       }}
      name="{{ $name }}" id="{{ $name }}">
      @isset($default)
      <option value="{{ $default['id'] }}">{{ $default['title'] }}</option>
      @endisset
      @foreach($data as $item)
      <option value="{{ $item[$key] }}" @selected(old($name, $value) == $item[$key])>{{ $item[$title] }}</option>
      @endforeach
    </select>
  </div>
  @error($name)<div class="offset-sm-2 invalid-feedback" style="display: block;">{{ $message }}</div>@enderror
</div>