

@extends('site.app')
@section('title', $category->name)
@section('content')

    <div class="sale-area">
        <div class="">
            <div class="row justify-content-center text-center">
                <div class="col-md-12">
                    <div class="sales-content-02" style="background: url('/assets/img/catbanner2.jpg') no-repeat center center/cover;background-attachment: fixed;">
                        <h2>{{ $category->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
.product-style-03 .thumb  {
    position: relative;
    overflow: hidden;
}
.product-style-03 .thumb:after {
    position: absolute;
    content: '';
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    background: #558a1c12;
}
.product-style-03 .thumb img {
    min-height: 191px;
    padding: 30px;
    -o-object-fit: cover;
    object-fit: cover;
    -webkit-transition: all 3.5s ease 0s;
    -o-transition: all 3.5s ease 0s;
    transition: all 3.5s ease 0s;
}
.product-style-03:hover .thumb img {
    -webkit-transform: scale(1.1);
    -ms-transform: scale(1.1);
    transform: scale(1.1);
}
.margin-bottom-80 {
    margin-bottom: 123px;
}

.widget_about ul li {
    list-style: none;
    width: 36px;
    height: 36px;
background: #558a1c;}

</style>	
<!-- collection area start  -->
    <div class="collection-area margin-top-60">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-sm-3">
                    <dl class="dlist-inline">
					
                        @foreach( $category->attributes as $attribute)
                       
                            <dt>{{ $attribute->name }}: </dt>
                            <dd>
                                <label class="form-control form-control-sm option" style="width:180px;" name="{{ strtolower($attribute->name ) }}"></label>
                                    <label data-price="0" value="0"> Select a {{ $attribute->name }}</label>
                                    @foreach($attribute->values as $attributeValue)
                                        @if ($attributeValue->attribute_id == $attribute->id)
										<div class="form-check">
											  <input class="form-check-input common_selector {{ $attribute->name }}"  type="checkbox" value="{{$attributeValue->value}}"  id="flexCheckDefault">
											  <label class="form-check-label" for="flexCheckDefault">
												{{ $attributeValue->value }}
											  </label>
											</div>
                                        @endif
                                    @endforeach
                            </dd>
                    @endforeach
                    </dl>
                </div>
                <div class="col-9">
                    <div class="tab-content filter_data">
						
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between pagination">
                                <h6>Showing {{$pagproducts->firstItem()}} to {{$pagproducts->lastItem()}} of {{$pagproducts->total()}} products </h6>
                                <ul>
								 {{ $pagproducts->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- collection area end  -->
	
	 <div class="filter_data">

                </div>

@stop
@push('scripts')

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function(){
	
    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
		@foreach( $category->attributes as $attribute)
        var {{$attribute->name}} = get_filter('{{$attribute->name}}');
        @endforeach
        $.ajax({
	url:"{{url("fetch_data")}}/{{ $category->slug }}",
            method:"POST",
			beforeSend: function (xhr) {
            var token = '{{ csrf_token() }}';

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
		
            data:{action:action,@foreach( $category->attributes as $attribute) {{$attribute->name}}:{{$attribute->name}}, @endforeach },
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }
	
    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });


});
</script>
@endpush