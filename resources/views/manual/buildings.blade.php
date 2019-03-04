@component('manual.layout')
<p class=f9>
   @lang('manual/buildings.description', ['br' => '<br />'])
</p>
<h2>@lang('buildings.main_building')</h2>
<p>
   <img src="{{ asset('images/manual/buildings/gid15.gif') }}" width=166 height=150 border=0
      alt="@lang('buildings.main_building')" title="@lang('buildings.main_building')" align="left" /> 
   @lang('manual/buildings.main_building_description') <br /> <br />
   <b>@lang('manual/buildings.tribe_advantage'):</b><br />
   @lang('manual/buildings.main_building_tribe_advantage')<br /><br />
   @lang('manual/buildings.costs_and_time', ['b' => '<b>', '_b' => '</b>']):<br />
   <img src={{ asset('images/manual/resources/1.gif') }} width=18 height=12 alt="@lang('resources.lumber')" title="@lang('resources.lumber')" style="padding-top: 4px" /> 70 | <img
      src={{ asset('images/manual/resources/2.gif') }} width=18 height=12 alt="@lang('resources.clay')"
      title="@lang('resources.clay')"> 40 | <img src="{{ asset('images/manual/resources/3.gif') }}" width=18 height=12
      alt="@lang('resources.iron')" title="@lang('resources.iron')"> 60 | <img
      src={{ asset('images/manual/resources/4.gif') }} width=18 height=12 alt="@lang('resources.crop')"
      title="@lang('resources.crop')"> 20 | <img src={{ asset('images/manual/resources/5.gif') }} width=18 height=12
      alt="@lang('resources.crop_consumption')" title="@lang('resources.crop_consumption')"> 2 | <img
      src={{ asset('images/manual/buildings/clock.gif') }} width=18 height=12> 0:33:20 <br /> <br /> <b>
   @lang('manual/buildings.prerequisites'): </b> <br /> @lang('manual/buildings.none')
</p>
<h2>@lang('buildings.warehouse')</h2>
<p>
   <img src="{{ asset('images/manual/buildings/gid10.gif') }}" width=166 height=150 border=0
      alt="@lang('buildings.warehouse')" title="@lang('buildings.warehouse')" align="right" />
   @lang('manual/buildings.warehouse_desc') 
   <br /> <br /> 
   @lang('manual/buildings.costs_and_time', ['b' => '<b>', '_b' => '</b>']):<br /> 
   <img src={{ asset('images/manual/resources/1.gif') }} width=18 height=12 alt="@lang('resources.lumber')" title="@lang('resources.lumber')" style="padding-top: 4px" /> 130 | <img
      src={{ asset('images/manual/resources/2.gif') }} width=18 height=12 alt="@lang('resources.clay')"
      title="@lang('resources.clay')"> 160 | <img src="{{ asset('images/manual/resources/3.gif') }}" width=18 height=12
      alt="@lang('resources.iron')" title="@lang('resources.iron')"> 90 | <img
      src={{ asset('images/manual/resources/4.gif') }} width=18 height=12 alt="@lang('resources.crop')"
      title="@lang('resources.crop')"> 40 | <img src={{ asset('images/manual/resources/5.gif') }} width=18 height=12
      alt="@lang('resources.crop_consumption')" title="@lang('resources.crop_consumption')"> 1 | <img
      src={{ asset('images/manual/buildings/clock.gif') }} width=18 height=12> 0:33:20 <br /> <br /> <b>
   @lang('manual/buildings.prerequisites'): </b> <br /> @lang('buildings.main_building') @lang('buildings.level') 1
