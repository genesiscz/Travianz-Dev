<!DOCTYPE html>
<html>
   @game_head
   <body class="v35 ie ie8">
      <div class="wrapper">
         <img style="filter: chroma();" src="{{ asset('images/x.gif') }}" id="msfilter" />
         <div id="dynamic_header"></div>
         @game_header
         <div id="mid">
            @game_menu
            {{ $slot }}
            <br /><br /><br /><br />
            <div id="side_info">
               {include file={$smarty.const.TEMPLATES_DIR}|cat:'village/multivillage.tpl'}
               {*include file={$smarty.const.TEMPLATES_DIR}|cat:'base/quest.tpl'*}
               {include file={$smarty.const.TEMPLATES_DIR}|cat:'base/news.tpl'}
            </div>
            <div class="clear"></div>
            @game_footer
         </div>
         <div class="clear"></div>
         {include file={$smarty.const.TEMPLATES_DIR}|cat:'village/res.tpl'}
         @game_time
      </div>
      <div id="ce"></div>
   </body>
</html>