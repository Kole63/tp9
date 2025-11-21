<x-form.button :small="true" onclick="items.display('{{route('items.show', $row->id)}}')">
  <i class="bi bi-eye"></i>
</x-form.button>
@can('update', $row)
<x-form.button href="{{route('items.edit',$row->id)}}" :small="true">
  <i class="bi bi-pencil-square"></i>
</x-form.button>
@endcan
@can('delete', $row)
@if($row->trashed())
<x-form.button onclick="items.delete('{{route('items.forcedestroy', $row->id)}}')" :small="true">
  <i class="bi bi-trash"></i>
</x-form.button>
<x-form.button href="{{route('items.restore', $row->id)}}" :small="true">
  <i class="bi bi-recycle"></i>
</x-form.button>
@else
<x-form.button onclick="items.delete('{{route('items.destroy', $row->id)}}')" :small="true">
  <i class="bi bi-trash"></i>
</x-form.button>
@endif
@endcan