{assign var=bonusTexts value=[$smarty.const.CURRENT_CLAY_BONUS, $smarty.const.CLAY_BONUS_LEVEL, $smarty.const.PERCENT]}
{include file={$smarty.const.TEMPLATES_DIR}|cat:'village/buildings/show_bonus.blade.php'}
