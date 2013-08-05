<html>  
    <body>   
		<div class="content">
        <? echo form_open('main/add_coord');?>     
			<table>
				<tr>
					<?php 
						  echo "<td>Галактика<input type='text' name='galaxy'></td>";
						  echo "<td>Система<input type='text' name='system'></td>";
						  echo "<td>Планета<input type='text' name='planet'></td>";
					      echo "<td><input type=checkbox name='moon' value='no'>Луна<br></td>"; 
						  echo "<td><input type=checkbox name='main' value='no'>Главная<br></td>"; 
						  echo "<td><input type='hidden' name='ob_id' value='" . $ob_id . "'></td>"; ?>
					<td><input type='submit' value='Добавить'</td>
				</tr>
			</table>
        <? echo form_close(); ?>  
		</div>
	</div>		
    </body>     
</html>   