<div id="res">
    <div id="resWrap">
        <table cellpadding="1" cellspacing="1">
            <tr>
                <td>
                    <img src="{{ asset('images/x.gif') }}" class="r1" alt="@lang('resources.lumber')"
                         title="@lang('resources.lumber')"/>
                </td>
                <td id="l4" title="{{ $village->production->get(0) }}">{{ $village->world->getResource(0) }}/{{ $village->world->storage->warehouse }}</td>
                <td>
                    <img src="{{ asset('images/x.gif') }}" class="r2" alt="@lang('resources.clay')"
                         title="@lang('resources.clay')"/>
                </td>
                <td id="l3" title="{{ $village->production->get(1) }}">{{ $village->world->getResource(1) }}/{{ $village->world->storage->warehouse }}</td>
                <td>
                    <img src="{{ asset('images/x.gif') }}" class="r3" alt="@lang('resources.iron')"
                         title="@lang('resources.iron')"/>
                </td>
                <td id="l2" title="{{ $village->production->get(2) }}">{{ $village->world->getResource(2) }}/{{ $village->world->storage->warehouse }}</td>
                <td>
                    <img src="{{ asset('images/x.gif') }}" class="r4" alt="@lang('resources.crop')"
                         title="@lang('resources.crop')"/>
                </td>
                @if ($village->production->get(3) < 0)
                    <td id="l1" title="{{ $village->production->get(3) - $village->getTotalUpkeep() }}">
                        0/{{ $village->world->storage->granary }}
                    </td>
                @else
                    <td id="l1" title="{{ $village->production->get(3) - $village->getTotalUpkeep() }}">{{ $village->world->getResource(3) }}/{{ $village->world->storage->granary }}</td>
                @endif
                <td>
                    <img src="{{ asset('images/x.gif') }}" class="r5" alt="@lang('resources.crop_consumption')"
                         title="@lang('resources.crop_consumption')"/>
                </td>
                <td>{{ $village->getTotalUpkeep() }}/{{ $village->production->get(3) }}</td>
            </tr>
        </table>
    </div>
</div>
