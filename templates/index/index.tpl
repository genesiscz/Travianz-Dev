<!DOCTYPE html>
<html>
   {include file={$smarty.const.TEMPLATES_DIR}|cat:'base/indexHead.tpl'}
   <body class="presto indexPage">
      <div class="wrapper">
         <div id="country_select">
            <div id="flags"></div>
            <script>
               /*var region_list = new Array('Europe','America','Asia','Middle East','Africa','Oceania');
               show_flags('', '', region_list);*/
            </script>
         </div>
         <div id="header">
            <h1>{$smarty.const.WELCOME}</h1>
         </div>
         <div id="navigation">
            <a href="index" class="home">
            <img src="assets/images/x.gif" alt="Travianz" />
            </a>
            <table class="menu">
               <tr>
                  <td>
                     <a href="tutorial">
                     <span>{$smarty.const.TUTORIAL}</span>
                     </a>
                  </td>
                  <td><a href="manual"><span>{$smarty.const.MANUAL}</span></a></td>
                  <td><a href="" class="signup_link mark"><span>{$smarty.const.REGISTER}</span></a></td>
                  <td><a href="" class="login_link"><span>{$smarty.const.LOGIN}</span></a></td>
               </tr>
            </table>
         </div>
         <div id="register_now">
            <a href="" class="signup_link">{$smarty.const.REGISTER}</a>
            <span>{$smarty.const.PLAY_NOW}</span>
         </div>
         <div id="content">
            <div class="grit">
               <div class="infobox">
                  <div id="what_is_travian">
                     <h2>{$smarty.const.WHAT_IS_TRAVIANZ}</h2>
                     <p>{$smarty.const.SERVER_DESCRIPTION}</p>
                     <p class="play_now"><a href="index/register" class="signup_link">{$smarty.const.CLICK_TO_PLAY}</a></p>
                  </div>
                  <div id="player_counter">
                     <table>
                        <tbody>
                           <tr>
                              <th>{$smarty.const.TOTAL_PLAYERS}:</th>
                              <td>0</td>
                           </tr>
                           <tr>
                              <th>{$smarty.const.PLAYERS_ACTIVE}:</th>
                              <td>0</td>
                           </tr>
                           <tr>
                              <th>{$smarty.const.PLAYERS_ONLINE}:</th>
                              <td>0</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div id="about_the_game">
                     <h2>{$smarty.const.ABOUT_THE_GAME}:</h2>
                     <ul>
                        <li>{$smarty.const.YOU_WILL_BEGIN}</li>
                        <li>{$smarty.const.BUILD_UP}</li>
                        <li>{$smarty.const.PLAY_WITH_AND_AGAINST}</li>
                     </ul>
                  </div>
               </div>
               <div class="secondarybox">
                  <div id="screenshots">
                     <h2>{$smarty.const.SCREENSHOTS}</h2>
                     <a href="#last" class="navi prev dynamic_btn"><img class="dynamic_btn" src="assets/images/x.gif" alt="previous" /></a>
                     <div id="screenshots_preview">
                        <ul id="screenshot_list" class="c1">
                           <li><a href="#"><img src="assets/images/un/s/s1s.jpg" alt="Screenshot" /></a></li>
                           <li><a href="#"><img src="assets/images/un/s/s2s.jpg" alt="Screenshot" /></a></li>
                           <li><a href="#"><img src="assets/images/un/s/s4s.jpg" alt="Screenshot" /></a></li>
                           <li><a href="#"><img src="assets/images/un/s/s3s.jpg" alt="Screenshot" /></a></li>
                           <li><a href="#"><img src="assets/images/un/s/s5s.jpg" alt="Screenshot" /></a></li>
                           <li><a href="#"><img src="assets/images/un/s/s7s.jpg" alt="Screenshot" /></a></li>
                           <li><a href="#"><img src="assets/images/un/s/s8s.jpg" alt="Screenshot" /></a></li>
                        </ul>
                     </div>
                     <a href="#next" class="navi next"><img class="dynamic_btn" src="assets/images/x.gif" alt="next" /></a>
                  </div>
                  <div id="newsbox">
                     <h2>{$smarty.const.NEWS}</h2>
                     <div class="news">{include file={$smarty.const.TEMPLATES_DIR}|cat:'index/news.tpl'}</div>
                  </div>
               </div>
            </div>
            <div class="clear"></div>
         </div>
         <div id="footer">
            <div class="container">
               <a rel="license" href="https://creativecommons.org/licenses/by-nc-sa/3.0/" class="logo"><img alt="Licencia Creative Commons" style="border-width:0; height:31px; width:88px;" src="https://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" class="logo_traviangames" /></a>
               <ul class="menu">
                  <li><a href="manual/3">{$smarty.const.FAQ}</a>|</li>
                  <li><a href="index/screenshots">{$smarty.const.SCREENSHOTS}</a>|</li>
                  <li><a href="rules">{$smarty.const.RULES}</a>|</li>
                  <li><a href="terms">{$smarty.const.TERMS}</a>|</li>
                  <li><a href="imprint">{$smarty.const.IMPRINT}</a></li>
                  <li class="copyright">&copy; 2019 - Travianz - All rights reserved</li>
               </ul>
            </div>
         </div>
      </div>
      <div id="login_layer" class="overlay">
         <div class="mask closer"></div>
         <div id="login_list" class="overlay_content">
            <h2>{$smarty.const.CHOOSE}</h2>
            <a href="#" class="closer"><img class="dynamic_img" alt="Close" src="assets/images/un/x.gif" /></a>
            <ul class="world_list">
               <li class="w_big c3" style="background-image:url('assets/images/en/welten/en1_big.jpg');">
                  <a href="login"><img class="w_button" src="assets/images/un/x.gif" alt="World" title="0 &nbsp; {$smarty.const.PLAYERS} &nbsp;|&nbsp; 0 &nbsp; {$smarty.const.ACTIVE} &nbsp;|&nbsp; 0 &nbsp; {$smarty.const.ONLINE}" /></a>
                  <div class="label_players c0">{$smarty.const.PLAYERS}:</div>
                  <div class="label_online c0">{$smarty.const.ONLINE}:</div>
                  <div class="players c1">0</div>
                  <div class="online c1">0</div>
               </li>
            </ul>
            <div class="footer"></div>
         </div>
      </div>
      <div id="signup_layer" class="overlay">
         <div class="mask closer"></div>
         <div id="signup_list" class="overlay_content">
            <h2>{$smarty.const.CHOOSE}</h2>
            <a href="#" class="closer"><img class="dynamic_img" alt="Close" src="assets/images/un/x.gif" /></a>
            <ul class="world_list">
               <li class="w_big c4" style="background-image:url('assets/images/en/welten/en1_big.jpg');">
                  <a href="register"><img class="w_button" src="assets/images/un/x.gif" alt="World" title="0 &nbsp; {$smarty.const.PLAYERS} &nbsp;|&nbsp; 0 &nbsp; {$smarty.const.ACTIVE} &nbsp;|&nbsp; 0 &nbsp; {$smarty.const.ONLINE}" /></a>
                  <div class="label_players c0">{$smarty.const.PLAYERS}:</div>
                  <div class="label_online c0">{$smarty.const.ONLINE}:</div>
                  <div class="players c1">0</div>
                  <div class="online c1">0</div>
               </li>
            </ul>
            <div class="footer"></div>
         </div>
      </div>
      <div id="iframe_layer" class="overlay">
         <div class="mask closer"></div>
         <div class="overlay_content">
            <a href="#" class="closer"><img class="dynamic_img" alt="Close" src="assets/images/un/x.gif" /></a>
            <h2>{$smarty.const.MANUAL}</h2>
            <div id="frame_box"></div>
            <div class="footer"></div>
         </div>
      </div>
      <div id="screenshot_layer" class="overlay">
         <div class="mask closer"></div>
         <div class="overlay_content">
            <h3>{$smarty.const.SCREENSHOTS}</h3>
            <a href="#" class="closer"><img class="dynamic_img" alt="Close" src="assets/images/x.gif" /></a>
            <div class="screenshot_view">
               <h4 id="screen_hl"></h4>
               <img id="screen_view" src="assets/images/x.gif" alt="Screenshot" name="screen_view" />
               <div id="screen_desc"></div>
            </div>
            <a href="#prev" class="navi prev" onclick="galarie.showPrev();"><img class="dynamic_img" src="assets/images/x.gif" alt="previous" /></a>
            <a href="#next" class="navi next" onclick="galarie.showNext();"><img class="dynamic_img" src="assets/images/x.gif" alt="next" /></a>
            <div class="footer"></div>
         </div>
      </div>
      {literal}
      <script type="text/javascript">
      	var screenshots = [
				{'img':'assets/images/en/s/s1.png','hl':"{/literal}{$smarty.const.SCREENSHOT_1_TITLE}{literal}", 'desc':"{/literal}{$smarty.const.SCREENSHOT_1_DESCRIPTION}{literal}"},
				{'img':'assets/images/en/s/s2.png','hl':"{/literal}{$smarty.const.SCREENSHOT_2_TITLE}{literal}", 'desc':"{/literal}{$smarty.const.SCREENSHOT_2_DESCRIPTION}{literal}"},
				{'img':'assets/images/en/s/s4.png','hl':"{/literal}{$smarty.const.SCREENSHOT_3_TITLE}{literal}", 'desc':"{/literal}{$smarty.const.SCREENSHOT_3_DESCRIPTION}{literal}"},
				{'img':'assets/images/en/s/s3.png','hl':"{/literal}{$smarty.const.SCREENSHOT_4_TITLE}{literal}", 'desc':"{/literal}{$smarty.const.SCREENSHOT_4_DESCRIPTION}{literal}"},
				{'img':'assets/images/en/s/s5.png','hl':"{/literal}{$smarty.const.SCREENSHOT_5_TITLE}{literal}", 'desc':"{/literal}{$smarty.const.SCREENSHOT_5_DESCRIPTION}{literal}"},
				{'img':'assets/images/en/s/s7.png','hl':"{/literal}{$smarty.const.SCREENSHOT_6_TITLE}{literal}", 'desc':"{/literal}{$smarty.const.SCREENSHOT_6_DESCRIPTION}{literal}"},
				{'img':'assets/images/en/s/s8.png','hl':"{/literal}{$smarty.const.SCREENSHOT_7_TITLE}{literal}", 'desc':"{/literal}{$smarty.const.SCREENSHOT_7_DESCRIPTION}{literal}"}
			];
         var galarie = new Fx.Screenshots('screen_view', 'screen_hl', 'screen_desc', screenshots);
      </script>
      {/literal}
   </body>
</html>
