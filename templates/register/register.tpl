{if {"REGISTRATION_OPEN"|get_config}}
<div id="content" class="signup">
   <h1><img src="../../assets/images/x.gif" class="anmelden" alt="register for the game" /></h1>
   <h5><img src="../../assets/images/x.gif" class="img_u05" alt="registration"/></h5>
   <p>{$smarty.const.BEFORE_REGISTER}</p>
   <form method="post" action="register">
      {if isset($referralID)}
      <input type="hidden" name="referralID" value="{$referralID}">
      {/if}
      <table id="sign_input">
         <tbody>
            <tr class="top">
               <th>{$smarty.const.NICKNAME}</th>
               <td>
                  <input class="text" type="text" name="username" value="{if isset($smarty.post.username)}{$smarty.post.username}{/if}" maxlength="{'USERNAME_MAX_LENGTH'|get_config}" />
                  {if !empty($errors.username)}
                  <span class="error">{$errors.username}</span>
                  {/if}
               </td>
            </tr>
            <tr>
               <th>{$smarty.const.EMAIL}</th>
               <td>
                  <input class="text" type="text" name="email" value="{if isset($smarty.post.email)}{$smarty.post.email}{/if}" maxlength="{'EMAIL_MAX_LENGTH'|get_config}" />
                  {if !empty($errors.email)}
                  <span class="error">{$errors.email}</span>
                  {/if}
               </td>
            </tr>
            <tr>
               <th>{$smarty.const.PASSWORD}</th>
               <td>
                  <input class="text" type="password" name="password" value="{if isset($smarty.post.password)}{$smarty.post.password}{/if}" maxlength="{'PASSWORD_MAX_LENGTH'|get_config}" />
                  {if !empty($errors.password)}
                  <span class="error">{$errors.password}</span>
                  {/if}
               </td>
            </tr>
         </tbody>
      </table>
      <table id="sign_select">
         <tbody>
            <tr class="top">
               <th><img src="../../assets/images/x.gif" class="img_u06" alt="choose tribe" /></th>
               <th colspan="2"><img src="../../assets/images/x.gif" class="img_u07" alt="starting position" /></th>
            </tr>
            <tr>
               <td class="nat">
                  <label>
                  <input class="radio" type="radio" name="tribe" value="1" {if isset($smarty.post.tribe) && $smarty.post.tribe == 1}checked{/if} />&nbsp;{$smarty.const.ROMANS}</label>
               </td>
               <td class="pos1">
                  <label>
                  <input class="radio" type="radio" name="sector" value="0" {if isset($smarty.post.sector) && $smarty.post.sector == 0}checked{/if}/>&nbsp;{$smarty.const.RANDOM}</label>
               </td>
               <td class="pos2">&nbsp;</td>
            </tr>
            <tr>
               <td>
                  <label>
                  <input class="radio" type="radio" name="tribe" value="2" {if isset($smarty.post.tribe) && $smarty.post.tribe == 2}checked{/if}/>&nbsp;{$smarty.const.TEUTONS}</label>
               </td>
               <td>
                  <label>
                  <input class="radio" type="radio" name="sector" value="1" {if isset($smarty.post.sector) && $smarty.post.sector == 1}checked{/if}>&nbsp;{$smarty.const.NW} <b>(-|+)</b>&nbsp;</label>
               </td>
               <td>
                  <label>
                  <input class="radio" type="radio" name="sector" value="2" {if isset($smarty.post.sector) && $smarty.post.sector == 2}checked{/if} />&nbsp;{$smarty.const.NE} <b>(+|+)</b></label>
               </td>
            </tr>
            <tr class="btm">
               <td>
                  <label>
                  <input class="radio" type="radio" name="tribe" value="3" {if isset($smarty.post.tribe) && $smarty.post.tribe == 3}checked{/if}/>&nbsp;{$smarty.const.GAULS}</label>
               </td>
               <td>
                  <label>
                  <input class="radio" type="radio" name="sector" value="3" {if isset($smarty.post.sector) && $smarty.post.sector == 3}checked{/if}/>&nbsp;{$smarty.const.SW} <b>(-|-)</b></label>
               </td>
               <td>
                  <label>
                  <input class="radio" type="radio" name="sector" value="4" {if isset($smarty.post.sector) && $smarty.post.sector == 4}checked{/if}/>&nbsp;{$smarty.const.SE} <b>(+|-)</b></label>
               </td>
            </tr>
         </tbody>
      </table>
      <ul class="important">
         {if !empty($errors.tribe)}
         <li>{$errors.tribe}</li>
         {/if} 
         {if !empty($errors.sector)}
         <li>{$errors.sector}</li>
         {/if}
         {if !empty($errors.referralID)}
         <li>{$errors.referralID}</li>
         {/if}
         {if !empty($errors.rules)}
         <li>{$errors.rules}</li>
         {/if}
      </ul>
      <p>
         <input class="check" type="checkbox" name="rules" value="1" {if isset($smarty.post.rules)}checked{/if}/>{$smarty.const.ACCEPT_RULES}
      </p>
      <p class="btn">
         <button value="register" name="action" id="btn_signup" class="trav_buttons"> {$smarty.const.REGISTER} </button>
      </p>
   </form>
   <p class="info">{$smarty.const.ONE_PER_SERVER}</p>
</div>
{else}
<div id="content" class="signup">
   <h1><img src="../../assets/images/x.gif" class="anmelden" alt="register for the game" /></h1>
   <h5><img src="../../assets/images/x.gif" class="img_u05" alt="registration"/></h5>
   <p>{$smarty.const.REGISTER_CLOSED}</p>
</div>
{/if}
