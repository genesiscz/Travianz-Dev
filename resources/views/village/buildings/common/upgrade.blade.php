@php $building->level++ @endphp
<p id="contract">@lang('village/building_upgrade.costs_for_upgrading_to_level', ['b' => '<b>', '_b' => '</b>']) {{ $building->level }}
    :<br/>
    <img class="r1" src="{{ asset('images/x.gif') }}" alt="@lang('resources.lumber')"
         title="@lang('resources.lumber')"/><span
        class="little_res">{{ $building->needed_resources->get(0) }}</span> |
    <img class="r2" src="{{ asset('images/x.gif') }}" alt="@lang('resources.clay')"
         title="@lang('resources.clay')"/><span
        class="little_res">{{ $building->needed_resources->get(1) }}</span> |
    <img class="r3" src="{{ asset('images/x.gif') }}" alt="@lang('resources.iron')"
         title="@lang('resources.iron')"/><span
        class="little_res">{{ $building->needed_resources->get(2) }}</span> |
    <img class="r4" src="{{ asset('images/x.gif') }}" alt="@lang('resources.crop')"
         title="@lang('resources.crop')"/><span
        class="little_res">{{ $building->needed_resources->get(3) }}</span> |
    <img class="r5" src="{{ asset('images/x.gif') }}" alt="@lang('resources.crop_consumption')"
         title="@lang('resources.crop_consumption')"/>
    {{ $building->actual_population }} |
    <img class="clock" src="{{ asset('images/x.gif') }}" alt="@lang('resources.duration')"
         title="@lang('resources.duration')"/>
    {{ seconds_to_time_string(round($building->needed_time / config('server.speed'))) }}

    @if(Auth::user()->gold >= 3)
        | <a href="aaaa">
            <img class="npc" src="{{ asset('images/x.gif') }}" alt="@lang('village/building_upgrade.npc_trade')"
                 title="@lang('village/building_upgrade.npc_trade')"/>
        </a>
    @endif

    <br/>
    @if($village->hasBuildingInQueue($building, \App\Game\Buildings\Queues\Demolition::class))
        <span class="none">@lang('village/building_upgrade.errors.presently_being_demolished')</span>
    @elseif ($building->isAtMaximumLevel($village->isCapital()))
        @if ($village->hasBuildingInQueue($building, \App\Game\Buildings\Queues\Normal::class) ||
             $village->hasBuildingInQueue($building, \App\Game\Buildings\Queues\WaitingLoop::class) ||
             $village->hasBuildingInQueue($building, \App\Game\Buildings\Queues\MasterBuilder::class)
        )
            <span class="none">@lang('village/building_upgrade.errors.max_level_under_construction')</span>
        @else
            <span class="none">@lang('village/building_upgrade.errors.already_at_max_level')</span>
        @endif
    @elseif(true)
        <span class="none">@lang('village/building_upgrade.errors.workers_already_at_work').</span>
    @elseif(true)
        <span class="none">@lang('village/building_upgrade.errors.workers_already_at_work') (@lang('village/buildings_queue.waiting_loop')).</span>
    @elseif (!$village->getStorage(\App\Game\Buildings\Warehouse::class) > $building->needed_resources->slice(0, 3)->max())
        <span class="none">@lang('village/building_upgrade.errors.upgrade_warehouse')</span>
    @elseif (!$village->getStorage(\App\Game\Buildings\Granary::class) > $building->needed_resources->get(3))
        <span class="none">@lang('village/building_upgrade.errors.upgrade_granary')</span>
    @elseif(!($building instanceof \App\Game\Buildings\Cropland &&
            $village->total_production->get(\App\Game\Resources\Crop::class) - $village->getTotalUpkeep() - $building->actual_population <= 0)
        )
        <span class="none">@lang('village/building_upgrade.errors.not_enough_food') @lang('village/building_upgrade.errors.expand_cropland')</span>
    @elseif(true)
        <a class="build" href="{{ '' }}">
            @lang('village/building_upgrade.upgrade_to_level') {{ $building->level }}.
        </a>
    @elseif (Auth::user()->gold >= 1)
        <a class="build" href="{{ '' }}">@lang('village/building_upgrade.construct_with_master_builder')</a>
        <font color="#B3B3B3">(@lang('golds.costs'):<img src="{{ asset('images/plus/gold.gif') }}"
                                                         alt="@lang('golds.gold')"
                                                         title="@lang('golds.gold')"/>1)</font>
    @endif
</p>
