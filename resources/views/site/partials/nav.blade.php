<nav class="primary-menu">
	<ul class="menu-container">
		<li class="menu-item">
			<a class="menu-link" href="{{ url('/') }}">
				<div>{{ __('site.home') }}</div>
			</a>
		</li>
		<li class="menu-item">
			<a style="padding:8px 8px;" class="menu-link" href="#">
				<div> {{ __('site.appname') }}</div>
			</a>
			<ul class="sub-menu-container">







				<li class="menu-item">
					<a style="padding:8px 8px;" class="menu-link" href="{{ url('/about-us/') }}">
						<div>{{ __('site.about_us') }}</div>
					</a>
				</li>


				<li class="menu-item">
					<a style="padding:8px 8px;" class="menu-link" href="{{ url('/events') }}">
						<div>{{ __('site.events') }}</div>
					</a>
				</li>
				<li class="menu-item">
					<a style="padding:8px 8px;" class="menu-link" href="{{ url('/apply/') }}">
						<div>{{ __('site.apply') }}</div>
					</a>
				</li>
				<li class="menu-item">
					<a style="padding:8px 8px;" class="menu-link" href="{{ url('contact/') }}">
						<div>{{ __('site.contact') }}</div>
					</a>
				</li>
			</ul>
		</li>



		<li class="menu-item">
			<a style="padding:8px 8px;" class="menu-link" href="{{  url('/projects/') }}">
				<div>{{ __('site.projects') }}</div>
			</a>
		</li>

		<li class="menu-item">
			<a style="padding:8px 8px;" class="menu-link" href="{{ url('/where-we-work/') }}">
				<div>{{ __('site.where') }}</div>
			</a>
			<ul class="sub-menu-container">
				<li class="menu-item">
					<a style="padding:8px 8px;" class="menu-link" href="{{ url('/where-we-work/') }}">
						<div> {{ __('site.allphases') }}</div>
					</a>
				</li>
				@foreach ($levels as $phase)
				<li class="menu-item">
					<a class="menu-link" href="{{ url('/where-we-work/'.$phase->id .'/') }}">
						<div>{{ $phase->name }}</div>
					</a>
				</li>
				@endforeach


			</ul>
		</li>
		<li class="menu-item">
			<a style="padding:8px 8px;" class="menu-link" href="#">
				<div>{{ __('site.areawork') }}</div>
			</a>
			<ul class="sub-menu-container">

				<li class="menu-item">
					@foreach ($fields as $field )
					<a class="menu-link" href="t">
						{{ $field->title  }}
					</a>
					@endforeach


				</li>





			</ul>
		</li>
		<li class="menu-item">
			<a style="padding:8px 8px;" class="menu-link" href="#">
				<div>{{ __('site.resources') }}</div>
			</a>
			<ul class="sub-menu-container">

				<li class="menu-item">
					<a class="menu-link" href="{{ url('/videos/' ) }}">
						<div>{{ __('site.vid') }}</div>
					</a>
				</li>
				<li class="menu-item">
					<a class="menu-link" href="{{ url('/downloads/' ) }}">
						<div>{{ __('site.downloadcenter') }}</div>
					</a>
				</li>

			</ul>
		</li>
		<li class="menu-item">
			@php
			$currentLocale = app()->getLocale();
			$otherLocale = $currentLocale === 'en' ? 'ar' : 'en';
			$otherLangName = $otherLocale === 'en' ? 'En' : 'Ar';
			@endphp

			<a
				class="menu-link"
				href="{{ LaravelLocalization::getLocalizedURL($otherLocale, null, [], true) }}"
				style="padding: 0 10px;">
				{{ $otherLangName }}
			</a>
		</li>





	</ul>
</nav>
<!-- /.navbar -->