</p>
<h2>@lang('buildings.granary')</h2>
<p>
   <img src="{{ asset('images/manual/buildings/gid11.gif') }}" width=166 height=150 border=0
      alt="@lang('buildings.granary')" title="@lang('buildings.granary')" align="right" />
   @lang('manual/buildings.granary_desc') 
   <br /> <br /> 
   @lang('manual/buildings.costs_and_time', ['b' => '<b>', '_b' => '</b>']):<br />
   <img src={{ asset('images/manual/resources/1.gif') }} width=18
      height=12 alt="@lang('resources.lumber')" title="@lang('resources.lumber')"
      style="padding-top: 4px" /> 80 | <img src={{ asset('images/manual/resources/2.gif') }} width=18
      height=12 alt="@lang('resources.clay')" title="@lang('resources.clay')"> 100 | <img
      src="{{ asset('images/manual/resources/3.gif') }}" width=18 height=12 alt="@lang('resources.iron')"
      title="@lang('resources.iron')"> 70 | <img src={{ asset('images/manual/resources/4.gif') }} width=18 height=12
      alt="@lang('resources.crop')" title="@lang('resources.crop')"> 20 | <img
      src={{ asset('images/manual/resources/5.gif') }} width=18 height=12 alt="@lang('resources.crop_consumption')"
      title="@lang('resources.crop_consumption')"> 1 | <img src={{ asset('images/manual/buildings/clock.gif') }} width=18
      height=12> 0:26:40 <br /> <br /> <b> @lang('manual/buildings.prerequisites'): </b> <br /> 
      @lang('buildings.main_building') @lang('buildings.level') 1
</p>
<h2>@lang('buildings.cranny')</h2>
<p>
   <img src="{{ asset('images/manual/buildings/gid23.gif') }}" width=166 height=150 border=0
      alt="@lang('buildings.cranny')" title="@lang('buildings.cranny')" align="left" /> 
   @lang('manual/buildings.cranny_desc') <br />
   <br /> <b>@lang('manual/buildings.tribe_advantage'):</b><br /> 
   @lang('manual/buildings.cranny_tribe_advantage', ['br' => '<br />'])
   <br /> <br /> @lang('manual/buildings.costs_and_time', ['b' => '<b>', '_b' => '</b>']):<br />
   <img src={{ asset('images/manual/resources/1.gif') }} width=18 height=12 alt="@lang('resources.lumber')" title="@lang('resources.lumber')" style="padding-top: 4px" /> 40 | <img
      src={{ asset('images/manual/resources/2.gif') }} width=18 height=12 alt="@lang('resources.clay')"
      title="@lang('resources.clay')"> 50 | <img src="{{ asset('images/manual/resources/3.gif') }}" width=18 height=12
      alt="@lang('resources.iron')" title="@lang('resources.iron')"> 30 | <img
      src={{ asset('images/manual/resources/4.gif') }} width=18 height=12 alt="@lang('resources.crop')"
      title="@lang('resources.crop')"> 10 | <img src={{ asset('images/manual/resources/5.gif') }} width=18 height=12
      alt="@lang('resources.crop_consumption')" title="@lang('resources.crop_consumption')"> 0 | <img
      src={{ asset('images/manual/buildings/clock.gif') }} width=18 height=12> 0:12:30 <br /> <br /> <b>
   @lang('manual/buildings.prerequisites'): </b> <br /> @lang('manual/buildings.none')
</p>
<h2>@lang('buildings.embassy')</h2>
<p>
   <img src="{{ asset('images/manual/buildings/gid18.gif') }}" width=166 height=150 border=0
      alt="@lang('buildings.embassy')" title="@lang('buildings.embassy')" align="right" />
   @lang('manual/buildings.embassy_desc') 
   <br /> <br /> 
   @lang('manual/buildings.costs_and_time', ['b' => '<b>', '_b' => '</b>']):<br />
   <img src={{ asset('images/manual/resources/1.gif') }} width=18
      height=12 alt="@lang('resources.lumber')" title="@lang('resources.lumber')"
      style="padding-top: 4px" /> 180 | <img src={{ asset('images/manual/resources/2.gif') }} width=18
      height=12 alt="@lang('resources.clay')" title="@lang('resources.clay')"> 130 | <img
      src="{{ asset('images/manual/resources/3.gif') }}" width=18 height=12 alt="@lang('resources.iron')"
      title="@lang('resources.iron')"> 150 | <img src={{ asset('images/manual/resources/4.gif') }} width=18 height=12
      alt="@lang('resources.crop')" title="@lang('resources.crop')"> 80 | <img
      src={{ asset('images/manual/resources/5.gif') }} width=18 height=12 alt="@lang('resources.crop_consumption')"
      title="@lang('resources.crop_consumption')"> 3 | <img src={{ asset('images/manual/buildings/clock.gif') }} width=18
      height=12> 0:33:20 <br /> <br /> <b> @lang('manual/buildings.prerequisites'): </b> <br /> 
      @lang('buildings.main_building') @lang('buildings.level') 1
