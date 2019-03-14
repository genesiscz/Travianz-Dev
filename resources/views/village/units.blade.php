<table id="troops" cellpadding="1" cellspacing="1">
   <thead>
      <tr>
         <th colspan="3">@lang('village/units.troops'):
         </th>
      </tr>
   </thead>
   <tbody>
   @if ($village->world->units->isNotEmpty())
      @foreach ($village->world->units as $unit)
         @if ($unit->amount > 0)
         <tr>
            <td class="ico">
               <a href="{{ route('building.show', ['id' => 39]) }}">
                  <img class="unit u{{$unit->type}}" src="{{ asset('images/x.gif') }}" alt="{{''}}" title="{{''}}"/>
               </a>
            </td>
            <td class="num">{{ $unit->amount }}</td>
            <td class="un">{{''}}</td>
         </tr>
         @endif
      @endforeach
   @else
      <tr>
         <td>@lang('village/units.none')
         </td>
      </tr>
   @endif
   </tbody>
</table>
</div>
