<h5><img src="../../assets/images/en/t2/newsbox1.gif" alt="newsbox 1"></h5>

{assign var = peaceSystem value = [
						{$smarty.const.PEACE_NONE},
						{$smarty.const.PEACE_NORMAL},
						{$smarty.const.PEACE_CHRISTMAS}, 
						{$smarty.const.PEACE_NEW_YEAR}, 
						{$smarty.const.PEACE_EASTER}, 
						{$smarty.const.PEACE_MAINTENANCE}]}

{assign var = startDate value = " "|explode:{"START_DATE_TIME"|get_config}}
<div class="news">
	<table>
		<tr>
			<td align="left"><b>Online Users</b></td>
			<td>: <font color="Red"><b>{$serverInfo->getOnlineUsers()|default:0} user(s)</b></font></td>
		</tr>
		<tr>
			<td><b>Server Speed</b></td>
			<td><b>: <font color="Red">{"SERVER_SPEED"|get_config}x</font></b></td>
		</tr>
		<tr>
			<td><b>Troop Speed</b></td>
			<td><b>: <font color="Red">{"TROOP_SPEED"|get_config}x</font></b></td>
		</tr>
		<tr>
			<td><b>Map Size</b></td>
			<td><b>: <font color="Red">{"WORLD_SIZE"|get_config}x{"WORLD_SIZE"|get_config}</font></b></td>
		</tr>
		<tr>
			<td><b>Village Exp.</b></td>
			<td><b>: <font color="Red">{if {"VILLAGE_EXPANSION"|get_config}} {$smarty.const.EXP_FAST} {else} {$smarty.const.EXP_SLOW} {/if}</font></b></td>
		</tr>
		<tr>
			<td><b>Beginners Prot.</b></td>
			<td><b>: <font color="Red">{"PROTECTION_TIME"|get_config / 3600} {$smarty.const.HOURS}</font></b></td>
		</tr>
		<tr>
			<td><b>Medal Interval</b></td>
			<td><b>: <font color="Red">{"MEDAL_INTERVAL"|get_config / 86400} {if {"MEDAL_INTERVAL"|get_config} >= 86400} {$smarty.const.DAYS} {else} {$smarty.const.HOURS} {/if}</font></b></td>
		</tr>
		<tr>
			<td><b>Start Date</b></td>
			<td><b>: <font color="Red">{$startDate[0]}</font></b></td>
		</tr>
		<tr>
			<td><b>Start Time</b></td>
			<td><b>: <font color="Red">{$startDate[1]}</font></b></td>
		</tr>
		<tr>
			<td><b>Peace type</b></td>
			<td><b>: <font color="Red">{$peaceSystem[{"PEACE_TYPE"|get_config}]}</font></b></td>
		</tr>
		<tr>
			<td><b>Best Player</b></td>
			<td><b>:  <font color="Red">{$serverInfo->getTopRanked()|default:$smarty.const.NOBODY}</font></b></td>
		</tr>
	</table>
</div>
