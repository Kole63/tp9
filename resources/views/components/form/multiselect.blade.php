@push('head')
@vite(['resources/js/multiselect.js'])
@endpush

<div class="mb-3 row">
  <label for="select_{{ $name }}" class="col-sm-2 col-form-label">{{ $label }}</label>
  <div class="col-sm-10">
    <select 
      {{ $attributes->class([
        'form-select',
        'is-invalid' => $errors->has('supplier_id')
      ])
      ->except(['label', 'default', 'data', 'key', 'title', 'name', 'values'])
       }}
      id="select_{{ $name }}">
      <option value="{{ $default['id'] }}">{{ $default['title'] }}</option>
      @foreach($data as $item)
      <option value="{{ $item[$key] }}">{{ $item[$title] }}</option>
      @endforeach
    </select>
    <span id="{{ $name }}List"></span>
  </div>
  @error($name)<div class="offset-sm-2 invalid-feedback" style="display: block;">{{ $message }}</div>@enderror
</div>

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    multiselect.init('{{ $name }}');
    @if(old($name) != null)
    @foreach(old($name) as $element)
    multiselect.add({{$element}});
    @endforeach
    @else
      @if(isset($values))
      @foreach($values as $element)
        multiselect.add({{$element->id}});
      @endforeach
      @endif
    @endif
  });
</script>
@endpush