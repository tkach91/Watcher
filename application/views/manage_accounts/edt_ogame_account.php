<html>  
    <body>   
		<div class="content">
        <? echo form_open('main/update_account');?>     
			<table>
				<tr>
					<?php 
						  echo "<td>�������� ��������<input type='text' name='name' value='" . $account->account_name . "></td>";
						  echo "<td>������<input type='text' name='pass' value='" . $account->account_password . "></td>";
						  if ($account->account_target == 'watch')
							echo '����������: <input type="radio" checked="checked" name="target" value="watch"><br> �������� ��: <input type="radio" name="target" value="derbis">'; 
						  else
						    echo '����������: <input type="radio" name="target" value="watch"><br> �������� ��: <input type="radio" checked="checked" name="target" value="derbis">'; 
						  echo "<td><input type='hidden' name='id' value='" . $account->account_id . "></td>"; 
						  echo "<td><input type='hidden' name='owner_id' value='" . $account->account_owner . "></td>";?>
					<td><input type='submit' value='��������'</td>
				</tr>
			</table>
        <? echo form_close(); ?>  
		</div>
	</div>		
    </body>     
</html>   