<div class="modal fade" id="{{  $id  }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $titleModal }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{  $slot  }}
            </div>
            <div class="modal-footer">
                <div class="d-flex w-100">
                    <button type="submit" id="{{  $idModalBtnSubmit  }}"
                    class="btn btn-primary btn-sm w-100">{{  $btnText ?? 'Save'  }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