</p>
<h2>@lang('buildings.rally_point')</h2>
<p>
   <img src="{{ asset('images/manual/buildings/gid16.gif') }}" width=166 height=150 border=0
      alt="@lang('buildings.rally_point')" title="@lang('buildings.rally_point')" align="right" />
   @lang('manual/buildings.rally_point_desc') 
   <br /> <br /> 
   @lang('manual/buildings.costs_and_time', ['b' => '<b>', '_b' => '</b>']):<br />
   <img src={{ asset('images/manual/resources/1.gif') }} width=18
      height=12 alt="@lang('resources.lumber')" title="@lang('resources.lumber')"
      style="padding-top: 4px" /> 110 | <img src={{ asset('images/manual/resources/2.gif') }} width=18
      height=12 alt="@lang('resources.clay')" title="@lang('resources.clay')"> 160 | <img
      src="{{ asset('images/manual/resources/3.gif') }}" width=18 height=12 alt="@lang('resources.iron')"
      title="@lang('resources.iron')"> 90 | <img src={{ asset('images/manual/resources/4.gif') }} width=18 height=12
      alt="@lang('resources.crop')" title="@lang('resources.crop')"> 70 | <img
      src={{ asset('images/manual/resources/5.gif') }} width=18 height=12 alt="@lang('resources.crop_consumption')"
      title="@lang('resources.crop_consumption')"> 1 | <img src={{ asset('images/manual/buildings/clock.gif') }} width=18
      height=12> 0:33:20 <br /> <br /> <b> @lang('manual/buildings.prerequisites'): </b> <br /> @lang('manual/buildings.none')
</p>
<h2>@lang('buildings.marketplace')</h2>
<p>
   <img src="{{ asset('images/manual/buildings/gid17.gif') }}" width=166 height=150 border=0
      alt="@lang('buildings.marketplace')" title="@lang('buildings.marketplace')" align="left" /> 
   @lang('manual/buildings.marketplace_desc') <br />
   <br /> <b>@lang('manual/buildings.tribe_advantage'):</b><br /> 
   @lang('manual/buildings.marketplace_tribe_advantage', ['br' => '<br />'])
   <br /> <br />
   @lang('manual/buildings.costs_and_time', ['b' => '<b>', '_b' => '</b>']):<br />
   <img src={{ asset('images/manual/resources/1.gif') }} width=18 height=12 alt="@lang('resources.lumber')" title="@lang('resources.lumber')" style="padding-top: 4px" /> 80 | <img
      src={{ asset('images/manual/resources/2.gif') }} width=18 height=12 alt="@lang('resources.clay')"
      title="@lang('resources.clay')"> 70 | <img src="{{ asset('images/manual/resources/3.gif') }}" width=18 height=12
      alt="@lang('resources.iron')" title="@lang('resources.iron')"> 120 | <img
      src={{ asset('images/manual/resources/4.gif') }} width=18 height=12 alt="@lang('resources.crop')"
      title="@lang('resources.crop')"> 70 | <img src={{ asset('images/manual/resources/5.gif') }} width=18 height=12
      alt="@lang('resources.crop_consumption')" title="@lang('resources.crop_consumption')"> 4 | <img
      src={{ asset('images/manual/buildings/clock.gif') }} width=18 height=12> 0:30:00 <br /> <br /> <b>
   @lang('manual/buildings.prerequisites'): </b> <br /> @lang('buildings.main_building') @lang('buildings.level') 3, @lang('buildings.warehouse') @lang('buildings.level') 1,
   @lang('buildings.granary') @lang('buildings.level') 1
