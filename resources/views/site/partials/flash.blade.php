@if (\Session::has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
                <button class="close" type="button" data-dismiss="alert">×</button>
                <strong>Error!</strong> {{ \Session::get('error') }}
        </div>
@endif

@if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
                <button class="close" type="button" data-dismiss="alert">×</button>
                <strong>success!</strong> {{ \Session::get('success') }}
        </div>
@endif
@if (\Session::has('cartadded'))
        <div class="alert alert-success alert-dismissible" role="alert">
                <button class="close" type="button" data-dismiss="alert">×</button>
                <strong>success!</strong> Product added to Cart .
        </div>
@endif
@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible" role="alert">
        <button class="close" type="button" data-dismiss="alert">×</button>
        <strong class="text-center">Error!</strong>
        <ul>

@foreach ($errors->all() as $error)


 <li> {{ $error }}</li>

      


    @endforeach
</ul>
</div>
 @endif