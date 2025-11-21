<span class="price">
  {{$row->price}} €
</span>
<strong>{{$row->title}}</strong>
@if(mb_strlen($row->description) > 50)
  {{mb_substr($row->description, 0, 50)}}...
@else
  {{$row->description}}
@endif
<br>
<i>Produit par :</i> <a href="{{ route('supplier.items', $row->supplier->id) }}">{{ $row->supplier->name }}</a><br>
@foreach($row->categories as $category)
  <span class="category">{{$category->title}}</span>
@endforeach