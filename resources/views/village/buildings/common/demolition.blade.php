@if($building->level >= config('server.demolish_level'))
    @if(false)
        {{--
                <h2>{$smarty.const.DEMOLITION_BUILDING}</h2>
                {if !empty($villageBuildingsInDemolition)}
                {foreach $villageBuildingsInDemolition as $building}
                <b>
                    <a href="build.php?id={$parameters['id']}&cancel={$building.id}">
                        <img src="assets/img/x.gif" class="del" title="{$smarty.const.CANCEL}" alt="{$smarty.const.CANCEL}">
                    </a>
                    {$smarty.const.DEMOLITION_OF} {$building.name}: <span class="timer">{$building.finished}</span>
                    {if $gold >= 2}
                    <a href="?id={$parameters['id']}&buildingFinish=1" onclick="return confirm('{$smarty.const.FINISH_GOLD}');">
                        <img class="clock" alt="{$smarty.const.FINISH_GOLD}" title="{$smarty.const.FINISH_GOLD}" src="assets/img/x.gif"/>
                    </a>
                    {/if}
                </b>
                <br />
                {/foreach}--}}

    @else
        <form action="" method="POST" style="display:inline"> {{-- TODO form action --}}
            <select id="demolition_type" name="demolish" class="dropdown">
                @foreach($village->buildings->where('location', '>=', '19') as $building)
                    @if($building->level > 0) {{-- TODO && !building is not being built right now --}}
                    <option
                        value=""> {{-- TODO {$position}{if $parameters['demolish'] == $position}selected='selected'{/if} --}}
                        {{ $building->location }}. {{ trans('buildings.' . get_name_from_class($building) . '.name') }}
                        (@lang('buildings.level') {{ $building->level }})
                    </option>
                    @endif
                @endforeach
            </select>
            <button id="btn_demolish" class="trav_buttons" name="action" value="startDemolition"> Demolish</button>
        </form>
    @endif
@endif
