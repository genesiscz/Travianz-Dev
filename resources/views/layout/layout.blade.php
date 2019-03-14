<!DOCTYPE html>
<html>
@game_head
<body class="v35 ie ie8">
<div class="wrapper">
    <img class="c1" src="{{ asset('images/x.gif') }}" id="msfilter"/>
    <div id="dynamic_header"></div>
    @game_header
    <div id="mid">
        @game_menu
        {{ $slot }}
        <br/><br/><br/><br/>
        <div id="side_info">
            @if (Auth::check())
                @include('village.list')
                {{-- quest --}}
            @endif

            @if (config('server.newsboxes.1'))
                @include('newsboxes.newsbox1')
            @endif

            @if (config('server.newsboxes.2'))
                @include('newsboxes.newsbox2')
            @endif

            @if (config('server.newsboxes.3'))
                @include('newsboxes.newsbox3')
            @endif
        </div>
        <div class="clear"></div>
        @game_footer
    </div>
    <div class="clear"></div>
    @if (Auth::check())
        @include('village.resources')
    @endif
    @include('layout.time')
</div>
<div id="ce"></div>
</body>
</html>
