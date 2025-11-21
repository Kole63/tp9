@foreach($list as $item)
<x-card.item>
<x-slot:image>@if($item->image == null) {{ asset('') }} @else {{ asset('items_images/'.$item->image) }} @endif</x-slot>
<x-slot:title>{{ $item->title }}</x-slot>
{{ $item->description }}
<x-slot:buttons>
    <x-form.button :small="true" onclick="items.display('{{route('items.show', $item->id)}}')">
    <i class="bi bi-eye"></i>
    </x-form.button>
    @can('update', $item)
    <x-form.button href="{{route('items.edit',$item->id)}}" :small="true">
    <i class="bi bi-pencil-square"></i>
    </x-form.button>
    @endcan
    @can('delete', $item)
    @if($item->trashed())
    <x-form.button onclick="items.delete('{{route('items.forcedestroy', $item->id)}}')" :small="true">
    <i class="bi bi-trash"></i>
    </x-form.button>
    <x-form.button href="{{route('items.restore', $item->id)}}" :small="true">
    <i class="bi bi-recycle"></i>
    </x-form.button>
    @else
    <x-form.button onclick="items.delete('{{route('items.destroy', $item->id)}}')" :small="true">
    <i class="bi bi-trash"></i>
    </x-form.button>
    @endif
    @endcan
</x-slot>
</x-card.item>
@endforeach