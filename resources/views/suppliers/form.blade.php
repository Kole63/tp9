<form action="{{$action}}" method="post">
  @csrf
  @isset($supplier) @method('PUT') @endisset
  <x-form.input label="Nom" name="name" placeholder="Saisir le nom du fournisseur" value="{{ $supplier->name ?? ''}}"/>
  <x-form.textarea label="Adresse" name="address" value="{{ $supplier->address ?? '' }}" />
  <x-form.buttons>
    <x-form.button type="submit">Valider</x-form.button>
    <x-form.button href="{{ route('suppliers.index') }}" btn="danger">Annuler</x-form.button>
  </x-form.buttons>
</form>