</p>
<h2>@lang('buildings.barracks')</h2>
<p>
   <img src="{{ asset('images/manual/buildings/gid19.gif') }}" width=166 height=150 border=0
      alt="@lang('buildings.barracks')" title="@lang('buildings.barracks')" align="left" />
   @lang('manual/buildings.barracks_desc') 
   <br /> <br /> 
   @lang('manual/buildings.costs_and_time', ['b' => '<b>', '_b' => '</b>']):<br />
   <img src={{ asset('images/manual/resources/1.gif') }} width=18 height=12 alt="@lang('resources.lumber')" title="@lang('resources.lumber')" style="padding-top: 4px" /> 210 | <img
      src={{ asset('images/manual/resources/2.gif') }} width=18 height=12 alt="@lang('resources.clay')"
      title="@lang('resources.clay')"> 140 | <img src="{{ asset('images/manual/resources/3.gif') }}" width=18 height=12
      alt="@lang('resources.iron')" title="@lang('resources.iron')"> 260 | <img
      src={{ asset('images/manual/resources/4.gif') }} width=18 height=12 alt="@lang('resources.crop')"
      title="@lang('resources.crop')"> 120 | <img src={{ asset('images/manual/resources/5.gif') }} width=18 height=12
      alt="@lang('resources.crop_consumption')" title="@lang('resources.crop_consumption')"> 4 | <img
      src={{ asset('images/manual/buildings/clock.gif') }} width=18 height=12> 0:33:20 <br /> <br /> <b>
   @lang('manual/buildings.prerequisites'): </b> <br /> @lang('buildings.rally_point') @lang('buildings.level') 1, @lang('buildings.main_building') @lang('buildings.level') 3
</p>
<h2>@lang('buildings.stable')</h2>
<p>
   <img src="{{ asset('images/manual/buildings/gid20.gif') }}" width=166 height=150 border=0
      alt="@lang('buildings.stable')" title="@lang('buildings.stable')" align="left" /> 
   @lang('manual/buildings.stable_desc') 
   <br /> <br />
   @lang('manual/buildings.costs_and_time', ['b' => '<b>', '_b' => '</b>']):<br />
   <img src={{ asset('images/manual/resources/1.gif') }} width=18 height=12 alt="@lang('resources.lumber')" title="@lang('resources.lumber')" style="padding-top: 4px" /> 260 | <img
      src={{ asset('images/manual/resources/2.gif') }} width=18 height=12 alt="@lang('resources.clay')"
      title="@lang('resources.clay')"> 140 | <img src="{{ asset('images/manual/resources/3.gif') }}" width=18 height=12
      alt="@lang('resources.iron')" title="@lang('resources.iron')"> 220 | <img
      src={{ asset('images/manual/resources/4.gif') }} width=18 height=12 alt="@lang('resources.crop')"
      title="@lang('resources.crop')"> 100 | <img src={{ asset('images/manual/resources/5.gif') }} width=18 height=12
      alt="@lang('resources.crop_consumption')" title="@lang('resources.crop_consumption')"> 5 | <img
      src={{ asset('images/manual/buildings/clock.gif') }} width=18 height=12> 0:36:40 <br /> <br /> <b>
   @lang('manual/buildings.prerequisites'): </b> <br /> @lang('buildings.blacksmith') @lang('buildings.level') 3, @lang('buildings.academy') @lang('buildings.level') 5
</p>
<h2>@lang('buildings.workshop')</h2>
<p>
   <img src="{{ asset('images/manual/buildings/gid21.gif') }}" width=166 height=150 border=0
      alt="@lang('buildings.workshop')" title="@lang('buildings.workshop')" align="left" />
   @lang('manual/buildings.workshop_desc') 
   <br /> <br />
   @lang('manual/buildings.costs_and_time', ['b' => '<b>', '_b' => '</b>']):<br />
   <img src={{ asset('images/manual/resources/1.gif') }} width=18
      height=12 alt="@lang('resources.lumber')" title="@lang('resources.lumber')"
      style="padding-top: 4px" /> 460 | <img src={{ asset('images/manual/resources/2.gif') }} width=18
      height=12 alt="@lang('resources.clay')" title="@lang('resources.clay')"> 510 | <img
      src="{{ asset('images/manual/resources/3.gif') }}" width=18 height=12 alt="@lang('resources.iron')"
      title="@lang('resources.iron')"> 600 | <img src={{ asset('images/manual/resources/4.gif') }} width=18 height=12
      alt="@lang('resources.crop')" title="@lang('resources.crop')"> 320 | <img
      src={{ asset('images/manual/resources/5.gif') }} width=18 height=12 alt="@lang('resources.crop_consumption')"
      title="@lang('resources.crop_consumption')"> 3 | <img src={{ asset('images/manual/buildings/clock.gif') }} width=18
      height=12> 0:50:00 <br /> <br /> <br /> <b> @lang('manual/buildings.prerequisites'): </b> <br /> @lang('buildings.academy')
   @lang('buildings.level') 10, @lang('buildings.main_building') @lang('buildings.level') 5
