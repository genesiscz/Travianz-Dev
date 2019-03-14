<div id="res">
    <div id="resWrap">
        <table cellpadding="1" cellspacing="1">
            <tr>
                <td>
                    <img src="{{ asset('images/x.gif') }}" class="r1" alt="@lang('resources.lumber')"
                         title="@lang('resources.lumber')"/>
                </td>
                <td id="l4" title="{{ 0 }}">{{ 0 . '/' . $village->world->storage->warehouse }}</td>
                <td>
                    <img src="{{ asset('images/x.gif') }}" class="r2" alt="@lang('resources.clay')"
                         title="@lang('resources.clay')"/>
                </td>
                <td id="l3" title="{{ 0 }}">{{ 0 . '/' . $village->world->storage->warehouse }}</td>
                <td>
                    <img src="{{ asset('images/x.gif') }}" class="r3" alt="@lang('resources.iron')"
                         title="@lang('resources.iron')"/>
                </td>
                <td id="l2" title="{{ 0 }}">{{ 0 . '/' . $village->world->storage->warehouse }}</td>
                <td>
                    <img src="{{ asset('images/x.gif') }}" class="r4" alt="@lang('resources.crop')"
                         title="@lang('resources.crop')"/>
                </td>
                @if (false)
                    <td id="l1" title="{{ 0 }}">
                        {{ 0 . '/' . $village->world->storage->granary }}
                    </td>
                @else
                    <td title="{{ 0 }}">{{ 0 . '/' . $village->world->storage->granary }}</td>
                @endif
                <td>
                    <img src="{{ asset('images/x.gif') }}" class="r5" alt="@lang('resources.crop_consumption')"
                         title="@lang('resources.crop_consumption')"/>
                </td>
                <td>{{ 'crop consumption' . '/' . 'crop' }}</td>
            </tr>
        </table>
    </div>
</div>
