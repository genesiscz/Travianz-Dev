@component('layout.layout')
    <div id="content" class="village2">

        <map name="map1" id="map1">
            @foreach($village->buildings->where('location', '>=', 19)  as $building)
                <area href="{{ route('building.show', ['id' => $building->location]) }}"
                      coords="{{ $village::BUILDING_FIELD_COORDINATES[$building->location]  }}" shape="poly"
                      title="{{ trans('buildings.' . get_name_from_class($building) . '.name') }} @lang('buildings.level') {{ $building->level }}"/>
            @endforeach
        </map>
    <map name="map2" id="map2">

        <area href="build.php?id=40" title=""
              coords="312,338,347,338,377,320,406,288,421,262,421,222,396,275,360,311"
              shape="poly" alt="" />
        <area href="build.php?id=40" title=""
              coords="49,338,0,274,0,240,33,286,88,338" shape="poly" alt="" />
        <area href="build.php?id=40" title=""
              coords="0,144,34,88,93,39,181,15,252,15,305,31,358,63,402,106,421,151,421,93,378,47,280,0,175,0,78,28,0,92"
              shape="poly" alt="" />
    </map>
       <div id="village_map" class="d2_1{{ Auth::user()->tribe }}">
           @foreach($village->buildings->where('location', '>=', 19)  as $building)
                           <img src="{{ asset('images/x.gif') }}"
                 class="d{{ $building->location }} iso" text="Building site"
                  title="{{ trans('buildings.' . get_name_from_class($building) . '.name') }} @lang('buildings.level') {{ $building->level }}"/>

        @endforeach
        <img src="{{ asset('images/x.gif') }}" class="dx1 g16e" alt="Rally Point building site" />
    <img class="map1" usemap="#map1" src="{{ asset('images/x.gif') }}" alt="" /> <img
            class="map2" usemap="#map2" src="{{ asset('images/x.gif') }}" alt="" />
    </div>
    <img src="{{ asset('images/x.gif') }}" id="lswitch"
       class="on"
         onclick="vil_levels_toggle()" />
    </div>
@endcomponent
