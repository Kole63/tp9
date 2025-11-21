@extends('template')
@push('head')
@vite(['resources/js/items.js'])
@endpush
@section('title') Liste des fournisseurs @endsection
@section('content')
<div class="d-flex justify-content-center">
  <x-form.button href="{{route('items.index')}}">Liste des articles</x-form.button>
  @can('create supplier')
  <x-form.button href="{{route('suppliers.create')}}">Création d'un nouveau fournisseur</x-form.button>
  @endcan
  @guest
  <x-form.button href="{{route('login')}}">Connexion</x-form.button>
  @else
  <form method="post" action="{{route('logout')}}">
    @csrf
    <x-form.button type="submit" btn="danger">Déconnexion</x-form.button>
  </form>
  @endguest
</div>

<x-bootstrap.modal>
  <x-slot:id>deleteModal</x-slot>
  <x-slot:title>Suppression du fournisseur</x-slot>
  <x-slot:buttons>
    <button class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
    <button type="sumbit" form="deleteForm" class="btn btn-danger" data-bs-dismiss="modal">Confirmer</button>
  </x-slot>
  Êtes-vous sûr de supprimer ce fournisseur avec tous les articles associés ?
</x-bootstrap>

<x-datatables id="suppliers-list" :cols="[ 'Fournisseur', 'Adresse', 'Actions' ]" />

<form id="deleteForm" action="" method="POST">
  @method('DELETE')
  @csrf
</form>
@endsection

@push('scripts')
<script type="module">
document.addEventListener('DOMContentLoaded', function() {
  $('#suppliers-list').DataTable({
      serverSide: true,
      ajax: {
        url: "{{ route('suppliers.index') }}"
      },
      columns: [
        { data: "name" },
        { data: "address" },
        {
          data: "actions",
          orderable: false, 
          searchable: false,
          className: "text-end"
        }
      ],
      pageLength: 10,
      stateSave: false,
      language: dtfrench
  });
});
</script>
@endpush