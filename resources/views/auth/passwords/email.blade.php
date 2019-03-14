@component('layout.layout')
<div id="content" class="activate">
   <h1><img src="{{ asset('images/x.gif') }}" class="passwort" alt="@lang('auth/passwords/email.new_password')" /></h1>
   <h5><img src="{{ asset('images/x.gif') }}" class="img_u22" alt="@lang('auth/passwords/email.forgotten_password')"/></h5>
   
   @if (now() >= Carbon\Carbon::parse(config('server.start_date') . ' ' .  config('server.start_time')))

   <p>@lang('auth/passwords/email.reset_password')</p>
   <p>@lang('auth/passwords/email.spam_folder')</p>
   <div id="activation">
      <form method="post" action="{{ route('password.email') }}">
         @csrf
         <table id="sign_input">
            <tbody>
               <tr>
                  <th>@lang('auth/passwords/email.email'):</th>
                  <td>
                     <input class="text" type="email" name="email" pattern=".{6,100}" value="{{ old('email') }}" required />
                     @if ($errors->has('email'))
                     <span class="error">{{ $errors->first('email') }}</span>
                  </td>
                  @endif
               </tr>
            </tbody>
         </table>
         <p class="center">
            <button class="trav_buttons" name="action"  value="activate"> @lang('auth/passwords/email.send') </button>
         </p>
      </form>
   </div>

   @else

   <br/>
   <div style="text-align: center">
      <big>@lang('auth/passwords/email.available'): </big>
   </div>
   <div class="timer" id="activation_time">{{ $serverStartCountdown }}</div>

   @endif

</div>
@endcomponent