@extends('template')
@section('title') Ajout d'éditeurs pour {{$supplier->name}} @endsection
@section('content')
<form action="{{route('suppliers.editors.update', $supplier)}}" method="post">
  @csrf
  <x-form.multiselect label="Éditeurs(s)" name="editors" :default="[ 'id' => -1, 'title' => 'Sélectionnez un éditeur' ]" :data="$editorList" :values="$supplier->editors ?? null" key="id" title="name" />
  <x-form.buttons>
    <x-form.button type="submit">Valider</x-form.button>
    <x-form.button href="{{ route('suppliers.editors', $supplier) }}" btn="danger">Annuler</x-form.button>
  </x-form.buttons>
</form>
@endsection