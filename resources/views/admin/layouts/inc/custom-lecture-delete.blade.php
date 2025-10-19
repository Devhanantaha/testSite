
<!-- Delete modal content -->
<div id="deleteModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
       
            <form action="{{ route($route.'.destroy', [$level->id,$row->id]) }}" method="post" class="delete-form">
            @csrf
                @method('DELETE')
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-status bg-danger"></div>
          <div class="modal-body text-center py-4">
            <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg>
            <h3>{{ __('admin.modal_are_you_sure') }} </h3>
            <div class="text-secondary">
  {{ __('admin.delete_model_msg')}}
          </div>
            <input type="hidden" value="{{$row->id}}" name="id">
 
        </div>
          <div class="modal-footer">
            <div class="w-100">
              <div class="row">
              <div class="col-3">
              </div>
                <div class="col-3">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('admin.btn_close') }}</button>
             </div>
                <div class="col-3">
                <button type="submit" class="btn btn-danger">{{ __('admin.btn_confirm') }}</button>

                </div>
              </div>
            </div>
          </div>
        </form>
        
          
       
        </div>
    </div>
</div>

