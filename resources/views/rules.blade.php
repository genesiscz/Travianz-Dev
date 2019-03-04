@component('index.layout')
<h1>@lang('rules.title')</h1>
<p class="submenu">
   @lang('rules.descriptions.1', ['serverName' => config('server.name')])
   <br /><br />
   @lang('rules.descriptions.2', ['serverName' => config('server.name')])
</p>
<ul class="rules">
   <li>
      <strong style="color: #2A720B">&sect;1 @lang('rules.list.1.title.0')</strong><br />
      @lang('rules.list.1.description.0')
      <ul>
         <li><strong style="color: #3BAE18">&sect;1.1 @lang('rules.list.1.title.1')</strong><br />
            @lang('rules.list.1.description.1')
         </li>
         <li><strong style="color: #3BAE18">&sect;1.2 @lang('rules.list.1.title.2')</strong><br />
            @lang('rules.list.1.description.2.1')
            <br /><br />
            @lang('rules.list.1.description.2.2')
            <br /><br />
            @lang('rules.list.1.description.2.3', ['serverName' => config('server.name')])
         </li>
         <li><strong style="color: #3BAE18">&sect;1.3 @lang('rules.list.1.title.3')</strong><br />
				@lang('rules.list.1.description.3')
         </li>
         <li>
            <strong style="color: #3BAE18">&sect;1.4 @lang('rules.list.1.title.4')</strong><br />
            @lang('rules.list.1.description.4.1', ['serverName' => config('server.name')])
            <ol>
               <li>@lang('rules.list.1.description.4.2')</li>
               <li>@lang('rules.list.1.description.4.3')</li>
               <li>@lang('rules.list.1.description.4.4')</li>
            </ol>
            @lang('rules.list.1.description.4.5')
         </li>
      </ul>
   </li>
   <li>
      <strong style="color: #2A720B">&sect;2 @lang('rules.list.2.title.0')</strong><br />
      <ul>
         <li><strong style="color: #3BAE18">&sect;2.1 @lang('rules.list.2.title.1')</strong><br />
				@lang('rules.list.2.description.1.1')
            <br />
				@lang('rules.list.2.description.1.2')
            <br />
				@lang('rules.list.2.description.1.3', ['serverName' => config('server.name')])
         </li>
         <li><strong style="color: #3BAE18">&sect;2.2 @lang('rules.list.2.title.2')</strong><br />
            @lang('rules.list.2.description.2')
         </li>
      </ul>
   </li>
   <li><strong style="color: #2A720B">&sect;3 @lang('rules.list.3.title.1')</strong><br />
		@lang('rules.list.3.description.1')
   </li>
   <li><strong style="color: #2A720B">&sect;4 @lang('rules.list.4.title.1')</strong><br />
       @lang('rules.list.4.description.1')
   </li>
   <li><strong style="color: #2A720B">&sect;5 @lang('rules.list.5.title.1')</strong><br />
      @lang('rules.list.5.description.1', ['serverName' => config('server.name')])
   </li>
   <li>
      <strong style="color: #2A720B">&sect;6 @lang('rules.list.6.title.1')</strong><br />
 		@lang('rules.list.6.description.0')
      <ol>
         <li>
         	@lang('rules.list.6.description.1.1'):
         	<br />
         	@lang('rules.list.6.description.1.2')
            <br />
            @lang('rules.list.6.description.1.3')
            <br />
            @lang('rules.list.6.description.1.4')
            <br />
            @lang('rules.list.6.description.1.5', ['serverName' => config('server.name')])
            <br />
            @lang('rules.list.6.description.1.6')
         </li>
         <li>@lang('rules.list.6.description.2')</li>
         <li>@lang('rules.list.6.description.3')</li>
         <li>@lang('rules.list.6.description.4', ['serverName' => config('server.name')])</li>
      </ol>
   </li>
   <li><strong style="color: #2A720B">&sect;7 @lang('rules.list.7.title.1')</strong><br />
		@lang('rules.list.7.description.1')
      <br />
      @lang('rules.list.7.description.2', ['serverName' => config('server.name')])
      <br />
      @lang('rules.list.7.description.3', ['serverName' => config('server.name')])
      <br /><br />
      @lang('rules.list.7.description.4')
      <br />
      @lang('rules.list.7.description.5', ['serverName' => config('server.name')])
      <br /><br />
      @lang('rules.list.7.description.6')
   </li>
   <li><strong style="color: #2A720B">&sect;8 @lang('rules.list.8.title.1')</strong><br />
      @lang('rules.list.8.description.1', ['serverName' => config('server.name')])
   </li>
   <li><strong style="color: #2A720B">&sect;9 @lang('rules.list.9.title.1')</strong><br />
      @lang('rules.list.9.description.1')
   </li>
</ul>
@endcomponent