@component('installation.layout')
<form method="post" action="{{ route('installation.config.store') }}">
	@csrf
   <p>
      <span class="f10 c">@lang('installation/config.server_options.title')</span>
   <table>
      <tr>
         <td>
            <span class="f9 c6">@lang('installation/config.server_options.name'):</span>
         </td>
         <td width="140">
            <input type="text" pattern=".{3,30}" name="server[name]" value="{{ old('server.name','Travianz') }}" required>
            <div class="error">{{ $errors->first('server.name') }}</div>
         </td>
      </tr>
      <tr>
         <td>
            <span class="f9 c6">@lang('installation/config.server_options.timezone'):</span>
         </td>
         <td>
            <select name="server[timezone]">
               <option value="Africa/Dakar" {{ old('server.timezone') == 'Africa/Dakar' ? 'selected' : '' }}>@lang('installation/config.server_options.timezones.africa')</option>
               <option value="America/New_York" {{ old('server.timezone') == 'America/New_York' ? 'selected' : '' }}>@lang('installation/config.server_options.timezones.america')</option>
               <option value="Antarctica/Casey" {{ old('server.timezone') == 'Antarctica/Casey' ? 'selected' : '' }}>@lang('installation/config.server_options.timezones.antarctica')</option>
               <option value="Asia/Kuala_Lumpur" {{ old('server.timezone') == 'Asia/Kuala_Lumpur' ? 'selected' : '' }}>@lang('installation/config.server_options.timezones.asia')</option>
               <option value="Atlantic/Azores" {{ old('server.timezone') == 'Atlantic/Azores' ? 'selected' : '' }}>@lang('installation/config.server_options.timezones.atlantic')</option>
               <option value="Australia/Melbourne" {{ old('server.timezone') == 'Australia/Melbourne' ? 'selected' : '' }}>@lang('installation/config.server_options.timezones.australia')</option>
               <option value="Europe/London" {{ old('server.timezone') == 'Europe/London' ? 'selected' : '' }}>@lang('installation/config.server_options.timezones.europe_london')</option>
               <option value="Europe/Rome" {{ old('server.timezone', 'Europe/Rome') == 'Europe/Rome'  ? 'selected' : '' }}>@lang('installation/config.server_options.timezones.europe_rome')</option>
               <option value="Indian/Maldives" {{ old('server.timezone') == 'Indian/Maldives' ? 'selected' : '' }}>@lang('installation/config.server_options.timezones.indian')</option>
               <option value="Pacific/Fiji" {{ old('server.timezone') == 'Pacific/Fiji' ? 'selected' : '' }}>@lang('installation/config.server_options.timezones.pacific')</option>
            </select>
            <div class="error">{{ $errors->first('server.timezone') }}</div>
         </td>
      </tr>
      <tr>
         <td>
            <span class="f9 c6">@lang('installation/config.server_options.speed'):</span>
         </td>
         <td>
            <input name="server[speed]" type="number" class="input_number" min="1" max="9999999" value="{{ old('server.speed', 1) }}">
         	<div class="error">{{ $errors->first('server.speed') }}</div>
         </td>
      </tr>
      <tr>
         <td>
            <span class="f9 c6">@lang('installation/config.server_options.troops_speed'):</span>
         </td>
         <td width="140">
            <input name="server[troops_speed]" type="number" class="input_number" min="1" max="9999999" value="{{ old('server.troops_speed', 1) }}">
         	<div class="error">{{ $errors->first('server.troops_speed') }}</div>
         </td>
      </tr>
      <tr>
         <td>
            <span class="f9 c6">@lang('installation/config.server_options.evasion_speed'):</span>
         </td>
         <td>
            <input name="server[evasion_speed]" type="number" class="input_number" min="1" max="9999999" value="{{ old('server.evasion_speed', 1) }}">
         	<div class="error">{{ $errors->first('server.evasion_speed') }}</div>
         </td>
      </tr>
      <tr>
         <td>
            <span class="f9 c6">@lang('installation/config.server_options.trader_capacity_multiplier'):</span>
         </td>
         <td width="140">
            <input type="number" name="server[trader_capacity_multiplier]" class="input_number" min="1" max="9999999" value="{{ old('server.trader_capacity_multiplier', 1) }}">
         	<div class="error">{{ $errors->first('server.trader_capacity_multiplier') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.server_options.cranny_capacity_multiplier'):</span></td>
         <td width="140">
         	<input type="number" name="server[cranny_capacity_multiplier]" class="input_number" min="1" max="9999999" value="{{ old('server.cranny_capacity_multiplier', 1) }}">
         	<div class="error">{{ $errors->first('server.cranny_capacity_multiplier') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.server_options.trapper_capacity_multiplier'):</span></td>
         <td width="140">
         	<input type="number" name="server[trapper_capacity_multiplier]" class="input_number" min="1" max="9999999" value="{{ old('server.trapper_capacity_multiplier', 1) }}">
         	<div class="error">{{ $errors->first('server.trapper_capacity_multiplier') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.server_options.storage_capacity_multiplier'):</span></td>
         <td width="140">
         	<input type="number" name="server[storage_capacity_multiplier]" class="input_number" min="1" max="9999999" value="{{ old('server.storage_capacity_multiplier', 1) }}">
         	<div class="error">{{ $errors->first('server.storage_capacity_multiplier') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.server_options.culture_points_multiplier'):</span></td>
         <td width="140">
         	<input type="number" name="server[culture_points_multiplier]" class="input_number" min="1" max="9999999" value="{{ old('server.culture_points_multiplier', 1) }}">
         	<div class="error">{{ $errors->first('server.culture_points_multiplier') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.server_options.world_size'):</span></td>
         <td>
            <select name="server[world_size]">
               <option value="25" {{ old('server.world_size') == 25 ? 'selected' : '' }}>25x25</option>
               <option value="50" {{ old('server.world_size') == 50 ? 'selected' : '' }}>50x50</option>
               <option value="100" {{ old('server.world_size', 100) == 100 ? 'selected' : '' }}>100x100</option>
               <option value="150" {{ old('server.world_size') == 150 ? 'selected' : '' }}>150x150</option>
               <option value="200" {{ old('server.world_size') == 200 ? 'selected' : '' }}>200x200</option>
               <option value="250" {{ old('server.world_size') == 250 ? 'selected' : '' }}>250x250</option>
               <option value="300" {{ old('server.world_size') == 300 ? 'selected' : '' }}>300x300</option>
               <option value="350" {{ old('server.world_size') == 350 ? 'selected' : '' }}>350x350</option>
               <option value="400" {{ old('server.world_size') == 400 ? 'selected' : '' }}>400x400</option>
            </select>
         	<div class="error">{{ $errors->first('server.world_size') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.server_options.registrations_open'):</span></td>
         <td>
            <select name="server[registrations_open]">
               <option value="1" {{ old('server.registrations_open', '1') == '1' ? 'selected' : '' }}">@lang('installation/config.yes')</option>
               <option value="0" {{ old('server.registrations_open') == '0' ? 'selected' : '' }}">@lang('installation/config.no')</option>
            </select>
         	<div class="error">{{ $errors->first('server.registrations_open') }}</div>
         </td>
      </tr>
      <tr>
        <td><span class="f9 c6">@lang('installation/config.server_options.email_verification'):</span></td>
        <td>
            <select name="server[email_verification]">
                <option value="1" {{ old('server.email_verification', '1') == '1' ? 'selected' : '' }}">@lang('installation/config.yes')</option>
                <option value="0" {{ old('server.email_verification') == '0' ? 'selected' : '' }}">@lang('installation/config.no')</option>
            </select>
            <div class="error">{{ $errors->first('server.email_verification') }}</div>
        </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.server_options.show_admin_in_statistics'):</span></td>
         <td>
            <select name="server[admin_statistics]">
               <option value="1" {{ old('server.admin_statistics', '1') == '1' ? 'selected' : '' }}>@lang('installation/config.yes')</option>
               <option value="0" {{ old('server.admin_statistics') == '0' ? 'selected' : '' }}>@lang('installation/config.no')</option>
            </select>
         	<div class="error">{{ $errors->first('server.admin_statistics') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.server_options.beginners_protection_length'):</span></td>
         <td width="140">
         	<input type="number" name="server[beginners_protection]" class="input_number" min="0" max="720" value="{{ old('server.beginners_protection', 12) }}">
         	<label>@choice('installation/config.hour', 2)</label>
         	<div class="error">{{ $errors->first('server.beginners_protection') }}</div>
         </td>
      </tr>
      <tr>
      <tr class="hover">
         <td><span class="f9 c6">@lang('installation/config.server_options.medals_interval'):</span></td>
         <td>
            <input type="number" name="server[medals_interval]" class="input_number" min="1" max="720" value="{{ old('server.medals_interval', 168) }}">
         	<label>@choice('installation/config.hour', 2)</label>
         	<div class="error">{{ $errors->first('server.medals_interval') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.server_options.peace_type.title'):</span></td>
         <td>
            <select name="server[peace_type]">
               <option value="0" {{ old('server.peace_type', 0) == 0 ? 'selected' : '' }}>@lang('installation/config.server_options.peace_type.none')</option>
               <option value="1" {{ old('server.peace_type') == 1 ? 'selected' : '' }}>@lang('installation/config.server_options.peace_type.normal')</option>
               <option value="2" {{ old('server.peace_type') == 2 ? 'selected' : '' }}>@lang('installation/config.server_options.peace_type.christmas')</option>
               <option value="3" {{ old('server.peace_type') == 3 ? 'selected' : '' }}>@lang('installation/config.server_options.peace_type.new_year')</option>
               <option value="4" {{ old('server.peace_type') == 4 ? 'selected' : '' }}>@lang('installation/config.server_options.peace_type.easter')</option>
            </select>
         	<div class="error">{{ $errors->first('server.peace_type') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.server_options.start_date'):</span></td>
         <td width="140">
         	<input type="date" name="server[start_date]" value="{{ old('server.start_date', now()->format('Y-m-d')) }}" min="{{ now()->format('Y-m-d') }}">
        		<div class="error">{{ $errors->first('server.start_date') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.server_options.start_time'):</span></td>
         <td width="140">
         	<input type="time" name="server[start_time]" value="{{ old('server.start_time', now()->format('H:i:s')) }}">
         	<div class="error">{{ $errors->first('server.start_time') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.server_options.quest'):</span></td>
         <td>
            <select name="server[quest]">
              <option value="1" {{ old('server.quest', '1') == '1' ? 'selected' : '' }}>@lang('installation/config.enabled')</option>
              <option value="0" {{ old('server.quest') == '0' ? 'selected' : '' }}>@lang('installation/config.disabled')</option>
            </select>
         	<div class="error">{{ $errors->first('server.quest') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.server_options.demolish_level'):</span></td>
         <td>
         	<input type="number" name="server[demolish_level]" class="input_number" min="1" max="20" value="{{ old('server.demolish_level', 10) }}">
         	<div class="error">{{ $errors->first('server.demolish_level') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.server_options.village_expansion'):</span></td>
         <td>
            <select name="server[village_expansion]">
               <option value="0" {{ old('server.village_expansion', '1') == '1' ? 'selected' : '' }}>@lang('installation/config.slow')</option>
               <option value="1" {{ old('server.village_expansion') == '0' ? 'selected' : '' }}>@lang('installation/config.fast')</option>
            </select>
         	<div class="error">{{ $errors->first('server.village_expansion') }}</div>
         </td>
      </tr>
   </table>
   <p>
      <span class="f10 c">@lang('installation/config.natars_options.title')</span>
   <table>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.natars_options.units_multiplier'):</span></td>
         <td width="140">
         <input type="number" name="natars[units_multiplier]" class="input_number" min="1" max="9999999" value="{{ old('natars.units_multiplier', 1) }}">
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.natars_options.artefacts_release_date'):</span></td>
         <td width="140">
         	<input type="date" name="natars[artefacts_release_date]" value="{{ old('natars.artefacts_release_date', now()->format('Y-m-d')) }}" size="3">
         	<div class="error">{{ $errors->first('natars.artefacts_release_date') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.natars_options.artefacts_release_time'):</span></td>
         <td width="140">
         	<input type="time" name="natars[artefacts_release_time]" value="{{ old('natars.artefacts_release_time', now()->format('H:i:s')) }}" size="3">
         	<div class="error">{{ $errors->first('natars.artefacts_release_time') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.natars_options.world_wonders_release_date'):</span></td>
         <td width="140">
         	<input type="date" name="natars[ww_release_date]" value="{{ old('natars.ww_release_date', now()->format('Y-m-d')) }}" size="3">
         	<div class="error">{{ $errors->first('natars.ww_release_date') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.natars_options.world_wonders_release_time'):</span></td>
         <td width="140">
         	<input type="time" name="natars[ww_release_time]" value="{{ old('natars.ww_release_time', now()->format('H:i:s')) }}" size="3">
         	<div class="error">{{ $errors->first('natars.ww_release_time') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.natars_options.building_plans_release_date'):</span></td>
         <td width="140">
         	<input type="date" name="natars[building_plans_release_date]" value="{{ old('natars.building_plans_release_date', now()->format('Y-m-d')) }}" size="3">
         	<div class="error">{{ $errors->first('natars.building_plans_release_date') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.natars_options.building_plans_release_time'):</span></td>
         <td width="140">
         	<input type="time" name="natars[building_plans_release_time]" value="{{ old('natars.building_plans_release_time', now()->format('H:i:s')) }}" size="3">
         	<div class="error">{{ $errors->first('natars.building_plans_release_time') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.natars_options.show_in_statistics'):</span></td>
         <td>
            <select name="natars[statistics]">
               <option value="1" {{ old('natars.statistics', '1') == '1' ? 'selected' : '' }}>@lang('installation/config.yes')</option>
               <option value="0" {{ old('natars.statistics') == '0' ? 'selected' : '' }}>@lang('installation/config.no')</option>
            </select>
         	<div class="error">{{ $errors->first('natars.statistics') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.natars_options.show_world_wonders_statistics'):</span></td>
         <td>
            <select name="natars[world_wonders_statistics]">
               <option value="1" {{ old('natars.world_wonders_statistics', '1') == '1' ? 'selected' : '' }}>@lang('installation/config.yes')</option>
               <option value="0" {{ old('natars.world_wonders_statistics') == '0' ? 'selected' : '' }}>@lang('installation/config.no')</option>
            </select>
         	<div class="error">{{ $errors->first('natars.world_wonders_statistics') }}</div>
         </td>
      </tr>
   </table>
   <p>
      <span class="f10 c">@lang('installation/config.oases_options.title')</span>
   <table>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.oases_options.lumber_production_multiplier'):</span></td>
         <td width="140">
         	<input type="number" name="oases[lumber_production_multiplier]" class="input_number" min="1" max="9999999" value="{{ old('oases.lumber_production_multiplier', 1) }}">
         	<div class="error">{{ $errors->first('oases.lumber_production_multiplier') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.oases_options.clay_production_multiplier'):</span></td>
         <td width="140">
         	<input type="number" name="oases[clay_production_multiplier]" class="input_number" min="1" max="9999999" value="{{ old('oases.clay_production_multiplier', 1) }}">
         	<div class="error">{{ $errors->first('oases.clay_production_multiplier') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.oases_options.iron_production_multiplier'):</span></td>
         <td width="140">
         	<input type="number" name="oases[iron_production_multiplier]" class="input_number" min="1" max="9999999" value="{{ old('oases.iron_production_multiplier', 1) }}">
         	<div class="error">{{ $errors->first('oases.iron_production_multiplier') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.oases_options.crop_production_multiplier'):</span></td>
         <td width="140">
         	<input type="number" name="oases[crop_production_multiplier]" class="input_number" min="1" max="9999999" value="{{ old('oases.crop_production_multiplier', 1) }}">
         	<div class="error">{{ $errors->first('oases.crop_production_multiplier') }}</div>
         </td>
      </tr>
       <tr>
         <td><span class="f9 c6">@lang('installation/config.oases_options.troops_respawn_multiplier'):</span></td>
         <td width="140">
         	<input type="number" name="oases[troops_respawn_multiplier]" class="input_number" min="1" max="9999999" value="{{ old('oases.troops_respawn_multiplier', 1) }}">
         	<div class="error">{{ $errors->first('oases.troops_respawn_multiplier') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.oases_options.troops_multiplier'):</span></td>
         <td width="140">
         	<input type="number" name="oases[troops_multiplier]" class="input_number" min="1" max="9999999" value="{{ old('oases.troops_multiplier', 1) }}">
         	<div class="error">{{ $errors->first('oases.troops_multiplier') }}</div>
         </td>
      </tr>
   </table>
   <p>
      <span class="f10 c">@lang('installation/config.plus_features.title')</span>
   <table>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.plus_features.plus_account_length'):</span></td>
         <td>
            <input type="number" name="plus[account_duration]" class="input_number" min="1" max="720" value="{{ old('plus.account_duration', 168) }}">
         	<label>@choice('installation/config.hour', 2)</label>
         	<div class="error">{{ $errors->first('plus.account_duration') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">+25% @lang('installation/config.plus_features.production_length'):</span></td>
         <td>
            <input type="number" name="plus[production_duration]" class="input_number" min="1" max="720" value="{{ old('plus.production_duration', 168) }}">
         	<label>@choice('installation/config.hour', 2)</label>
         	<div class="error">{{ $errors->first('plus.production_duration') }}</div>
         </td>
      </tr>
   </table>
   <p>
      <span class="f10 c">@lang('installation/config.newsboxes_options.title')</span>
   <table>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.newsboxes_options.newsbox') 1:</span></td>
         <td>
            <select name="newsboxes[1]">
               <option value="1" {{ old('newsboxes.1') == 1 ? 'selected' : '' }}>@lang('installation/config.enabled')</option>
               <option value="0" {{ old('newsboxes.1', 0) == 0 ? 'selected' : '' }}>@lang('installation/config.disabled')</option>
            </select>
            <div class="error">{{ $errors->first('newsboxes.1') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.newsboxes_options.newsbox') 2:</span></td>
         <td>
            <select name="newsboxes[2]">
               <option value="1" {{ old('newsboxes.2') == 1 ? 'selected' : '' }}>@lang('installation/config.enabled')</option>
               <option value="0" {{ old('newsboxes.2', 0) == 0 ? 'selected' : '' }}>@lang('installation/config.disabled')</option>
            </select>
         </td>
      	<div class="error">{{ $errors->first('newsboxes.2') }}</div>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.newsboxes_options.newsbox') 3:</span></td>
         <td>
            <select name="newsboxes[3]">
               <option value="1" {{ old('newsboxes.3') == 1 ? 'selected' : '' }}>@lang('installation/config.enabled')</option>
               <option value="0" {{ old('newsboxes.3', 0) == 0 ? 'selected' : '' }}>@lang('installation/config.disabled')</option>
            </select>
        		<div class="error">{{ $errors->first('newsboxes.3') }}</div>
         </td>
      </tr>
   </table>
   <p>
      <span class="f10 c">@lang('installation/config.logs.title')</span>
   <table>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.logs.buildings'):</span></td>
         <td>
            <select name="logs[buildings]">
               <option value="1" {{ old('logs.buildings') == 1 ? 'selected' : '' }}>@lang('installation/config.yes')</option>
               <option value="0" {{ old('logs.buildings', 0) == 0 ? 'selected' : '' }}>@lang('installation/config.no')</option>
            </select>
        		<div class="error">{{ $errors->first('logs.buildings') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.logs.researches'):</span></td>
         <td>
            <select name="logs[researches]">
               <option value="1" {{ old('logs.researches') == 1 ? 'selected' : '' }}>@lang('installation/config.yes')</option>
               <option value="0" {{ old('logs.researches', 0) == 0 ? 'selected' : '' }}>@lang('installation/config.no')</option>
            </select>
         	<div class="error">{{ $errors->first('logs.researches') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.logs.upgrades'):</span></td>
         <td>
            <select name="logs[upgrades]">
               <option value="1" {{ old('logs.upgrades') == 1 ? 'selected' : '' }}>@lang('installation/config.yes')</option>
               <option value="0" {{ old('logs.upgrades', 0) == 0 ? 'selected' : '' }}>@lang('installation/config.no')</option>
            </select>
            <div class="error">{{ $errors->first('logs.upgrades') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.logs.ip'):</span></td>
         <td>
            <select name="logs[IP]">
              <option value="1" {{ old('logs.IP') == 1 ? 'selected' : '' }}>@lang('installation/config.yes')</option>
              <option value="0" {{ old('logs.IP', 0) == 0 ? 'selected' : '' }}>@lang('installation/config.no')</option>
            </select>
         	<div class="error">{{ $errors->first('logs.IP') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.logs.gold'):</span></td>
         <td>
            <select name="logs[gold]">
               <option value="1" {{ old('logs.gold') == 1 ? 'selected' : '' }}>@lang('installation/config.yes')</option>
               <option value="0" {{ old('logs.gold', 0) == 0 ? 'selected' : '' }}>@lang('installation/config.no')</option>
            </select>
         	<div class="error">{{ $errors->first('logs.gold') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.logs.admin'):</span></td>
         <td>
            <select name="logs[admin]">
              <option value="1" {{ old('logs.admin') == 1 ? 'selected' : '' }}>@lang('installation/config.yes')</option>
              <option value="0" {{ old('logs.admin', 0) == 0 ? 'selected' : '' }}>@lang('installation/config.no')</option>
            </select>
        		<div class="error">{{ $errors->first('logs.admin') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.logs.market_movements'):</span></td>
         <td>
            <select name="logs[market_movements]">
               <option value="1" {{ old('logs.market_movements') == 1 ? 'selected' : '' }}>@lang('installation/config.yes')</option>
               <option value="0" {{ old('logs.market_movements', 0) == 0 ? 'selected' : '' }}>@lang('installation/config.no')</option>
            </select>
         	<div class="error">{{ $errors->first('logs.market_movements') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.logs.troops_training'):</span></td>
         <td>
            <select name="logs[troops_training]">
               <option value="1" {{ old('logs.troops_training') == 1 ? 'selected' : '' }}>@lang('installation/config.yes')</option>
               <option value="0" {{ old('logs.troops_training', 0) == 0 ? 'selected' : '' }}>@lang('installation/config.no')</option>
            </select>
         	<div class="error">{{ $errors->first('logs.troops_training') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.logs.login'):</span></td>
         <td>
            <select name="logs[login]">
              <option value="1" {{ old('logs.login') == 1 ? 'selected' : '' }}>@lang('installation/config.yes')</option>
              <option value="0" {{ old('logs.login', 0) == 0 ? 'selected' : '' }}>@lang('installation/config.no')</option>
            </select>
        		<div class="error">{{ $errors->first('logs.login') }}</div>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">@lang('installation/config.logs.logout'):</span></td>
         <td>
            <select name="logs[logout]">
              <option value="1" {{ old('logs.logout') == 1 ? 'selected' : '' }}>@lang('installation/config.yes')</option>
              <option value="0" {{ old('logs.logout', 0) == 0 ? 'selected' : '' }}>@lang('installation/config.no')</option>
            </select>
         	<div class="error">{{ $errors->first('logs.logout') }}</div>
         </td>
      </tr>
   </table>
   <br />
   <div style="text-align: center">
   	<button id="btn_train" name="action" class="trav_buttons" value="store" onclick="setTimeout('this.disabled=true', 1);"> @lang('installation/config.save') </button>
   </div>
</form>
@endcomponent
