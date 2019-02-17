{if "ENABLE_NEWSBOX1"|get_config}
{include file={$smarty.const.TEMPLATES_DIR}|cat:'news\newsbox1.tpl'}
{/if}

{if "ENABLE_NEWSBOX2"|get_config}
{include file={$smarty.const.TEMPLATES_DIR}|cat:'news\newsbox2.tpl'}
{/if}

{if "ENABLE_NEWSBOX3"|get_config}
{include file={$smarty.const.TEMPLATES_DIR}|cat:'news\newsbox3.tpl'}
{/if}
