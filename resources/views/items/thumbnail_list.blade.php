@extends('template')
@push('head')
@vite(['resources/js/items.js'])
@endpush
@section('title') @isset($supplier) Liste des articles de {{ $supplier->name }} @else La caverne d'Ali Rabat @endisset @endsection
@section('content')
<div class="d-flex justify-content-center">
  @isset($supplier)
  <x-form.button href="{{route('items.index')}}">
    Liste de tous les articles
  </x-form.button>
  @endisset
  <x-form.button href="{{route('suppliers.index')}}">
    Liste des fournisseurs
  </x-form.button>
  @can('create', Item::class)
  <x-form.button href="{{route('items.create')}}">
    Création d'un nouvel article
  </x-form.button>
  @endcan
  @guest
  <x-form.button href="{{route('login')}}">
    Connexion
  </x-form.button>
  @else
  <form method="post" action="{{route('logout')}}">
    @csrf
    <x-form.button type="submit" btn="danger">
      Déconnexion
    </x-form.button>
  </form>
  @endguest
</div>

<x-bootstrap.modal>
  <x-slot:id>myModal</x-slot>
  <x-slot:title>Article</x-slot>
  <x-slot:buttons>
    <button class="btn btn-primary" data-bs-dismiss="modal">Fermer</button>
  </x-slot>
</x-bootstrap>

<x-bootstrap.modal>
  <x-slot:id>deleteModal</x-slot>
  <x-slot:title>Suppression de l'article</x-slot>
  <x-slot:buttons>
    <button class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
    <button type="sumbit" form="deleteForm" class="btn btn-danger" data-bs-dismiss="modal">Confirmer</button>
  </x-slot>
  Êtes-vous sûr de supprimer cet article ?
</x-bootstrap>

<form id="deleteForm" action="" method="POST">
  @method('DELETE')
  @csrf
</form>

<x-card.container id="items_content">
  @include('items.thumbnail_content')
</x-card.container>

@endsection

@push('scripts')
<script type="module">
  window.addEventListener('scroll', function () {
    items.initScroll("{{ route('items.content') }}");
  });
</script>
@endpush