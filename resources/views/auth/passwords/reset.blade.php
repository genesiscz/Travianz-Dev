@component('layout.layout')
<div id="content" class="activate">
   <h1><img src="{{ asset('images/x.gif') }}" class="passwort" alt="@lang('auth/passwords/reset.new_password')" /></h1>
   <h5><img src="{{ asset('images/x.gif') }}" class="img_u22" alt="@lang('auth/passwords/reset.forgotten_password')"/></h5>
   <p>@lang('auth/passwords/reset.choose')</p>
   <div id="activation">
      <form method="post" action="{{ route('password.update') }}">
      	<input type="hidden" name="token" value="{{ $token }}"/>
         @csrf
         <table id="sign_input">
            <tbody>
               <tr>
                  <th>@lang('auth/passwords/reset.email'):</th>
                  <td>
                     <input class="text" type="email" name="email" pattern=".{6,100}" value="{{ old('email') }}" required />
                     @if ($errors->has('email'))
                     <span class="error">{{ $errors->first('email') }}</span>
                  </td>
                  @endif
               </tr>
               <tr>
                  <th>@lang('auth/passwords/reset.password'):</th>
                  <td>
                     <input class="text" type="password" name="password" pattern=".{8,100}" value="{{ old('password') }}" required />
                     @if ($errors->has('password'))
                     <span class="error">{{ $errors->first('password') }}</span>
                  </td>
                  @endif
               </tr>
               <tr>
                  <th>@lang('auth/passwords/reset.confirm_password'):</th>
                  <td>
                     <input class="text" type="password" name="password_confirmation" pattern=".{8,100}" value="{{ old('password_confirmation') }}" required />
                     @if ($errors->has('password_confirmation'))
                     <span class="error">{{ $errors->first('password_confirmation') }}</span>
                  </td>
                  @endif
               </tr>
            </tbody>
         </table>
         <p class="center">
            <button class="trav_buttons" name="action"  value="activate"> @lang('auth/passwords/reset.save') </button>
         </p>
      </form>

      @if ($errors->has('token'))
   	<p class="error_box">
      	<span class="error">{{ $errors->first('token') }}</span>
   	</p>
   	@endif

   </div>
</div>
@endcomponent
