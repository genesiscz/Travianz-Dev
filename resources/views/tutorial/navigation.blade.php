@component('tutorial.layout')
<h2>(5/5) @lang('tutorial/navigation.title')</h2>
<table class="tutorial_table">
   <tbody>
      <tr>
         <td class="visual">
            <img src="{{ asset('images/tutorial/navigation/navi.jpg') }}" />
            @lang('tutorial/navigation.the_navigation_bar')
         </td>
      </tr>
      <tr>
         <td class="beschreibung">
            <ol start="1" type="1">
               <li><b>@lang('tutorial/navigation.overview'):</b> @lang('tutorial/navigation.overview_desc')</li>
               <li><b>@lang('tutorial/navigation.centre'):</b> @lang('tutorial/navigation.centre_desc')</li>
               <li><b>@lang('tutorial/navigation.map'):</b> @lang('tutorial/navigation.map_desc')</li>
               <li><b>@lang('tutorial/navigation.statistics'):</b> @lang('tutorial/navigation.statistics_desc')</li>
               <li><b>@lang('tutorial/navigation.reports'):</b> @lang('tutorial/navigation.reports_desc')</li>
               <li><b>@lang('tutorial/navigation.messages'):</b> @lang('tutorial/navigation.messages_desc')</li>
            </ol>
         </td>
      </tr>
      <tr>
         <td class="beschreibung">
            @lang('tutorial/navigation.you_know_everything', ['serverName' => config('server.name')])
         </td>
      </tr>
   </tbody>
</table>
<table id="tutorial_nav">
   <tbody>
      <tr>
         <td class="nav_prev">
            <a href="{{ route('tutorial.neighbours') }}" title="@lang('tutorial/common.back')">&laquo; @lang('tutorial/common.back')</a>
         </td>
         <td class="nav_next">
            <a href="{{ route('register') }}" title="@lang('tutorial/navigation.to_the_registration')"> &raquo; @lang('tutorial/navigation.to_the_registration')</a>
         </td>
      </tr>
   </tbody>
</table>
</div> 
<div class="clear"></div>
@endcomponent