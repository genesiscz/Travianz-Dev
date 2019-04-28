@component('layout.layout')
    <div id="build" class="gid1"><a href="#" onClick="return Popup(0,4);" class="build_logo">
            <img class="building g1" src="{{ asset('images/x.gif') }}"
                 alt="{{ trans('buildings.' . get_name_from_class($building) . '.name') }}"
                 title="{{ trans('buildings.' . get_name_from_class($building) . '.name') }}"/>
        </a>
        <h1>{{ trans('buildings.' . get_name_from_class($building)  . '.name') }} <span
                    class="level">@lang('buildings.level')  {{ $building->level }}</span>
        </h1>
        <p class="build_desc">{{ trans('buildings.' . get_name_from_class($building)  . '.description') }}</p>
        <table cellpadding="1" cellspacing="1" id="build_value">
            <tr>
                <th>@lang('village/production.current_production'):</th>
                <td><b>{{ $building->bonus * config('server.speed') }}</b> @lang('village/production.per_hour')</td>
            </tr>
            @if(!$building->isAtMaximumLevel()) {
            <tr>
                <th>@lang('village/production.next_production') {{ ++$building->level }}:</th>
                <td><b>{{ $building->bonus * config('server.speed') }}</b> @lang('village/production.per_hour') </td>
            </tr>
            @endif
        </table>
        <?php
        //include("upgrade.tpl");
        ?>
        </p></div>
@endcomponent
