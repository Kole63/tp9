@extends('template')
@section('title') Affichage d'un fournisseur @endsection
@section('content')
<i>Nom :</i> <strong>{{$supplier->name}}</strong><br>
<i>Adresse :</i><br>
{{$supplier->address}}<br>
<a href="{{ route('suppliers.index') }}">Retour à la liste</a>
@endsection