
<!-- Delete modal content -->
@if($row->status == 0)
<div id="changeStatusModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="changeStatusModalLabel" aria-hidden="true">
@else 
<div  id="changeStatusModal-{{ $row->id }}" class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">

@endif
<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
        <form action="{{ url($route.'/status', [$row->id]) }}" method="GET" class="delete-form">
                @csrf
                @method('GET')
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-status bg-success"></div>
          <div class="modal-body text-center py-4">
            <!-- Download SVG icon from http://tabler-icons.io/i/circle-check -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M9 12l2 2l4 -4" /></svg>
            <h3>تأكيد التفعيل</h3>
            <div class="text-secondary">
               هل انت متاكد من تاكيد التفعيل؟
            </div>
          </div>
          <input type="hidden" value="{{$row->id}}" name="id">
          <div class="modal-footer">
            <div class="w-100">
              <div class="row">
              <div class="col-3">
              </div>
                <div class="col-3">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('btn_close') }}</button>
             </div>
                <div class="col-3">
                <button type="submit" class="btn btn-danger">تأكيد</button>

                </div>
              </div>
            </div>
          </div>
        
</form>  </div>
    </div>
</div>

