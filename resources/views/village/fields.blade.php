@component('layout.layout')
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
            @foreach($village->buildings->where('location', '<=', 18)  as $building)
                <area href="{{ route('building.show', ['id' => $building->location]) }}"
                      coords="{{ $village::RESOURCES_FIELD_COORDINATES[$building->location]  }}" shape="circle"
                      title="{{ trans('buildings.' . get_name_from_class($building) . '.name') }} @lang('buildings.level') {{ $building->level }}"/>
            @endforeach
            <area href="{{ route('village') }}" coords="144,131,36" shape="circle"
                  title="@lang('village/fields.village_center')" alt="@lang('village/fields.village_center')"/>
        </map>
        <div id="village_map" class="f{{ $village->world->type }}">
            @foreach($village->buildings->where('location', '<=', 18)  as $building)
                <img src="{{ asset('images/x.gif') }}"
                     class="reslevel rf{{ $building->location }} level{{ $building->level }}"
                     alt="{{ trans('buildings.' . get_name_from_class($building) . '.name') }} @lang('buildings.level') {{ $building->level }}"/>
            @endforeach
            <img id="resfeld" usemap="#rx" src="{{ asset('images/x.gif') }}"/>
        </div>
        <div id="map_details">
            <br/><br/>
            @include('village.movements')
            @include('village.production')
            @include('village.units')
            @if ($village->getBuildingsQueue()->whereNotInstanceOf(\App\Game\Buildings\Queues\Demolition::class)->isNotEmpty())
                @include('village.buildings_queue')
            @endif
            <br/><br/><br/><br/><br/><br/>
        </div>
    </div>
@endcomponent