</p>
<h2>@lang('buildings.academy')</h2>
<p>
   <img src="{{ asset('images/manual/buildings/gid22.gif') }}" width=166 height=150 border=0 alt="@lang('buildings.academy')" title="@lang('buildings.academy')" align="right" /> 
   @lang('manual/buildings.academy_desc') 
   <br /> <br /> 
   @lang('manual/buildings.costs_and_time', ['b' => '<b>', '_b' => '</b>']):<br />
   <img src={{ asset('images/manual/resources/1.gif') }} width=18
      height=12 alt="@lang('resources.lumber')" title="@lang('resources.lumber')"
      style="padding-top: 4px" /> 220 | <img src={{ asset('images/manual/resources/2.gif') }} width=18
      height=12 alt="@lang('resources.clay')" title="@lang('resources.clay')"> 160 | <img
      src="{{ asset('images/manual/resources/3.gif') }}" width=18 height=12 alt="@lang('resources.iron')"
      title="@lang('resources.iron')"> 90 | <img src={{ asset('images/manual/resources/4.gif') }} width=18 height=12
      alt="@lang('resources.crop')" title="@lang('resources.crop')"> 40 | <img
      src={{ asset('images/manual/resources/5.gif') }} width=18 height=12 alt="@lang('resources.crop_consumption')"
      title="@lang('resources.crop_consumption')"> 4 | <img src={{ asset('images/manual/buildings/clock.gif') }} width=18
      height=12> 0:33:20 <br /> <br /> <b> @lang('manual/buildings.prerequisites'): </b> <br /> @lang('buildings.barracks')
   @lang('buildings.level') 3, @lang('buildings.main_building') @lang('buildings.level') 3
</p>
<h2>@lang('buildings.blacksmith')</h2>
<p>
   <img src="{{ asset('images/manual/buildings/gid12.gif') }}" width=166 height=150 border=0
      alt="@lang('buildings.blacksmith')" title="@lang('buildings.blacksmith')" align="left" /> 
      @lang('manual/buildings.blacksmith_desc')
      <br /> <br /> 
      @lang('manual/buildings.costs_and_time', ['b' => '<b>', '_b' => '</b>']):<br />
   <img src={{ asset('images/manual/resources/1.gif') }} width=18 height=12 alt="@lang('resources.lumber')" title="@lang('resources.lumber')" style="padding-top: 4px" /> 170 | <img
      src={{ asset('images/manual/resources/2.gif') }} width=18 height=12 alt="@lang('resources.clay')"
      title="@lang('resources.clay')"> 200 | <img src="{{ asset('images/manual/resources/3.gif') }}" width=18 height=12
      alt="@lang('resources.iron')" title="@lang('resources.iron')"> 380 | <img
      src={{ asset('images/manual/resources/4.gif') }} width=18 height=12 alt="@lang('resources.crop')"
      title="@lang('resources.crop')"> 130 | <img src={{ asset('images/manual/resources/5.gif') }} width=18 height=12
      alt="@lang('resources.crop_consumption')" title="@lang('resources.crop_consumption')"> 4 | <img
      src={{ asset('images/manual/buildings/clock.gif') }} width=18 height=12> 0:33:20 <br /> <br /> <br /> <b>
   @lang('manual/buildings.prerequisites'): </b> <br /> @lang('buildings.main_building') @lang('buildings.level') 3, @lang('buildings.academy') @lang('buildings.level') 3
