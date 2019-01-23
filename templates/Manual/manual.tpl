<!DOCTYPE>
<html>
	{include file={$smarty.const.TEMPLATES_DIR}|cat:'base/manualHead.tpl'}
   <body class="webkit contentPage">
      <div class="wrapper">
         <div id="country_select"></div>
         <div id="header">
            <h1>{$smarty.const.WELCOME}</h1>
         </div>
         <div id="navigation">
            <a href="../index" class="home"><img src="../../assets/images/x.gif" alt="Travianz"/></a>
            <table class="menu">
               <tr>
                  <td><a href="../tutorial/village"><span>{$smarty.const.TUTORIAL}</span></a></td>
                  <td><a href="../manual/tribes"><span>{$smarty.const.MANUAL}</span></a></td>
                  <td><a href="../index"><span>{$smarty.const.REGISTER}</span></a></td>
                  <td><a href="../index"><span>{$smarty.const.LOGIN}</span></a></td>
               </tr>
            </table>
         </div>
         <div id="content">
            <div class="grit">
               <h1>{$smarty.const.MANUAL}</h1>
               <p class="submenu">
                  <a href="tribes">{$smarty.const.THE_TRIBES}</a> |
                  <a href="buildings">{$smarty.const.THE_BUILDINGS}</a> |
                  <a href="FAQ">{$smarty.const.FAQ}</a>
               </p>
               {include file=$templateToRender}
               <div class="footer"></div>
            </div>
         </div>
         <div id="iframe_layer" class="overlay">
            <div class="mask closer"></div>
            <div class="overlay_content">
               <a href="index.php" class="closer"><img class="dynamic_img" src="../../assets/images/un/x.gif" /></a>
               <h2>{$smarty.const.MANUAL}</h2>
               <div id="frame_box" >
               </div>
               <div class="footer"></div>
            </div>
         </div>
      </div>
   </body>
</html>
