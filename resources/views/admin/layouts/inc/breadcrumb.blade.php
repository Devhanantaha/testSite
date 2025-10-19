@if( app()->getLocale() == 'ar')
<style>
  .breadcrumb-item+.breadcrumb-item::before {
    float: right;
    padding-left: var(--tblr-breadcrumb-item-padding-x);
}
</style>
@endif

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">{{ __('admin.home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page"> @if(isset($title)) {{ $title }} @endif </li>
  </ol>
</nav>