</p>
<h2>@lang('buildings.armoury')</h2>
<p>
   <img src="{{ asset('images/manual/buildings/gid13.gif') }}" width=166 height=150 border=0
      alt="@lang('buildings.armoury')" title="@lang('buildings.armoury')" align="right" /> 
      @lang('manual/buildings.armoury_desc')
      <br /> <br /> 
      @lang('manual/buildings.costs_and_time', ['b' => '<b>', '_b' => '</b>']):<br />
   <img src={{ asset('images/manual/resources/1.gif') }} width=18 height=12 alt="@lang('resources.lumber')" title="@lang('resources.lumber')" style="padding-top: 4px" /> 130 | <img
      src={{ asset('images/manual/resources/2.gif') }} width=18 height=12 alt="@lang('resources.clay')"
      title="@lang('resources.clay')"> 210 | <img src="{{ asset('images/manual/resources/3.gif') }}" width=18 height=12
      alt="@lang('resources.iron')" title="@lang('resources.iron')"> 410 | <img
      src={{ asset('images/manual/resources/4.gif') }} width=18 height=12 alt="@lang('resources.crop')"
      title="@lang('resources.crop')"> 130 | <img src={{ asset('images/manual/resources/5.gif') }} width=18 height=12
      alt="@lang('resources.crop_consumption')" title="@lang('resources.crop_consumption')"> 4 | <img
      src={{ asset('images/manual/buildings/clock.gif') }} width=18 height=12> 0:33:20 <br /> <br /> <b>
   @lang('manual/buildings.prerequisites'): </b> <br /> @lang('buildings.main_building') @lang('buildings.level') 3, @lang('buildings.academy') @lang('buildings.level') 1
</p>
<h2>@lang('buildings.palace')</h2>
<p>
   <img src="{{ asset('images/manual/buildings/gid26.gif') }}" width=166 height=150 border=0
      alt="@lang('buildings.palace')" title="@lang('buildings.palace')" align="left" /> 
      @lang('manual/buildings.palace_desc', ['br' => '<br />'])
      <br /> <br /> 
      @lang('manual/buildings.costs_and_time', ['b' => '<b>', '_b' => '</b>']):<br />
   <img src={{ asset('images/manual/resources/1.gif') }} width=18
      height=12 alt="@lang('resources.lumber')" title="@lang('resources.lumber')"
      style="padding-top: 4px" /> 550 | <img src={{ asset('images/manual/resources/2.gif') }} width=18
      height=12 alt="@lang('resources.clay')" title="@lang('resources.clay')"> 800 | <img
      src="{{ asset('images/manual/resources/3.gif') }}" width=18 height=12 alt="@lang('resources.iron')"
      title="@lang('resources.iron')"> 750 | <img src={{ asset('images/manual/resources/4.gif') }} width=18 height=12
      alt="@lang('resources.crop')" title="@lang('resources.crop')"> 250 | <img
      src={{ asset('images/manual/resources/5.gif') }} width=18 height=12 alt="@lang('resources.crop_consumption')"
      title="@lang('resources.crop_consumption')"> 1 | <img src={{ asset('images/manual/buildings/clock.gif') }} width=18
      height=12> 1:23:20 <br /> <br /> <b> @lang('manual/buildings.prerequisites'): </b> <br /> @lang('buildings.embassy')
   @lang('buildings.level') 1, @lang('buildings.main_building') @lang('buildings.level') 5, <strike>@lang('buildings.residence')</strike>
</p>
<h2>@lang('buildings.residence')</h2>
<p>
   <img src="{{ asset('images/manual/buildings/gid25.gif') }}" width=166 height=150 border=0
      alt="@lang('buildings.residence')" title="@lang('buildings.residence')" align="left" /> 
   @lang('manual/buildings.residence_desc', ['br' => '<br />'])
   <br /> <br /> 
   @lang('manual/buildings.costs_and_time', ['b' => '<b>', '_b' => '</b>']):<br />
   <img src={{ asset('images/manual/resources/1.gif') }} width=18
      height=12 alt="@lang('resources.lumber')" title="@lang('resources.lumber')"
      style="padding-top: 4px" /> 580 | <img src={{ asset('images/manual/resources/2.gif') }} width=18
      height=12 alt="@lang('resources.clay')" title="@lang('resources.clay')"> 460 | <img
      src="{{ asset('images/manual/resources/3.gif') }}" width=18 height=12 alt="@lang('resources.iron')"
      title="@lang('resources.iron')"> 350 | <img src={{ asset('images/manual/resources/4.gif') }} width=18 height=12
      alt="@lang('resources.crop')" title="@lang('resources.crop')"> 180 | <img
      src={{ asset('images/manual/resources/5.gif') }} width=18 height=12 alt="@lang('resources.crop_consumption')"
      title="@lang('resources.crop_consumption')"> 1 | <img src={{ asset('images/manual/buildings/clock.gif') }} width=18
      height=12> 0:33:20 <br /> <br /> <b> @lang('manual/buildings.prerequisites'): </b> <br /> Main
   Building @lang('buildings.level') 5, <strike>@lang('buildings.palace')</strike>
