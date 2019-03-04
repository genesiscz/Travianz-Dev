@component('tutorial.layout')
<h2>(2/5) @lang('tutorial/resources.title')</h2>
<table class="tutorial_table">
   <tbody>
      <tr>
         <td class="visual">
            <img src="{{ asset('images/tutorial/resources/rohstofffeld.gif') }}" />
            @lang('tutorial/resources.choose_field')
         </td>
         <td class="visual">
            <img src="{{ asset('images/tutorial/resources/rohstofffeld2.gif') }}" />
            @lang('tutorial/resources.extend_field')
         </td>
      </tr>
      <tr>
         <td class="beschreibung" colspan="2">
            @lang('tutorial/resources.types_of_resources')
            <br /><br />
            @lang('tutorial/resources.expand_village')
         </td>
      </tr>
   </tbody>
</table>
<table id="tutorial_nav">
   <tbody>
      <tr>
         <td class="nav_prev">
            <a href="{{ route('tutorial.village') }}" title="@lang('tutorial/common.back')">&laquo; @lang('tutorial/common.back')</a>
         </td>
         <td class="nav_next">
            <a href="{{ route('tutorial.buildings') }}" title="@lang('tutorial/common.forward')">@lang('tutorial/common.forward') &raquo;</a>
         </td>
      </tr>
   </tbody>
</table>
</div> 
<div class="clear"></div>
@endcomponent