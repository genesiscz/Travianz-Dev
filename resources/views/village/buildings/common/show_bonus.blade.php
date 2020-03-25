<table cellpadding="1" cellspacing="1" id="build_value">
	<tr>
		<th>{{ $bonusTexts[0] }}:</th>
		<td><b>{{ $building->total_bonus }}</b> {{ $bonusTexts[2] }}</td>
	</tr>

    @if(!$building->isAtMaximumLevel($village->isCapital()))
	<tr>
		<th>{{ $bonusTexts[1] . ' ' . ++$building->level }}:</th>
		<td><b>{{ $building->total_bonus }} </b> {{ $bonusTexts[2] }}</td>
	</tr>
	@endif
</table>
