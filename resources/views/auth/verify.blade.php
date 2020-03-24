@component('layout.layout')
<div id="content" class="login">
	<h1>@lang('auth/verify.email_verification')</h1>

   @if (now() >= Carbon\Carbon::parse(config('server.start_date') . ' ' .  config('server.start_time')))

   <p>@lang('auth/verify.resend_email')</p>
   <p>@lang('auth/verify.spam_folder')</p>
   <div id="activation">
      <form method="post" action="{{ route('verification.resend') }}">
         @csrf
         <table id="sign_input">
            <tbody>
               <tr>
                  <th>@lang('auth/verify.email'):</th>
                  <td>
                     {{URL::signedRoute('verification.verify', ['id' => 4])}}
                     <input class="text" type="email" name="email" pattern=".{6,100}" value="{{ old('email') }}" required />
                     @if ($errors->has('email'))
                     <span class="error">{{ $errors->first('email') }}</span>
                  </td>
                  @endif
               </tr>
            </tbody>
         </table>
         <p class="center">
            <button class="trav_buttons" name="action"  value="activate"> @lang('auth/verify.send') </button>
         </p>
      </form>
   </div>

   @if (session('resent'))
   <p class="error_box">
      <span class="success">@lang('auth/verify.email_sent')</span>
   </p>
   @endif

   @else

   <br/>
   <div style="text-align: center">
      <big>@lang('auth/verify.available'): </big>
   </div>
   <div class="timer" id="activation_time">{{ $serverStartCountdown }}</div>

   @endif

</div>
@endcomponent
