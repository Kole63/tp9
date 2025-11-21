<i>Prix : {{$item->price}} €</i>
{{$item->description}}<br/>
<i>Produit par :</i> <a href="{{route('supplier.items', $item->supplier->id)}}">{{$item->supplier->name}}</a><br>
@foreach($item->categories as $category)
    <span class="category">
        {{ $category->title }}
    </span>
@endforeach