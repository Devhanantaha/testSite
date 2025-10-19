@if(app()->getLocale() != 'en')
<style>
.breadcrumb-item+.breadcrumb-item::before{
    float : right !important;
  
    padding-left: var(--tblr-breadcrumb-item-padding-x);
    padding-right:0px;
}

</style>
@endif
@unless ($breadcrumbs->isEmpty())
    <nav aria-label="breadcrumb" dir="auto">
        <ol class="breadcrumb">
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb->url && !$loop->last)
                    <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb->title }}</li>
                @endif

            @endforeach
        </ol>
    </nav>
@endunless
