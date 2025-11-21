<form action="{{$action}}" method="post" enctype="multipart/form-data">
  @csrf
  @isset($item) @method('PUT') @endisset
  <x-form.input label="Intitulé" name="title" value="{{ $item->title ?? '' }}" placeholder="Saisir l'intitulé de l'article" autofocus/>
  <x-form.textarea label="Description" name="description" value="{{ $item->description ?? '' }}" rows="3" placeholder="Saisir la description de l'article"/>
  <x-form.input label="Prix" name="price" value="{{ $item->price ?? '' }}" placeholder="Saisir le prix de l'article" />
  <x-form.image label="Image" name="image" placeholder="Sélectionnez une image" size="400" />
  <x-form.select label="Fournisseur" name="supplier_id" value="{{ $item->supplier_id ?? -1 }}" :default="[ 'id' => -1, 'title' => 'Sélectionnez un fournisseur' ]" :data="$supplierlst" key="id" title="name" /> 
  <x-form.multiselect label="Catégorie(s)" name="categories" :default="[ 'id' => -1, 'title' => 'Sélectionnez une catégorie' ]" :data="$categorylst" :values="$item->categories ?? null" key="id" title="title" />
  <x-form.buttons>
    <x-form.button type="submit">Valider</x-form.button>
    <x-form.button href="{{ route('items.index') }}" btn="danger">Annuler</x-form.button>
  </x-form.buttons>
</form>