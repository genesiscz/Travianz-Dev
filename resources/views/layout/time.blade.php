<div id="stime">
   <div id="ltime">
      <div id="ltimeWrap">
         @lang('time.calculated_in'):
         <b>{{ round((microtime(true) - LARAVEL_START) * 1000) }}</b> @lang('time.ms')
         <br />@lang('time.server_time'): <span id="tp1" class="b">{{ Carbon\Carbon::now()->toTimeString() }}</span>
      </div>
   </div>
</div>