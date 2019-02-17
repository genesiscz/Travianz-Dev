<form method="post" action="login" name="deleteCookies">
	<input type="hidden" name="action" value="deleteCookies">
   <div id="content" class="logout">
      <h1>{$smarty.const.LOGOUT_SUCCESSFUL}</h1>
      <img class="roman" src="../../assets/images/x.gif" />
      <p>{$smarty.const.LOGOUT_THANK_YOU}</p>
      <p>{$smarty.const.LOGOUT_OTHER_PEOPLE_WARNING}
         <br />
         <a href="javascript:document.deleteCookies.submit();">&raquo; {$smarty.const.LOGOUT_DELETE_COOKIES}</a>
      </p>
   </div>
</form>