@component('layout.layout')
    <div id="content" class="village2">
        <map name="map2" id="map2">
            @for($i = 19 ; $i <= 39 ; $i++)
                @if($building = $village->buildings->where('location', '==', $i)->first())
                    <area href="{{ route('building.show', ['id' => $building->location]) }}"
                          coords="{{ $village::BUILDING_FIELD_COORDINATES[$building->location]  }}" shape="poly"
                          title="{{ trans('buildings.' . get_name_from_class($building) . '.name') }} @lang('buildings.level') {{ $building->level }}"/>
                @else
                    <area href="{{ route('building.show', ['id' => $i]) }}"
                          coords="{{ $village::BUILDING_FIELD_COORDINATES[$i]  }}" shape="poly"
                          title="@lang('buildings.building_site')"/>
                @endif
            @endfor
            @if($building = $village->buildings->where('location', '==', 40)->first())
                @for($i = 0 ; $i <=2 ; $i++)
                    <area href="{{ route('building.show', ['id' => $building->location]) }}"
                          coords="{{ $village::BUILDING_FIELD_COORDINATES[$building->location][$i]  }}" shape="poly"
                          title="{{ trans('buildings.' . get_name_from_class($building) . '.name') }} @lang('buildings.level') {{ $building->level }}"/>
                @endfor
            @endif
        </map>
        <div id="village_map"
             class="d2_{{ $village->buildings->where('type', '==', '3'.Auth::user()->tribe)->first() ? 1 . Auth::user()->tribe : 0}}">
            @for($i = 19 ; $i <= 39 ; $i++)
                @if($building = $village->buildings->where('location', '==', $i)->first())
                    <img src="{{ asset('images/x.gif') }}"
                         class="building {{ $i == 39 ? 'dx1 g16' : 'd' . $building->location . ' g' . $building->type}}"
                         title="{{ trans('buildings.' . get_name_from_class($building) . '.name') }} @lang('buildings.level') {{ $building->level }}"/>
                @else
                    <img src="{{ asset('images/x.gif') }}"
                         class="building {{ $i == 39 ? 'dx1 g16e' : 'd' . $i . ' iso'}}"
                         title="@lang('buildings.building_site')"/>
                @endif
            @endfor
            <img class="map2" usemap="#map2" src="{{ asset('images/x.gif') }}" alt=""/>
        </div>
        <img src="{{ asset('images/x.gif') }}" id="lswitch"
             class="on"
             onclick="vil_levels_toggle()"/>
    </div>
@endcomponent
