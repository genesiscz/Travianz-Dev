{assign var=bonusTexts value=[$smarty.const.CURRENT_WOOD_BONUS, $smarty.const.WOOD_BONUS_LEVEL, $smarty.const.PERCENT]}
{include file={$smarty.const.TEMPLATES_DIR}|cat:'village/buildings/show_bonus.blade.php'}
