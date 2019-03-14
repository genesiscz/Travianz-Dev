@component('installation.layout')
<br />
<div style="text-align: center">
	<h4>&nbsp;&nbsp;@lang('installation/greetings.disclaimer.title')</h4>
</div>
<ul>
   <li>@lang('installation/greetings.disclaimer.list.1')</li>
   <li>@lang('installation/greetings.disclaimer.list.2')</li>
   <li>@lang('installation/greetings.disclaimer.list.3')</li>
   <li>@lang('installation/greetings.disclaimer.list.4')</li>
   <li>@lang('installation/greetings.disclaimer.list.5')</li>
   <li><b>@lang('installation/greetings.disclaimer.list.6')</b></li>
   <li>@lang('installation/greetings.disclaimer.list.7')</li>
</ul>
<br />
<div class="lbox">
   <font color="red"><b>@lang('installation/greetings.team')</b></font>
</div>
<br />
<div style="text-align: center">
   <button id="btn_train" class="trav_buttons" onclick="location.href='{{ route('installation.config.index') }}'"> @lang('installation/greetings.start') </button>
</div>
@endcomponent