</p>
<h2>@lang('buildings.trade_office')</h2>
<p>
   <img src="{{ asset('images/manual/buildings/gid28.gif') }}" width=166 height=150 border=0
      alt="@lang('buildings.trade_office')" title="@lang('buildings.trade_office')" align="left" /> 
   @lang('manual/buildings.trade_office_desc', ['br' => '<br />'])
   <br /><br /><br /><b>@lang('manual/buildings.tribe_advantage'):</b><br /> 
   @lang('manual/buildings.trade_office_tribe_advantage'). <br /> <br /> 
   @lang('manual/buildings.costs_and_time', ['b' => '<b>', '_b' => '</b>']):<br />
   <img src={{ asset('images/manual/resources/1.gif') }} width=18 height=12 alt="@lang('resources.lumber')" title="@lang('resources.lumber')" style="padding-top: 4px" /> 1400 | <img
      src={{ asset('images/manual/resources/2.gif') }} width=18 height=12 alt="@lang('resources.clay')"
      title="@lang('resources.clay')"> 1330 | <img src="{{ asset('images/manual/resources/3.gif') }}" width=18 height=12
      alt="@lang('resources.iron')" title="@lang('resources.iron')"> 1200 | <img
      src={{ asset('images/manual/resources/4.gif') }} width=18 height=12 alt="@lang('resources.crop')"
      title="@lang('resources.crop')"> 400 | <img src={{ asset('images/manual/resources/5.gif') }} width=18 height=12
      alt="@lang('resources.crop_consumption')" title="@lang('resources.crop_consumption')"> 3 | <img
      src={{ asset('images/manual/buildings/clock.gif') }} width=18 height=12> 0:50:00 <br /> <br /> <b>
   @lang('manual/buildings.prerequisites'): </b> <br /> @lang('buildings.marketplace') @lang('buildings.level') 20, @lang('buildings.stable') @lang('buildings.level') 10
</p>
<h2>@lang('buildings.tournament_square')</h2>
<p>
   <img src="{{ asset('images/manual/buildings/gid14.gif') }}" width=166 height=150 border=0
      alt="@lang('buildings.tournament_square')" title="@lang('buildings.tournament_square')" align="left" />
   @lang('manual/buildings.tournament_square_desc')
   <br /><br />
   @lang('manual/buildings.costs_and_time', ['b' => '<b>', '_b' => '</b>']):<br />
   <img src={{ asset('images/manual/resources/1.gif') }} width=18
      height=12 alt="@lang('resources.lumber')" title="@lang('resources.lumber')"
      style="padding-top: 4px" /> 1750 | <img src={{ asset('images/manual/resources/2.gif') }} width=18
      height=12 alt="@lang('resources.clay')" title="@lang('resources.clay')"> 2250 | <img
      src="{{ asset('images/manual/resources/3.gif') }}" width=18 height=12 alt="@lang('resources.iron')"
      title="@lang('resources.iron')"> 1530 | <img src={{ asset('images/manual/resources/4.gif') }} width=18 height=12
      alt="@lang('resources.crop')" title="@lang('resources.crop')"> 240 | <img
      src={{ asset('images/manual/resources/5.gif') }} width=18 height=12 alt="@lang('resources.crop_consumption')"
      title="@lang('resources.crop_consumption')"> 1 | <img src={{ asset('images/manual/buildings/clock.gif') }} width=18
      height=12> 0:58:20 <br /> <br /> <b> @lang('manual/buildings.prerequisites'): </b> <br /> @lang('buildings.rally_point')
   @lang('buildings.level') 15
</p>
<div class="clear"></div>
@endcomponent