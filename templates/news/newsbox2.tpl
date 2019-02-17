<h5><img src="../../assets/images/en/t2/newsbox2.gif" alt="newsbox 2"></h5>
<div class="news">
{assign var = artefactsDate value = " "|explode:{"ARTEFACTS_RELEASE_DATE_TIME"|get_config}}
{assign var = worldWondersDate value = " "|explode:{"WW_RELEASE_DATE_TIME"|get_config}}
{assign var = buildingPlansDate value = " "|explode:{"BUILDING_PLANS_RELEASE_DATE_TIME"|get_config}}
<table>
<tr>
	<td>
		<b>{$smarty.const.ARTEFACTS}</b>
    </td>
	<td>
		<b>: 
			<font color="Red">
    {if $natarsInfo->areArtefactsReleased()}
       {$smarty.const.RELEASED}
    {else}
       {$artefactsDate[0]}
    {/if}
			</font>
    	</b>
    </td>
</tr>
<tr>
	<td>
		<b>{$smarty.const.WORLD_WONDERS}</b>
    </td>
	<td>
		<b>: 
			<font color="Red">
    {if $natarsInfo->areWorldWondersReleased()}
       {$smarty.const.RELEASED}
    {else}
       {$worldWondersDate[0]}
    {/if}
			</font>
    	</b>
    </td>
</tr>
<tr>
	<td>
		<b>{$smarty.const.BUILDING_PLANS}</b>
    </td>
	<td>
		<b>: 
			<font color="Red">
    {if $natarsInfo->areBuildingPlansReleased()}
       {$smarty.const.RELEASED}
    {else}
       {$buildingPlansDate[0]}
    {/if}
			</font>
    	</b>
    </td>
</tr>
</table>
</div>