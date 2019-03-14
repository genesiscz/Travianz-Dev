<h5><img src="{{ asset('images/newsboxes/newsbox2.gif') }}"
        alt="@lang('installation/config.newsboxes_options.newsbox') 2"></h5>
<div class="news">
    <table>
        <tr>
            <td>
                <b>
                    @lang('newsboxes/newsbox2.artefacts')
                </b>
            </td>
            <td>
                <b>:
                    <font color="Red">
                        @if (Carbon\Carbon::parse(config('server.natars.artefacts_release_date') . ' ' . config('server.natars.artefacts_release_time')) >= now())
                            {{ Carbon\Carbon::parse(config('server.natars.artefacts_release_date') . ' ' . config('server.natars.artefacts_release_time'))->toDateTimeString() }}
                        @else
                            @lang('newsboxes/newsbox2.released')
                        @endif
                    </font>
                </b>
            </td>
        </tr>
        <tr>
            <td>
                <b>
                    @lang('newsboxes/newsbox2.world_wonders')
                </b>
            </td>
            <td>
                <b>:
                    <font color="Red">
                        @if (Carbon\Carbon::parse(config('server.natars.ww_release_date') . ' ' . config('server.natars.ww_release_time')) >= now())
                            {{ Carbon\Carbon::parse(config('server.natars.ww_release_date') . ' ' . config('server.natars.ww_release_time'))->toDateTimeString() }}
                        @else
                            @lang('newsboxes/newsbox2.released')
                        @endif
                    </font>
                </b>
            </td>
        </tr>
        <tr>
            <td>
                <b>
                    @lang('newsboxes/newsbox2.building_plans')
                </b>
            </td>
            <td>
                <b>:
                    <font color="Red">
                        @if (Carbon\Carbon::parse(config('server.natars.building_plans_release_date') . ' ' . config('server.natars.building_plans_release_time')) >= now())
                            {{ Carbon\Carbon::parse(config('server.natars.building_plans_release_date') . ' ' . config('server.natars.building_plans_release_time'))->toDateTimeString() }}
                        @else
                            @lang('newsboxes/newsbox2.released')
                        @endif
                    </font>
                </b>
            </td>
        </tr>
    </table>
</div>