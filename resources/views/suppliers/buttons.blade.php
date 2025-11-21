<x-form.button href="{{route('suppliers.show', $row->id)}}" :small="true">
  <i class="bi bi-eye"></i>
</x-form.button>
<x-form.button href="{{route('supplier.items', $row->id)}}" :small="true">
  <i class="bi bi-boxes"></i>
</x-form.button>
@can('editItems', $row)
<x-form.button href="{{route('supplier.deleteditems', $row->id)}}" :small="true">
  <i class="bi bi-recycle"></i>
</x-form.button>
@endcan
@can('update', $row)
<x-form.button href="{{route('suppliers.edit',$row->id)}}" :small="true">
  <i class="bi bi-pencil-square"></i>
</x-form.button>
<x-form.button href="{{route('suppliers.editors',$row->id)}}" :small="true">
  <i class="bi bi-people"></i>
</x-form.button>
@endcan
@can('delete', $row)
<x-form.button onclick="items.delete('{{route('suppliers.destroy', $row->id)}}')" btn="danger" :small="true">
  <i class="bi bi-trash"></i>
</x-form.button>
@endcan