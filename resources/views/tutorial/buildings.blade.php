@component('tutorial.layout')
<h2>(3/5) @lang('tutorial/buildings.title')</h2>
<table class="tutorial_table">
   <tbody>
      <tr>
         <td class="visual">
            <img src="{{ asset('images/tutorial/buildings/dorfzentrum1.gif') }}" />
            @lang('tutorial/buildings.choose_building')
         </td>
         <td class="visual">
            <img src="{{ asset('images/tutorial/buildings/dorfzentrum2.gif') }}" />
            @lang('tutorial/buildings.construct_building')
         </td>
      </tr>
      <tr>
         <td class="beschreibung" colspan="2">
            @lang('tutorial/buildings.start_expansion')
            <br /><br />
            @lang('tutorial/buildings.store_resources')
         </td>
      </tr>
   </tbody>
</table>
<table id="tutorial_nav">
   <tbody>
      <tr>
         <td class="nav_prev">
            <a href="{{ route('tutorial.resources') }}" title="@lang('tutorial/common.back')">&laquo; @lang('tutorial/common.back')</a>
         </td>
         <td class="nav_next">
            <a href="{{ route('tutorial.neighbours') }}" title="@lang('tutorial/common.forward')">@lang('tutorial/common.forward') &raquo;</a>
         </td>
      </tr>
   </tbody>
</table>
</div> 
<div class="clear"></div>
@endcomponent