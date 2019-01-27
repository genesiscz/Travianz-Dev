<form action="finish" method="post">
<p>
	<span class="f10 c">Multihunter account</span>
		<table>
			<tr><td>Name:</td><td><input type="text" value="Multihunter" disabled="disabled"></td></tr>
			<tr><td>Password:</td><td><input type="password" name="multihunter_password" id="multihunter_password" value=""></td></tr>
			<tr>
				<td>Tribe:</td>
				<td>
				<select name="multihunter_tribe">
               <option value="1" selected="selected">Romans</option>
               <option value="2">Teutons</option>
               <option value="3">Gauls</option>
               <option value="4">Nature</option>
               <option value="5">Natars</option>
            </select>
				</td>
			</tr>
		</table>

<p>
	<span class="f10 c">Support account</span>
		<table>
			<tr><td>Name:</td><td><input type="text" value="Support" disabled="disabled"></td></tr>
			<tr><td>Password:</td><td><input type="password" name="support_password" id="support_password" value=""></td></tr>
		</table>
	<br />
	<div style="text-align: center">
	   <button id="btn_train" class="trav_buttons" value="createAccounts" name="action" onclick="setTimeout('this.disabled=true', 1);"> Create Accounts </button>
	</div>
</form>
</div>
