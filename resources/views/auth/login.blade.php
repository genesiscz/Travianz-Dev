@component('layout.layout')
<div id="content" class="login">
    <h1>
        <img class="img_login" src="{{ asset('images/x.gif') }}" />
    </h1>
    @if (Carbon\Carbon::parse(config('server.start_date') . ' ' . config('server.start_time'))->greaterThanOrEqualTo(Carbon\Carbon::now()))

    <p style="text-align: center">
        <font color="red" size="6">@lang('auth/login.server_not_started_yet')</font>
    </p>

    @else

    <h5>
        <img class="img_u04" src="{{ asset('images/x.gif') }}" />
    </h5>
    <p>@lang('auth/login.cookies')</p>

    @if (Carbon\Carbon::parse(config('server.start_date') . ' ' . config('server.start_time'))->greaterThanOrEqualTo(Carbon\Carbon::now()))

    <br />
    <div style="text-align: center; font-size: 25px">{{ config('server.name') }} @lang('auth/login.will_start_in'):</div>
    <div class="timer" id="activation_time">{$serverInfo->getDataStartTime()}</div>

    @else

    <form method="post" action="login">
        <script>
            Element.implement({
                //imgid: if an arrow belongs to the link this can be "opened"               
                showOrHide: function(imgid) {
                    //insert
                    if (this.getStyle('display') == 'none') {
                        if (imgid != '') $(imgid).className = 'open';
                    }
                    //hide
                    else if (imgid != '') $(imgid).className = 'close';
                    this.toggleClass('hide');
                }
            });
        </script>
        <table id="login_form">
            <tbody>
                <tr class="top">
                    <th>@lang('auth/login.username'):</th>
                    <td>
                        <input class="text" type="text" name="username" pattern=".{6,30}" value="{{ old('username', Cookie::get('username')) }}" required />
                        @if ($errors->has('username'))
                        <span class="error">{{ $errors->first('username') }}</span></td>
                    @endif
                </tr>
                <tr class="btm">
                    <th>@lang('auth/login.password'):</th>
                    <td>
                        <input class="text" type="password" name="password" pattern=".{6,100}" value="{{ old('password') }}" required />
                        @if ($errors->has('password'))
                        <span class="error">{{ $errors->first('password') }}</span></td>
                    @endif
                    </td>
                </tr>
            </tbody>
        </table>

        <p class="btn">
            <button value="login" name="action" onclick="xy();" id="btn_login" class="trav_buttons">@lang('auth/login.title')</button>
        </p>
    </form>

    @endif
    @endif

    @if ($errors->has('email'))

    <p class="error_box">
        <span class="error">{{ $errors->first('email') }}</span>
        <br>@lang('auth/login.email_follow')
        <br>
        <a href="{{ route('verification') . DIRECTORY_SEPARATOR . old('username') }}">@lang('auth/login.verify_email')</a>
    </p>

    @elseif ($errors->has('vacation'))

    <p class="error_box">
        <span class="error">{{ $errors->first('vacation') }}</span>
    </p>

    @elseif ($errors->has('password') && old('password') != '' && old('username') != '')
    <p class="error_box">
        <span class="error">@lang('auth/login.password_forgotten')</span>
        <br>@lang('auth/login.password_request')
        <br>
        <a href="password">@lang('auth/login.password_generate')</a>
    </p>

    @endif
</div>
@endcomponent 