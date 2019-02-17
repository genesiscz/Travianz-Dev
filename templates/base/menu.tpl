<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        div.c1 
        {
            text-align: center
        }
    </style>
</head>
<body>
	{if !$session->isLoggedIn()}
    	<div id="side_navi">
        	<a id="logo" href="{$smarty.const.HOMEPAGE}"><img src="../../assets/images/x.gif" alt="{$smarty.const.SERVER_NAME}"></a>
        	<p>
        		<a href="index">{$smarty.const.HOME}</a>
        		<a href="login">{$smarty.const.LOGIN}</a>
        		<a href="register">{$smarty.const.REGISTER}</a></p>
    	</div>
	{else}
    <div id="side_navi">
        <a id="logo" href="index"><img src="../../assets/images/x.gif" {if $plus}class="logo_plus"{/if} alt="{$smarty.const.SERVER_NAME}"></a>
        <p><a href="index">{$smarty.const.HOME}</a><a href="profile">{$smarty.const.PROFILE}</a> 
        <a href="#" onclick="return Popup(0, 0, 1);">{$smarty.const.INSTRUCT}</a>
        
        {if $session->getUser()->isMultihunter()}
        	<a href="admin/login"><font color="Blue">Multihunter Panel</font></a>       
        {/if}

		{if $session->getUser()->isAdmin()}
        	<a href="admin/login"><font color="Red">{$smarty.const.ADMIN_PANEL}</font></a>
         <a href="mass">{$smarty.const.MASS_MESSAGE}</a>
         <a href="system">{$smarty.const.SYSTEM_MESSAGE}</a>
		{/if}
		
        <a href="logout">{$smarty.const.LOGOUT}</a></p>

        {if $session->getUser()->getID() > 1}
        	<p>
            	<a href="plus/bonuses">{"SERVER_NAME"|get_config}<b> <span class="plus_g">P</span><span class="plus_o">l</span><span class="plus_g">u</span><span class="plus_o">s</span></b></a>
        	</p>
		{/if}

        <p>
            <a href="rules"><b>{$smarty.const.GAME_RULES}</b></a>
            {if $session->getUser()->getID() > 1}
            	<a href="support"><b>{$smarty.const.SUPPORT}</b></a>
            {/if}

           	{include file={$smarty.const.TEMPLATES_DIR}|cat:'base/links.tpl'}
            {include file={$smarty.const.TEMPLATES_DIR}|cat:'base/natars.tpl'}
        </p>
      <br />
      {if $session->getUser()->getDeletingDate() !== null}
      	<div class="count">
			{if {$session->getUser()->getDeletingDate()|strtotime} > $smarty.now + 172800}
				<a href="profile/account">
					<img class="del" src="../../assets/images/x.gif" alt="Cancel process" title="Cancel process"/> 
				</a>
         {/if} 
         <a href="profile/account"> {$smarty.const.ACCOUNT_DELETED_IN}
            <span class="timer">{{$session->getUser()->getDeletingDate()|strtotime - $smarty.now}|seconds_to_time}</span>
         </a> 
         </div>
         <br />      	
		{/if}

    </div>

    {if false}

    <div id="content" class="village1">
        <h1>{$smarty.const.ANNOUNCEMENT}</h1>
		<br />
        <h3>Hi {$session->getUser()->username},</h3>
      		{* include file={$smarty.const.TEMPLATES_DIR}|cat:'text.tpl' *}
        <div class="c1">
		<br />
            <h3><a href="resources">&raquo; {$smarty.const.GO2MY_VILLAGE}</a></h3>
        </div>
    </div>

    <br /><br /><br /><br />
    <div id="side_info">
        {include file={$smarty.const.TEMPLATES_DIR}|cat:'village/multivillage.tpl'}
        {include file={$smarty.const.TEMPLATES_DIR}|cat:'base/quest.tpl'}
        {include file={$smarty.const.TEMPLATES_DIR}|cat:'base/news.tpl'}       
    </div>

    <div class="clear"></div>

    <div class="footer-stopper"></div>

    <div class="clear"></div>
    	{include file={$smarty.const.TEMPLATES_DIR}|cat:'base/footer.tpl'}
    	{include file={$smarty.const.TEMPLATES_DIR}|cat:'base/res.tpl'}
    <div id="stime">
        <div id="ltime">
            <div id="ltimeWrap">
                {$smarty.const.CALCULATED_IN}
                <b>{$pageLoadTime}</b> ms
				<br />{$smarty.const.SEVER_TIME} <span id="tp1" class="b">{$smarty.now|date_format:$config.time}</span>
            </div>
        </div>
    </div>

    <div id="ce"></div>
    {/if}
    {/if}
</body>
</html>