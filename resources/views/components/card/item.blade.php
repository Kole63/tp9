<div class="col-md-6 col-lg-3 p-2">
  <div class="card h-100">
    @isset($image)<img src="{{ $image }}" class="card-img-top">@endisset
    <div class="card-body d-flex flex-column">
      <h5 class="card-title"> {{$title}} </h5>
      <p class="card-text"> {{ $slot }} </p>
      @isset($buttons)<div class="mt-auto"> {{ $buttons }} </div>@endisset
    </div>
  </div>
</div>