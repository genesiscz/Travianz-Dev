<div id="footer">
   <div class="container">
      <a rel="license" href="https://creativecommons.org/licenses/by-nc-sa/3.0/" class="logo">
      <img style="border-width:0; height:31px; width:88px;" src="https://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" class="logo_traviangames" />
      </a>
      <ul class="menu">
         <li><a href="{{ route('manual.FAQ') }}">@lang('index.FAQ')</a>|</li>
         <li><a href="https://github.com/iopietro/Travianz">@lang('index.source_code')</a>|</li>
         <li><a href="https://discordapp.com/invite/9fbJKP9">@lang('index.discord_server')</a>|</li>
         <li><a href="{{ route('rules') }}">@lang('index.rules')</a></li>
         <li class="copyright">&copy; @lang('index.copyright', ['serverName' => config('server.name')])</li>
      </ul>
   </div>
</div>
