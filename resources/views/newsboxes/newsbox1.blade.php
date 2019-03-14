<h5><img src="{{ asset('images/newsboxes/newsbox1.gif') }}"
        alt="@lang('installation/config.newsboxes_options.newsbox') 1"></h5>
<div class="news">
    <table>
        <tr>
            <td><b>@lang('newsboxes/newsbox1.server_speed')</b></td>
            <td><b>: <font color="Red">{{ config('server.speed') }}x</font></b></td>
        </tr>
        <tr>
            <td><b>@lang('newsboxes/newsbox1.troops_speed')</b></td>
            <td><b>: <font color="Red">{{ config('server.troops_speed') }}x</font></b></td>
        </tr>
        <tr>
            <td><b>@lang('newsboxes/newsbox1.evasion_speed')</b></td>
            <td><b>: <font color="Red">{{ config('server.evasion_speed') }}</font></b></td>
        </tr>
        <tr>
            <td><b>@lang('newsboxes/newsbox1.map_size')</b></td>
            <td><b>: <font color="Red">{{ config('server.world_size') }}x{{ config('server.world_size') }}</font></b>
            </td>
        </tr>
        <tr>
            <td><b>@lang('newsboxes/newsbox1.village_expansion')</b></td>
            <td><b>: <font color="Red">{{ config('server.village_expansion') ? 'Slow' : 'Fast'}}</font></b></td>
        </tr>
        <tr>
            <td><b>@lang('newsboxes/newsbox1.beginners_protection')</b></td>
            <td><b>: <font color="Red">{{ config('server.beginners_protection') }} hrs</font></b></td>
        </tr>
        <tr>
            <td><b>@lang('newsboxes/newsbox1.beginners_protection')</b></td>
            <td><b>: <font color="Red">{{ config('server.medals_interval') }} hrs</font></b></td>
        </tr>
        <tr>
            <td><b>@lang('newsboxes/newsbox1.server_start')</b></td>
            <td><b>: <font color="Red">{{ config('server.start_date') . ' ' . config('server.start_time') }}</font></b>
            </td>
        </tr>
        <tr>
            <td><b>@lang('newsboxes/newsbox1.peace_type')</b></td>
            <td><b>: <font color="Red">{{ $peace_type[config('server.peace_type')] }}</font></b></td>
        </tr>
    </table>
</div>