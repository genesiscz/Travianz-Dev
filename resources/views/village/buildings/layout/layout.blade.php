@component('layout.layout')
    <div id="content" class="build">
        <div id="build" class="gid{{ $building->type }}">
            <a href="#" onClick="return Popup({{ $building->type }}, 4);" class="build_logo">
                <img class="building g{{ $building->type }}" src="{{ asset('images/x.gif') }}"
                     alt="{{ trans('buildings.' . get_name_from_class($building) . '.name') }}"
                     title="{{ trans('buildings.' . get_name_from_class($building) . '.name') }}"/>
            </a>
            <h1>{{ trans('buildings.' . get_name_from_class($building) . '.name') }}
                <span class="level">@lang('buildings.level') {{ $building->level }}</span>
            </h1>
            <p class="build_desc">{{ trans('buildings.' . get_name_from_class($building) . '.description') }}</p>

        @include('village.buildings.' . get_name_from_class($building))
        @include('village.buildings.common.upgrade')
        </div>
    </div>
@endcomponent
