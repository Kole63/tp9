@extends('template')
@section('title') Affichage d'un article @endsection
@section('content')
<i>Prix : {{$item->price}} €</i>
<strong>{{$item->title}}</strong>
{{$item->description}}<br/>
<i>Produit par :</i> <a href="{{route('supplier.items', $item->supplier->id)}}">{{$item->supplier->name}}</a><br>
@foreach($item->categories as $category)
  <span class="category">
      {{ $category->title }}
  </span>
@endforeach
<br>
<img src="@if($item->image != null) {{ asset('items_images/'.$item->image) }} @endif" class="card-img-top">
<a href="{{ route('items.index') }}">Retour à la liste</a>
@endsection