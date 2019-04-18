<table cellpadding="1" cellspacing="1" id="building_contract">
    <thead>
    <tr>
        <th colspan="4">@lang('village/buildings_queue.building'):
            @if (Auth::user()->gold >= 2)
                <a href="?buildingFinish=1"
                   onclick="return confirm('@lang('village/buildings_queue.finish_all')');"
                   title="@lang('village/buildings_queue.finish_all')">
                    <img class="clock"
                         alt="@lang('village/buildings_queue.finish_all')"
                         src="{{ asset('images/x.gif') }}"/>
                </a>
            @endif
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($village->buildingsQueue() as $buildingQueue)
        <tr>
            <td class="ico">
                <a href="{{ $buildingQueue->id }}">
                    <img src="{{ asset('images/x.gif') }}" class="del" title="@lang('time.cancel')"
                         alt="@lang('time.cancel')"/>
                </a>
            </td>
            @if ($buildingQueue->sort != 2)
                <td>
                    @lang('buildings.' . get_name_from_class($buildingQueue->building) . '.name')
                    (@lang('buildings.level') {{ ++$buildingQueue->building->level }})

                    @if ($buildingQueue->sort == 1)
                        (@lang('village/buildings_queue.waiting_loop'))
                    @endif
                </td>
                <td>@lang('time.in') <span class="timer">{{ $buildingQueue->time_left }}</span> @lang('time.hrs')
                </td>
                <td>@lang('village/buildings_queue.done_at') {{ $buildingQueue->ended_at->toTimeString() }}</td>
            @else
                <td>
                    @lang('buildings.' . get_name_from_class($buildingQueue->building) . '.name') <span
                        class="none">(@lang('buildings.level') {{ ++$buildingQueue->building->level }})</span>
                </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>

<script>
    let bld = [{"stufe": 1, "gid": "1", "aid": "3"}];
</script>
