@component('installation.layout')
<form action="{{ route('installation.accounts') }}" method="post">
@csrf
<p>
	<span class="f10 c">@lang('installation/accounts.multihunter_account')</span>
		<table>
			<tr>
				<td>@lang('installation/accounts.password'):</td>
				<td>
					<input type="password" pattern=".{6,100}" name="multihunter[password]" value="{{ old('multihunter.password') }}" required>
					<div class="error">{{ $errors->first('multihunter.password') }}</div>
				</td>
			</tr>
			<tr>
				<td>@lang('tribes.tribe'):</td>
				<td>
					<select name="multihunter[tribe]">
               	<option value="1" {{ old('multihunter.tribe', 1) == 1 ? 'selected' : '' }}">{{ ucfirst(trans('tribes.romans')) }}</option>
               	<option value="2" {{ old('multihunter.tribe') == 2 ? 'selected' : '' }}>{{ ucfirst(trans('tribes.teutons')) }}</option>
               	<option value="3" {{ old('multihunter.tribe') == 3 ? 'selected' : '' }}>{{ ucfirst(trans('tribes.gauls')) }}</option>
               	<option value="4" {{ old('multihunter.tribe') == 4 ? 'selected' : '' }}>{{ ucfirst(trans('tribes.nature')) }}</option>
               	<option value="5" {{ old('multihunter.tribe') == 5 ? 'selected' : '' }}>{{ ucfirst(trans('tribes.natars')) }}</option>
            	</select>
					<div class="error">{{ $errors->first('multihunter.tribe') }}</div>
				</td>
			</tr>
		</table>

<p>
	<span class="f10 c">@lang('installation/accounts.support_account')</span>
		<table>
			<tr>
				<td>@lang('installation/accounts.password'):</td>
				<td>
					<input type="password" pattern=".{6,100}" name="support[password]" value="{{ old('support.password') }}" required>
					<div class="error">{{ $errors->first('support.password') }}</div>
				</td>
			</tr>
		</table>
	<br />
	<div style="text-align: center">
	   <button id="btn_train" class="trav_buttons" value="store" name="action" onclick="setTimeout('this.disabled=true', 1);"> @lang('installation/accounts.create') </button>
	</div>
</form>
@endcomponent