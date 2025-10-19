@if(app()->getLocale() == 'en')
        <li style="padding: 14px;">
          <a href="{{ url('language/ar') }}"><i class="fa fa-language"></i> AR</a>
        </li>
        @else
        <li style="padding: 14px;">
          <a href="{{ url('language/en') }}"><i class="fa fa-language"></i> EN</a>
        </li>
        @endif