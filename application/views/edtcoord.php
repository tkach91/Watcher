<html>  
    <body>   
		<div class="content">
        <? echo form_open('main/updt_coord');?>     
			<table>
				<tr>
					<?php 
						  echo "<td>Галактика<input type='text' name='galaxy' value='" . $planet->galaxy ."'></td>";
						  echo "<td>Система<input type='text' name='system' value='" .  $planet->system ."'></td>";
						  echo "<td>Планета<input type='text' name='planet' value='" .  $planet->planet ."'></td>";
						  
						  if ($planet->moon == 1)
						      echo "<td><input type=checkbox name='moon' value='no' checked='yes'>Луна<br></td>";
						  else
							  echo "<td><input type=checkbox name='moon' value='no'>Луна<br></td>"; 
							  
						  if ($planet->is_main == 1)
							  echo "<td><input type=checkbox name='main' value='no' checked='yes'>Главная<br></td>";
						  else
							  echo "<td><input type=checkbox name='main' value='no'>Главная<br></td>"; 
							  
						  echo "<td><input type='hidden' name='p_id' value='" . $planet->p_id . "'></td>";
						  echo "<td><input type='hidden' name='ob_id' value='" . $planet->ob_id . "'></td>"; ?>
					<td><input type='submit' value='Добавить'</td>
				</tr>
			</table>
        <? echo form_close(); ?>  
		</div>
	</div>		
    </body>     
</html>   