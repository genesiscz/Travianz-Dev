<!DOCTYPE html>
<html>
   {include file={$smarty.const.TEMPLATES_DIR}|cat:'base/head.tpl'}
   <body>
      {literal}
      <script>
         function refresh(tz) {
              var dt = new Array();
             dt=tz.split(",");
             tz=dt[0];
             location="?s=1&t="+tz;
         }
         function proceed() {
         	var e = document.getElementById('Submit');
             setTimeout(function() {
                 e.disabled = "disabled";
             }, 200);
         
             e.value = "Processing...";
         
             return true;
         }
      </script>
      {/literal}
      <div class="wrapper">
         <img class="c1" src="../../assets/images/x.gif" id="msfilter" alt="" name="msfilter" />
         <div id="dynamic_header"></div>
         <div id="header">
            <div id="mtop"></div>
         </div>
         <div id="mid">
            <div id="side_navi">
               {include file={$smarty.const.TEMPLATES_DIR}|cat:'installation/menu.tpl'}
            </div>
            <div id="content" class="login">
               <div style="text-align: center" class="headline">
                  <span class="f18 c5">Travianz Installation Script</span>
               </div>
               {include file=$templateToRender}
               <div id="side_info" class="outgame"></div>
               <div class="clear"></div>
            </div>
            <div class="footer-stopper outgame"></div>
            <div class="clear"></div>
            {include file={$smarty.const.TEMPLATES_DIR}|cat:'base/footer.tpl'}
         </div>
         <div id="ce"></div>
      </div>
   </body>
</html>
