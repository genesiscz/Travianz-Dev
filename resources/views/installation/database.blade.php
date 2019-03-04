@component('installation.layout')
<form action="{{ route('installation.database') }}" method="post">
	@csrf
   <p>
      <span class="f10 c">@lang('installation/database.title')</span>
   <table>
      <tr>
         <td>
            <b>@lang('installation/database.warning')</b>: @lang('installation/database.description')
            <br /><br />
         </td>
      </tr>
      <tr>
         <td>
            <div style="text-align: center">
               <button id="btn_train" class="trav_buttons" value="store" name="action" onclick="setTimeout('this.disabled=true', 1);"> @lang('installation/database.create') </button>
               <br /><br />
            </div>
         </td>
      </tr>
   </table>
</form>
@endcomponent