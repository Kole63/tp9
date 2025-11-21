@can('update', $supplier)
<x-form.button onclick="items.delete('{{route('suppliers.editors.destroy', [$supplier, $row->id])}}')" :small="true">
  <i class="bi bi-trash"></i>
</x-form.button>
@endcan