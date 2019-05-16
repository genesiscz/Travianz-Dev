<div id="side_navi">
   <a id="logo" href="{{ route('index') }}"><img src="{{ asset('images/x.gif') }}"></a>
   <p>
      <a href="{{ route('index') }}">@lang('menu.homepage')</a>
      @if (Auth::check())
         <a href="{{ route('logout') }}">@lang('menu.logout')</a>
         <a href="{{  route('profile', ['profile' => Auth::user()->id]) }}">@lang('menu.profile')</a>
         @else
         <a href="{{ route('login') }}">@lang('menu.login')</a>
         <a href="{{ route('register') }}">@lang('menu.register')</a>
      @endif

   </p>
     <p>
      <a href="allianz.php?s=2">@lang('menu.forum')**</a>
      <a href="plus.php?id=3"><b><span class="plus_g">P</span><span class="plus_o">l</span><span class="plus_g">u</span><span class="plus_o">s</span></b>**</a>
      <a href="spieler.php?uid=1">@lang('menu.support')**</a>
   </p>


</div>