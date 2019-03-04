<!doctype html>
<html>
   @index_head
   <body class="webkit contentPage">
      <div class="wrapper">
         <div id="country_select"></div>
         <div id="header">
            <h1>@lang('index.welcome')</h1>
         </div>
         <div id="navigation">
            <a href="{{ route('index') }}" class="home"><img src="{{ asset('images/x.gif') }}" alt="{{ config('server.name') }}"/></a>
            <table class="menu">
               <tr>
                  <td><a href="{{ route('tutorial.village') }}"><span>@lang('index.tutorial')</span></a></td>
                  <td><a href="{{ route('manual.tribes') }}"><span>@lang('index.manual')</span></a></td>
                  <td><a href="{{ route('index') }}"><span>@lang('index.register')</span></a></td>
                  <td><a href="{{ route('index') }}"><span>@lang('index.login')</span></a></td>
               </tr>
            </table>
         </div>
         <div id="content">
            <div class="grit">
               {{ $slot }}
            </div>
            @manual_footer
         </div>
      </div>
      <div id="iframe_layer" class="overlay">
         <div class="mask closer"></div>
         <div class="overlay_content">
            <a href="{{ route('index') }}" class="closer">
            <img class="dynamic_img" src="{{ asset('images/x.gif') }}" />
            </a>
            <h2>@lang('index.manual')</h2>
            <div id="frame_box" >
            </div>
            <div class="footer"></div>
         </div>
      </div>
   </body>
</html>