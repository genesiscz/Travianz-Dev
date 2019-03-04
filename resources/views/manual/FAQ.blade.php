@component('manual.layout')
<p><img src="{{ asset('images/manual/FAQ/faq_vp.jpg') }}" width="116" height="128" border="0" alt="@lang('buildings.rally_point')" title="@lang('buildings.rally_point')" align="right"></p>
<p class="question">@lang('manual\FAQ.questions.1')</p>
<p class="answer">@lang('manual\FAQ.answers.1')</p>
<p><img src="{{ asset('images/manual/FAQ/faq_botschaft.jpg') }}" width="122" height="150" border="0" alt="@lang('buildings.embassy')" title="@lang('buildings.embassy')" align="left"></p>
<p class="question">@lang('manual\FAQ.questions.2')</p>
<p class="answer">@lang('manual\FAQ.answers.2')</p>
<p class="question">@lang('manual\FAQ.questions.3')</p>
<p class="answer">@lang('manual\FAQ.answers.3', ['i' => '<i>', '_i' => '</i>'])</p>
<p class="question">@lang('manual\FAQ.questions.4')</p>
<p class="answer">@lang('manual\FAQ.answers.4')</p>
<p class="question">@lang('manual\FAQ.questions.5')</p>
<p class="answer">@lang('manual\FAQ.answers.5.1')</p>
<p class="answer">@lang('manual\FAQ.answers.5.2') <img src="{{ asset('images/manual/resources/5.gif') }}" width="18" height="12" border="0" alt="Use of crop" title="@lang('resources.crop_consumption')">.</p>
<p class="question">@lang('manual\FAQ.questions.6')</p>
<p class="answer">@lang('manual\FAQ.answers.6', ['i' => '<i>', '_i' => '</i>', 'br' => '<br />', 'image' => '<img src="' . asset('images/manual/resources/5.gif') . '" width="18" height="12" border="0" alt="' . trans('resources.crop_consumption') . '" title="' . trans('resources.crop_consumption') . '">'])</p>
<p class="question">@lang('manual\FAQ.questions.7')</p>
<p class="answer">@lang('manual\FAQ.answers.7', ['i' => '<i>', '_i' => '</i>'])</p>
<p class="question">@lang('manual\FAQ.questions.8')</p>
<p class="answer">@lang('manual\FAQ.answers.8', ['ah' => '<a href="' . route('manual.village') . '">', '_a' => '</a>'])</p>
<p class="question">@lang('manual\FAQ.questions.9')</p>
<p class="answer">@lang('manual\FAQ.answers.9')</p>
</div>

<div class="clear"></div>
@endcomponent