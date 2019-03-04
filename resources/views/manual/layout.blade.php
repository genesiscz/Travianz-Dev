@component('index.layout')
<h1>@lang('index.manual')</h1>
<p class="submenu">
   <a href="{{ route('manual.tribes') }}">@lang('manual/menu.the_tribes')</a> |
   <a href="{{ route('manual.buildings') }}">@lang('manual/menu.the_buildings')</a> |
   <a href="{{ route('manual.FAQ') }}">@lang('manual/menu.FAQ')</a>
</p>
{{ $slot }}
@endcomponent