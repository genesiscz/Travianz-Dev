@component('tutorial.layout')
<h2>(1/5) @lang('tutorial/village.title')</h2>
<table class="tutorial_table">
   <tbody>
      <tr>
         <td class="visual">
            <img src="{{ asset('images/tutorial/village/dorf_klein.jpg') }}" />
            @lang('tutorial/village.start')
         </td>
         <td class="visual">
            <img src="{{ asset('images/tutorial/village/dorf_gross.jpg') }}" />
            @lang('tutorial/village.arrive')
         </td>
      </tr>
      <tr>
         <td class="beschreibung" colspan="2">
            @lang('tutorial/village.beginning')
            <br /><br />
            @lang('tutorial/village.expand')
         </td>
      </tr>
   </tbody>
</table>
<table id="tutorial_nav">
   <tbody>
      <tr>
         <td class="nav_prev">
            <a href="{{ route('index') }}" title="@lang('tutorial/common.back')">&laquo; @lang('tutorial/common.back')</a>
         </td>
         <td class="nav_next">
            <a href="{{ route('tutorial.resources') }}" title="@lang('tutorial/common.forward')">@lang('tutorial/common.forward') &raquo;</a>
         </td>
      </tr>
   </tbody>
</table>
</div> 
<div class="clear"></div>
@endcomponent