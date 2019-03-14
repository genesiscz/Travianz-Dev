@component('layout.layout')
<form method="post" action="{{ route('login.cookies') }}">
	@method('DELETE')	
	@csrf
   <div id="content" class="logout">
      <h1>@lang('auth/logout.success')</h1>
      <img src="{{ asset('images/manual/tribes/roemer.jpg') }}" width="128" height="156" border="0" align="right"/>
      <p>@lang('auth/logout.thank_you')</p>
      <p>@lang('auth/logout.other_people_warning')</p>
      <p class="btn">
         <button class="trav_buttons" name="action" value="deleteCookies">@lang('auth/logout.delete_cookies')</button>
      </p>
   </div>
</form>
@endcomponent