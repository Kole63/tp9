@extends('template')
@push('head')
@vite(['resources/js/items.js'])
@endpush
@section('title') Liste des éditeurs de {{$supplier->name}} @endsection
@section('content')
<div class="d-flex justify-content-center">
  @can('update', $supplier)
  <x-form.button href="{{route('suppliers.editors.select', $supplier)}}">
    Ajouter des éditeurs
  </x-form.button>
  @endcan
  <x-form.button href="{{route('items.index')}}">
    Liste des articles
  </x-form.button>
  <x-form.button href="{{route('suppliers.index')}}">
    Liste des fournisseurs
  </x-form.button>
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
  <x-slot:id>deleteModal</x-slot>
  <x-slot:title>Suppression de l'éditeur</x-slot>
  <x-slot:buttons>
    <button class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
    <button type="sumbit" form="deleteForm" class="btn btn-danger" data-bs-dismiss="modal">Confirmer</button>
  </x-slot>
  Êtes-vous sûr de supprimer cet éditeur ?
</x-bootstrap>

<x-datatables id="editors-list" :cols="[ 'Nom', 'Actions' ]" />

<form id="deleteForm" action="" method="POST">
  @method('DELETE')
  @csrf
</form>
@endsection

@push('scripts')
<script type="module">
document.addEventListener('DOMContentLoaded', function() {
  $('#editors-list').DataTable({
      serverSide: true,
      ajax: {
        url: "{{ route('suppliers.editors', $supplier->id) }}"
      },
      columns: [
        { data: "name" },
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