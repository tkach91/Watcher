<html>  
    <body>   
		<div class="content">
        <? echo form_open('main/add_account');?>     
			<table>
				<tr>
					<?php 
						  echo "<tr><td>Название аккаунта<input type='text' name='name'></td></tr>";
						  echo "<tr><td>Пароль<input type='text' name='pass'></td></tr>";
						  echo '<tr><td>Наблюдение: <input type="radio" checked="checked" name="target" value="watch"><br> Проверка ПО: <input type="radio" name="target" value="derbis"></td></tr>'; 
						  echo "<tr><td><input type='hidden' name='owner_id' value='" . $account_owner . "></td></tr>";
						  echo "<tr><td><input type='submit' value='Добавить'</td></tr>"; ?>
				</tr>
			</table>
        <? echo form_close(); ?>  
		</div>
	</div>		
    </body>     
</html>   