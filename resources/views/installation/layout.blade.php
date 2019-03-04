<!doctype html>
<html>
   @game_head
   <body>
      <div class="wrapper">
         <img class="c1" src="{{ asset('images/x.gif') }}" id="msfilter" name="msfilter" />
         <div id="dynamic_header"></div>
         <div id="header">
            <div id="mtop"></div>
         </div>
         <div id="mid">
            <div id="side_navi">
               @installation_menu
            </div>
            <div id="content" class="login">
               <div style="text-align: center" class="headline">
                  <span class="f18 c5">@lang('installation/menu.installation_script')</span>
               </div>
               {{ $slot }}
            </div>
            <div id="side_info" class="outgame"></div>
            <div class="clear"></div>
         </div>
         <div class="footer-stopper outgame"></div>
         <div class="clear"></div>
         @game_footer
      </div>
      <div id="ce"></div>
   </body>
</html>