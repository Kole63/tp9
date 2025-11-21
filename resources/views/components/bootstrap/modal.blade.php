<div class="modal fade" id="{{ $id }}" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="{{ $id }}_title"> {{ $title }} </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="{{ $id }}_body">
            {{ $slot }}
          </div>
          <div class="modal-footer">
            {{ $buttons }}
          </div>
        </div>
      </div>
    </div>