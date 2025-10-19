@section('main')
<iframe style=" width: 100%;height: 1200px;" src="https://accept.paymob.com/api/acceptance/iframes/114852?payment_token={{ $payment_key['token'] }}" frameborder="0"></iframe>
@stop