@component('tutorial.layout')
<h2>(4/5) @lang('tutorial/neighbours.title')</h2>
<table class="tutorial_table">
   <tbody>
      <tr>
         <td class="visual">
            <img src="{{ asset('images/tutorial/neighbours/karte.jpg') }}" />
            @lang('tutorial/neighbours.your_neighbours')
         </td>
      </tr>
      <tr>
         <td class="beschreibung">
            @lang('tutorial/neighbours.not_alone', ['serverName' => config('server.name')])
            <br><br>
            @lang('tutorial/neighbours.player_surrounding')
         </td>
      </tr>
   </tbody>
</table>
<table id="tutorial_nav">
   <tbody>
      <tr>
         <td class="nav_prev">
            <a href="{{ route('tutorial.buildings') }}" title="@lang('tutorial/common.back')">&laquo; @lang('tutorial/common.back')</a>
         </td>
         <td class="nav_next">
            <a href="{{ route('tutorial.navigation') }}" title="@lang('tutorial/common.forward')">@lang('tutorial/common.forward') &raquo;</a>
         </td>
      </tr>
   </tbody>
</table>
</div> 
<div class="clear"></div>
@endcomponent