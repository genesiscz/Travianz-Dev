@component('installation.layout')
<p>
<div style="text-align: center">
   <h4>@lang('installation/finish.thanks_for_installing.title')</h4>
</div>
@lang('installation/finish.thanks_for_installing.description')
</p>
<div style="text-align: center">
	<a href="{{ route('index') }}"><font size="4"> My {{ config('server.name') }} homepage </font></a>
</div>
@endcomponent