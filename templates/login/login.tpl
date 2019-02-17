<div id="content" class="login">
    <h1>
		<img class="img_login" src="../../assets/images/x.gif" />
	</h1> {if {"START_DATE_TIME"|get_config}|strtotime > $smarty.now}

    <p style="text-align: center">
        <font color="red" size="6">{$smarty.const.NOT_OPENED_YET}</font>
    </p>

    {else}

    <h5>
		<img class="img_u04" src="../../assets/images/x.gif" />
	</h5>
    <p>{$smarty.const.COOKIES}</p>

    {if {{"START_DATE_TIME"|get_config}|strtotime} > $smarty.now}

    <br />
    <div style="text-align: center; font-size: 25px">{$smarty.const.SERVER_NAME} will start in:</div>
    <div class="timer" id="activation_time">{$serverInfo->getDataStartTime()}</div>

    {else}

    <form method="post" action="login">
        {literal}
        <script>
            Element.implement({
                //imgid: if an arrow belongs to the link this can be "opened"               
                showOrHide: function(imgid) {
                    //insert

                    if (this.getStyle('display') == 'none') {
                        if (imgid != '') {
                            $(imgid).className = 'open';
                        }
                    }
                    //hide
                    else {
                        if (imgid != '') {
                            $(imgid).className = 'close';
                        }
                    }
                    this.toggleClass('hide');
                }
            });
        </script>
        {/literal}
        <table id="login_form">
            <tbody>
                <tr class="top">
                    <th>{$smarty.const.NAME}</th>
                    <td>
                        <input class="text" type="text" name="username" value="{if isset($smarty.post.username)}{$smarty.post.username}{elseif isset($smarty.cookies.COOKUSR)}{$smarty.cookies.COOKUSR}{/if}" maxlength="30" />
                        {if isset($errors.username)}
                        	<span class="error">{$errors.username}</span></td>
                        {/if}
                </tr>
                <tr class="btm">
                    <th>{$smarty.const.PASSWORD}</th>
                    <td>
                        <input class="text" type="password" name="password" value="{if isset($smarty.post.password)}{$smarty.post.password}{/if}" maxlength="100" /> 
                        {if isset($errors.password)}
                        	<span class="error">{$errors.password}</span>
                        {/if}
                    </td>
                </tr>
            </tbody>
        </table>

        <p class="btn">
            <button value="login" name="action" onclick="xy();" id="btn_login" class="trav_buttons">Login</button>
        </p>
    </form>

    {/if} 
    {/if} 

    {if !empty($errors.email)}

    <p class="error_box">
        <span class="error">{$errors.email}</span>
        <br>{$smarty.const.EMAIL_FOLLOW}
        <br>
        <a href="activate/{$smarty.post.username}">{$smarty.const.VERIFY_EMAIL}</a>
    </p>

    {elseif !empty($errors.vacation)}

    <p class="error_box">
        <span class="error">{$errors.vacation}</span>
    </p>

    {elseif !empty($errors.password) && isset($smarty.post.password) && $smarty.post.password != "" && isset($smarty.post.username) && $smarty.post.username != ""}
    <p class="error_box">
        <span class="error">{$smarty.const.PASSWORD_FORGOTTEN}</span>
        <br>{$smarty.const.PASSWORD_REQUEST}
        <br>
        <a href="password">{$smarty.const.PASSWORD_GENERATE}</a>
    </p>
 
    {/if}

</div>