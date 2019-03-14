@component('layout.layout', compact('village'))
    <div id="content" class="village1">
        <h1>
            {{ $village->name }}
            @if ($village->world->loyalty->value < 100)
                <div id="loyalty"
                     class="{{ $village->world->loyalty->value > 33 ? 'gr' : 're' }}">@lang('village/fields.loyalty')
                    : {{ $village->world->loyalty->value }}%
                </div>
            @endif
        </h1>
        <div id="cap" align="left">
            @if ($village->capital)
                <font color="gray">(@lang('village/fields.capital'))</font>
            @endif
        </div>
        <map name="rx" id="rx">
            @for($i = 1; $i <= 18; $i++)
                <area href="{{ '' }}" coords="{$resourcesFieldCoordinatesArray[$i]}" shape="circle"
                      title="{$villageBuildings[$i]['name']} {$smarty.const.LEVEL} {$villageBuildings[$i]['level']}{if $buildingJobs[$i]['inBuilding']}{$smarty.const.UPGRADE_IN_PROGRESS}{/if}"/>
            @endfor
            <area href="{{ route('village') }}" coords="144,131,36" shape="circle"
                  title="@lang('village/fields.village_center')" alt="@lang('village/fields.village_center')"/>
        </map>
        <div id="village_map" class="f{{ $village->world->type }}">
            @for ($i = 1; $i <= 18; $i++)
                <img src="{{ asset('images/x.gif') }}"
                     class="reslevel rf{{$i}} level{$villageBuildings[$i]['level']}{if $buildingJobs[$i]['inBuilding']}_active{/if}"
                     alt="{$villageBuildings[$i]['name']} {$smarty.const.LEVEL} {$villageBuildings[$i]['level']}{if $buildingJobs[$i]['inBuilding']} {$smarty.const.UPGRADE_IN_PROGRESS}{/if}"/>
            @endfor
            <img id="resfeld" usemap="#rx" src="{{ asset('images/x.gif') }}"/>
        </div>
        <div id="map_details">
            <br/><br/>
            @include('village.movements')
            @include('village.production')
            @include('village.units')
            @if ($village->buildingsQueue()->isNotEmpty())
                @include('village.buildings_queue')
            @endif
            <br/><br/><br/><br/><br/><br/>
        </div>
    </div>
@endcomponent
