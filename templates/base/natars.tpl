{if $natarsInfo->getArtefactsReleaseCountDown() !== null}
<div>
	<span><b>{$smarty.const.ARTEFACTS}</b> {$smarty.const.WILL_BE_RELEASED_IN}: </span>
	<span class="timer">{$natarsInfo->getArtefactsReleaseCountDown()}</span>
</div>
{/if}

{if $natarsInfo->getBuildingPlansReleaseCountDown() !== null}
<br /><br />
<div>
	<span><b>{$smarty.const.WW_PLANS_RELEASE}</b> {$smarty.const.WILL_BE_RELEASED_IN}: </span>
	<span class="timer">{$natarsInfo->getBuildingPlansReleaseCountDown()}</span>
</div>
{/if}

{if $natarsInfo->getWorldWondersReleaseCountDown() !== null}
<br /><br />
<div>
	<span><b>{$smarty.const.WW_RELEASE}</b> {$smarty.const.WILL_BE_RELEASED_IN}: </span>
	<span class="timer">{$natarsInfo->getWorldWondersReleaseCountDown()}</span>
</div>
{/if}