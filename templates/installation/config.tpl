<form action="database" method="post">
   <p>
      <span class="f10 c">SERVER OPTIONS</span>
   <table>
      <tr>
         <td>
            <span class="f9 c6">Server name:</span>
         </td>
         <td width="140">
            <input type="text" name="server_name" value="Travianz">
         </td>
      </tr>
      <tr>
         <td>
            <span class="f9 c6">Server timezone:</span>
         </td>
         <td>
            <select name="timezone">
               <option value="Africa/Dakar">Africa</option>
               <option value="America/New_York">America</option>
               <option value="Antarctica/Casey">Antarctica</option>
               <option value="Arctic/Longyearbyen">Arctic</option>
               <option value="Asia/Kuala_Lumpur">Asia</option>
               <option value="Atlantic/Azores">Atlantic</option>
               <option value="Australia/Melbourne" >Australia</option>
               <option value="Europe/London">Europe (London)</option>
               <option value="Europe/Rome" selected="selected">Europe (Rome)</option>
               <option value="Indian/Maldives">Indian</option>
               <option value="Pacific/Fiji">Pacific</option>
            </select>
         </td>
      </tr>
      <tr>
         <td>
            <span class="f9 c6">Server speed:</span>
         </td>
         <td>
            <input name="server_speed" type="number" class="input_number" min="1" value="1">
         </td>
      </tr>
      <tr>
         <td>
            <span class="f9 c6">Troop speed:</span>
         </td>
         <td width="140">
            <input name="troop_speed" type="number" class="input_number" min="1" value="1">
         </td>
      </tr>
      <tr>
         <td>
            <span class="f9 c6">Evasion speed:</span>
         </td>
         <td>
            <input name="evasion_speed" type="number" class="input_number" min="1" value="1">
         </td>
      </tr>
      <tr>
         <td>
            <span class="f9 c6">Trader capacity multiplier:</span>
         </td>
         <td width="140">
            <input type="number" name="trader_capacity_multiplier" class="input_number" min="1" value="1">
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">Cranny capacity multiplier:</span></td>
         <td width="140"><input type="number" name="cranny_capacity_multiplier" class="input_number" min="1" value="1"></td>
      </tr>
      <tr>
         <td><span class="f9 c6">Trapper capacity multiplier:</span></td>
         <td width="140"><input type="number" name="trapper_capacity_multiplier" class="input_number" min="1" value="1"></td>
      </tr>
      <tr>
         <td><span class="f9 c6">Storage capacity multipler:</span></td>
         <td width="140"><input type="number" name="storage_capacity_multiplier" class="input_number" min="1" value="1"></td>
      </tr>
      <tr>
         <td><span class="f9 c6">Required culture points multipler:</span></td>
         <td width="140"><input type="number" name="cp_req_multiplier" class="input_number" min="1" value="1"></td>
      </tr>
      <tr>
         <td><span class="f9 c6">World size:</span></td>
         <td>
            <select name="world_size">
               <option value="10">10x10</option>
               <option value="25">25x25</option>
               <option value="50">50x50</option>
               <option value="100" selected="selected">100x100</option>
               <option value="150">150x150</option>
               <option value="200">200x200</option>
               <option value="250">250x250</option>
               <option value="300">300x300</option>
               <option value="350">350x350</option>
               <option value="400">400x400</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">Registration open:</span></td>
         <td>
            <select name="registration_open">
               <option value="true" selected="selected">true</option>
               <option value="false">false</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">Show admin in statistics:</span></td>
         <td>
            <select name="stat_admin">
               <option value="true" selected="selected">true</option>
               <option value="false">false</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">Domain:</span></td>
         <td><input name="domain" type="text" value="http://{$smarty.server.SERVER_NAME}/"></td>
      </tr>
      <tr>
         <td><span class="f9 c6">Beginners protection length:</span></td>
         <td>
            <select name="protection_time">
               <option value="7200">2 hours</option>
               <option value="10800">3 hours</option>
               <option value="18000">5 hours</option>
               <option value="28800">8 hours</option>
               <option value="36000">10 hours</option>
               <option value="43200" selected="selected">12 hours</option>
               <option value="86400">24 hours (1 day)</option>
               <option value="172800">48 hours (2 days)</option>
               <option value="259200">72 hours (3 days)</option>
               <option value="432000">120 hours (5 days)</option>
            </select>
         </td>
      </tr>
      <tr>
      <tr class="hover">
         <td><span class="f9 c6">Medal interval:</span></td>
         <td>
            <select name="medal_interval">
               <option value="0">none</option>
               <option value="3600 * 24">1 day</option>
               <option value="3600 * 24 * 2">2 days</option>
               <option value="3600 * 24 * 3">3 days</option>
               <option value="3600 * 24 * 4">4 days</option>
               <option value="3600 * 24 * 5">5 days</option>
               <option value="3600 * 24 * 6">6 days</option>
               <option value="3600 * 24 * 7" selected="selected">7 days</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">Peace type:</span></td>
         <td>
            <select name="peace_type">
               <option value="0" selected="selected">None</option>
               <option value="1">Normal</option>
               <option value="2">Christmas</option>
               <option value="3">New Year</option>
               <option value="4">Easter</option>
            </select>
         </td>
      </tr>
   </table>
   <p>
      <span class="f10 c">NATARS OPTIONS</span>
   <table>
      <tr>
         <td><span class="f9 c6">Natars' units multiplier:</span></td>
         <td width="140"><input type="number" name="natars_unit_multiplier" class="input_number" min="1" value="1"></td>
      </tr>
      <tr>
         <td><span class="f9 c6">Natars' spawn date:</span></td>
         <td width="140"><input type="date" name="natars_spawn_date" value="{$smarty.now|date_format:'Y-m-d'}" min="{$smarty.now|date_format:'Y-m-d'}" size="3"></td>
      </tr>
      <tr>
         <td><span class="f9 c6">Natars' spawn time:</span></td>
         <td width="140"><input type="time" name="natars_spawn_time" value="{$smarty.now|date_format:'H:i:s'}" min="{$smarty.now|date_format:'H:i:s'}" size="3"></td>
      </tr>
      <tr>
         <td><span class="f9 c6">World Wonders spawn date:</span></td>
         <td width="140"><input type="date" name="natars_ww_spawn_date" value="{$smarty.now|date_format:'Y-m-d'}" min="{$smarty.now|date_format:'Y-m-d'}" size="3"></td>
      </tr>
      <tr>
         <td><span class="f9 c6">World Wonders spawn time:</span></td>
         <td width="140"><input type="time" name="natars_ww_spawn_time" value="{$smarty.now|date_format:'H:i:s'}" min="{$smarty.now|date_format:'H:i:s'}" size="3"></td>
      </tr>
      <tr>
         <td><span class="f9 c6">World Wonders building plan spawn date:</span></td>
         <td width="140"><input type="date" name="natars_buildingplan_spawn_date" value="{$smarty.now|date_format:'Y-m-d'}" min="{$smarty.now|date_format:'Y-m-d'}" size="3"></td>
      </tr> 
      <tr>
         <td><span class="f9 c6">World Wonders building plan spawn time:</span></td>
         <td width="140"><input type="time" name="natars_buildingplan_spawn_time" value="{$smarty.now|date_format:'H:i:s'}" min="{$smarty.now|date_format:'H:i:s'}" size="3"></td>
      </tr>
      <tr>
         <td><span class="f9 c6">Show World Wonders statistics:</span></td>
         <td>
            <select name="stat_world_wonder">
               <option value="true">true</option>
               <option value="false" selected="selected">false</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">Show Natars in statistics:</span></td>
         <td>
            <select name="stat_natars">
               <option value="true">true</option>
               <option value="false" selected="selected">false</option>
            </select>
         </td>
      </tr>
   </table>
   <p>
      <span class="f10 c">OASES OPTIONS</span>
   <table>
      <tr>
         <td><span class="f9 c6">Wood production multiplier:</span></td>
         <td width="140"><input type="number" name="oasis_wood_multiplier" class="input_number" min="1" value="1"></td>
      </tr>
      <tr>
         <td><span class="f9 c6">Clay production multiplier:</span></td>
         <td width="140"><input type="number" name="oasis_clay_multiplier" class="input_number" min="1" value="1"></td>
      </tr>
      <tr>
         <td><span class="f9 c6">Iron production multiplier:</span></td>
         <td width="140"><input type="number" name="oasis_iron_multiplier" class="input_number" min="1" value="1"></td>
      </tr>
      <tr>
         <td><span class="f9 c6">Crop production multiplier:</span></td>
         <td width="140"><input type="number" name="oasis_crop_multiplier" class="input_number" min="1" value="1"></td>
      </tr>
       <tr>
         <td><span class="f9 c6">Animals respawn multiplier:</span></td>
         <td width="140"><input type="number" name="oasis_respawn_multiplier" class="input_number" min="1" value="1"></td>
      </tr>
      <tr>
         <td><span class="f9 c6">Animals troop multiplier:</span></td>
         <td width="140"><input type="number" name="oasis_troop_multiplier" class="input_number" min="1" value="1"></td>
      </tr>
   </table>
   <p>
      <span class="f10 c">SQL RELATED</span>
   <table>
      <tr>
         <td><span class="f9 c6">Hostname:</span></td>
         <td><input name="sql_hostname" type="text" value="localhost"></td>
      </tr>
      <tr>
         <td><span class="f9 c6">Port:</span></td>
         <td><input name="sql_port" type="text" value="3306"></td>
      </tr>
      <tr>
         <td><span class="f9 c6">Username:</span></td>
         <td><input name="sql_user" type="text" value="root"></td>
      </tr>
      <tr>
         <td><span class="f9 c6">Password:</span></td>
         <td><input name="sql_pass" type="password"></td>
      </tr>
      <tr>
         <td><span class="f9 c6">Database name:</span></td>
         <td><input name="sql_db" type="text"></td>
      </tr>
   </table>
   <p>
      <span class="f10 c">PLUS FEATURES</span>
   <table>
      <tr>
         <td><span class="f9 c6">Plus account length:</span></td>
         <td>
            <select name="plus_account_duration">
               <option value="3600 * 12">12 hours</option>
               <option value="3600 * 24">1 day</option>
               <option value="3600 * 24 * 2">2 days</option>
               <option value="3600 * 24 * 3">3 days</option>
               <option value="3600 * 24 * 4">4 days</option>
               <option value="3600 * 24 * 5">5 days</option>
               <option value="3600 * 24 * 6">6 days</option>
               <option value="3600 * 24 * 7" selected="selected">7 days</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">+25% production length:</span></td>
         <td>
            <select name="plus_production_duration">
               <option value="3600 * 12">12 hours</option>
               <option value="3600 * 24">1 day</option>
               <option value="3600 * 24 * 2">2 days</option>
               <option value="3600 * 24 * 3">3 days</option>
               <option value="3600 * 24 * 4">4 days</option>
               <option value="3600 * 24 * 5">5 days</option>
               <option value="3600 * 24 * 6">6 days</option>
               <option value="3600 * 24 * 7" selected="selected">7 days</option>
            </select>
         </td>
      </tr>
   </table>
   <p>
      <span class="f10 c">NEWSBOX OPTIONS</span>
   <table>
      <tr>
         <td><span class="f9 c6">Newsbox 1:</span></td>
         <td>
            <select name="enable_newsbox1">
               <option value="true">Enabled</option>
               <option value="false" selected="selected">Disabled</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">Newsbox 2:</span></td>
         <td>
            <select name="enable_newsbox2">
               <option value="true">Enabled</option>
               <option value="false" selected="selected">Disabled</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">Newsbox 3:</span></td>
         <td>
            <select name="enable_newsbox3">
               <option value="true">Enabled</option>
               <option value="false" selected="selected">Disabled</option>
            </select>
         </td>
      </tr>
   </table>
   <p>
      <span class="f10 c">LOGS</span>
   <table>
      <tr>
         <td><span class="f9 c6">Building:</span></td>
         <td>
            <select name="log_building">
               <option value="true">Yes</option>
               <option value="false" selected="selected">No</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">Researches:</span></td>
         <td>
            <select name="log_researches">
               <option value="true">Yes</option>
               <option value="false" selected="selected">No</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">IP:</span></td>
         <td>
            <select name="log_IP">
               <option value="true">Yes</option>
               <option value="false" selected="selected">No</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">Gold:</span></td>
         <td>
            <select name="log_gold">
               <option value="true">Yes</option>
               <option value="false" selected="selected">No</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">Admin:</span></td>
         <td>
            <select name="log_admin">
               <option value="true">Yes</option>
               <option value="false" selected="selected">No</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">Multihunter:</span></td>
         <td>
            <select name="log_multihunter">
               <option value="true">Yes</option>
               <option value="false" selected="selected">No</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">Market movement:</span></td>
         <td>
            <select name="log_market_movement">
               <option value="true">Yes</option>
               <option value="false" selected="selected">No</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">Troop training:</span></td>
         <td>
            <select name="log_troop_training">
               <option value="true">Yes</option>
               <option value="false" selected="selected">No</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">Login:</span></td>
         <td>
            <select name="log_login">
               <option value="true">Yes</option>
               <option value="false" selected="selected">No</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">Logout:</span></td>
         <td>
            <select name="log_logout">
               <option value="true">Yes</option>
               <option value="false" selected="selected">No</option>
            </select>
         </td>
      </tr>
   </table>
   <p>
      <span class="f10 c">EXTRA OPTIONS</span>
   <table>
      <tr>
         <td><span class="f9 c6">Quest:</span></td>
         <td>
            <select name="quest_enabled">
               <option value="true" selected="selected">Yes</option>
               <option value="false">No</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">Activation required:</span></td>
         <td>
            <select name="email_auth">
               <option value="true">Yes</option>
               <option value="false" selected="selected">No</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">Limit mailbox:</span></td>
         <td>
            <select name="mailbox_enable_limit">
               <option value="true">Yes</option>
               <option value="false" selected="selected">No</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">Mailbox limit:</span></td>
         <td><input type="number" name="mailbox_limit" class="input_number" min="10" value="30"></td>
      </tr>
      <tr>
         <td><span class="f9 c6">Required demolish level:</span></td>
         <td>
            <select name="req_demolish_level">
               <option value="5">5</option>
               <option value="10" selected="selected">10</option>
               <option value="15">15</option>
               <option value="20">20</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">Village Expansion:</span></td>
         <td>
            <select name="village_expansion">
               <option value="1" selected="selected">Slow</option>
               <option value="0">Fast</option>
            </select>
         </td>
      </tr>
      <tr>
         <td><span class="f9 c6">Error Reporting:</span></td>
         <td>
            <select name="error_reporting">
               <option value="error_reporting (E_ALL ^ E_NOTICE ^ E_DEPRECATED);" selected="selected">Yes</option>
               <option value="error_reporting (0);">No</option>
            </select>
         </td>
      </tr>
   </table>
   <br />
   <span class="f10 c">Server Start Settings</span>
   <table>
      <tr>
         <td><span class="f9 c6">Start date:</span></td>
         <td width="140"><input type="date" name="start_date" value="{$smarty.now|date_format:'Y-m-d'}" min="{$smarty.now|date_format:'Y-m-d'}"></td>
      </tr>
      <tr>
         <td><span class="f9 c6">Start time:</span></td>
         <td width="140"><input type="time" name="start_time" value="{$smarty.now|date_format:'H:i:s'}"></td>
      </tr>
   </table>
   <br />
   <div style="text-align: center">
   	<button id="btn_train" name="action" class="trav_buttons" value="saveConfig" onclick="setTimeout('this.disabled=true', 1);"> Save Config </button>
   </div>
</form>
</div>
