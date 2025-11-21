<table class="table table-striped" id={{ $id }}>
  <thead>
    <tr>
@foreach($cols as $col)
      <th>{{ $col }}</th>
@endforeach
    </tr>
  </thead>
</table>