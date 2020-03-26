@component('layout.layout')
    <div id="content" class="village1">
        <div id="textmenu">
            <a href="{{ route('profile') }}/{{Auth::user()->id}}">@lang('profile.menu.overview')</a>
            | <a href="spieler.php?s=1">@lang('profile.menu.profile')</a>
            | <a href="spieler.php?s=2">@lang('profile.menu.preferences')</a>
            | <a href="spieler.php?s=3">@lang('profile.menu.account')</a>


        </div>
        <h1>@lang('profile.player_profile')</h1>

        <table id="profile" cellpadding="1" cellspacing="1">
            <thead>
            <tr>
                <th colspan="2">@lang('profile.overview.player') {{ Auth::user()->name }}</th>
            </tr>
            <tr>
                <td>@lang('profile.overview.details')</td>
                <td>@lang('profile.overview.description')</td>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="empty"></td>
                <td class="empty"></td>
            </tr>
            <tr>
                <td class="details">
                    <table cellpadding="0" cellspacing="0">
                        <th>@lang('profile.overview.rank')</th>
                        <td>{{-- TODO get user rank --}}</td>
                        </tr>
                        <tr>
                            <th>@lang('profile.overview.tribe')</th>
                            <td>@lang('profile.overview.tribes.' . Auth::user()->tribe)</td>
                        </tr>

                        <tr>
                            <th>@lang('profile.overview.alliance')</th>
                            <td>-</td>
                            {{-- TODO check if alliance exists and if it does make link to it
                            <a href=\"allianz.php?aid=" . $displayarray['alliance'] . "\">" . $displayalliance . "</a>--}}
                        </tr>
                        <tr>
                            <th>@lang('profile.overview.villages')</th>
                            <td>{{-- TODO number of villages --}}</td>

                        </tr>
                        <tr>
                            <th>@lang('profile.overview.population')</th>
                            <td>{{-- TODO total population --}}</td>
                        </tr>
                        {{-- TODO if Age, Gender or Location is set show it --}}
                        <tr>
                            <th>@lang('profile.overview.age')</th>
                            <td>{{-- TODO age --}}</td>
                        </tr>
                        <tr>
                            <th>@lang('profile.overview.gender')</th>
                            <td>{{-- TODO gender --}}</td>
                        </tr>
                        <tr>
                            <th>@lang('profile.overview.location')</th>
                            <td>{{-- TODO location --}}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="empty"></td>
                        </tr>
                        <tr>
                            {{-- TODO checks needed if its your profile or not, if itsnot then change profile should not be there or should be greyed out - to be checked--}}
                            <td colspan="2"><a
                                    href="spieler.php?s=1">&raquo; @lang('profile.overview.change_profile')</a></t>
                            <td colspan=\"2\"><span
                                    class=none><b>&raquo; @lang('profile.overview.change_profile')</b></span></td>
                            <td colspan=\"2\"><a href="">&raquo; @lang('profile.overview.write_message')</a></td>
                        </tr>
                        <!--<tr><td colspan="2"><a href="nachrichten.php?t=1&id=0"><font color="Red">&raquo; Report Player</font></a></td></tr>-->
                        <tr>
                            <td colspan="2" class="desc2">
                                <div class="desc2div">{{-- TODO profile description--}}</div>
                            </td>
                        </tr>
                    </table>

                </td>
                <td class="desc1">
                    <div class="desc1div">
                        {{-- TODO profile description--}}
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <table cellpadding="1" cellspacing="1" id="villages">
            <thead>
            <tr>
                <th colspan="">@lang('profile.overview.villages')</th>
            </tr>
            <tr>
                <td>@lang('profile.overview.village.name')</td>
                <td>@lang('profile.overview.village.inhabitants')</td>
                <td>@lang('profile.overview.village.coordinates')</td>
            </tr>
            </thead>
            <tbody>
            @foreach (Auth::user()->villages()->with('world')->get() as $town)
                <tr>
                    <td class="nam"><a href=""> {{ $town->name }}</a>
                        @if($town->isCapital())
                            <span class="none3"> (@lang('profile.overview.village.capital'))</span>
                    @endif
                    <td class="hab"> {{ $town->population }}</td>
                    <td class="aligned_coords">
                        <div class="cox">({{ $town->world->x }}</div>
                        <div class="pi">|</div>
                        <div class="coy">{{ $town->world->y }})</div>
                    </td>
                </tr>
            </tbody>
        </table>
        @endforeach
    </div>
@endcomponent

