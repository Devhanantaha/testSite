<!-- Delete modal content -->
@if($row->status == 0)
<div id="changeStatusModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="changeStatusModalLabel" aria-hidden="true">
  @else
  <div id="changeStatusModal-{{ $row->id }}" class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
    @endif
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="{{ url('admin/user-status', [$row->id]) }}" method="GET" class="delete-form">
          @csrf
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          @if($row->status == 0)

          <div class="modal-status bg-success"></div>
          @else
          <div class="modal-status bg-danger"></div>
          @endif

          <div class="modal-body text-center py-4">
            @if($row->status == 0)
            <!-- Download SVG icon from http://tabler-icons.io/i/circle-check -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
              <path d="M9 12l2 2l4 -4" />
            </svg>
            <h3>{{ __('admin.modal.active_confirm_title')}} </h3>
            <div class="text-secondary">
              {{ __('admin.modal.active_confirm_msg')}}
            </div>
            @else
            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
              <path d="M12 9v4" />
              <path d="M12 17h.01" />
            </svg>
            <h3> {{ __('admin.modal.inactive_confirm_title')}} </h3>
            <div class="text-secondary">
              {{ __('admin.modal.inactive_confirm_msg')}}
            </div>
            @endif
          </div>
          <input type="hidden" value="{{$row->id}}" name="id">
          <div class="modal-footer">
            <div class="w-100">
              <div class="row">
              <div class="col-3">
              </div>
                <div class="col-3">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('admin.btn_close') }}</button>

                </div>

                <div class="col-3">

                  <button type="submit" class="btn btn-danger">{{ __('admin.btn_confirm')}} </button>
                </div>
              </div>
            </div>
          </div>
      </div>

      </form>
    </div>
  </div>
</div>