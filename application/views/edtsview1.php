<html>  
    <body>   
		<div class="content">
        <? echo form_open('main/updt_object');?>     
			<table>
				<tr>
					<?php   echo "<td>Имя жертвы:</td>";
							echo "<td><input type='text' name='name' value='" . $name->name . "'></td>";
							$i = 1;
							foreach($planets->result_array() as $row):
								$plan = $row['p_id'];
								$gal = $row['galaxy'];
								$sys = $row['system'];
								$pln = $row['planet'];
								$moon = $row['moon'];
								echo "<tr>";
								echo "<td>Планета " . $i . "</td>";
								echo "<td>Галактика<input type='text' name='galaxy" . $i . "' value='" . $gal ."'></td>";
								echo "<td>Система<input type='text' name='system" . $i . "' value='" . $sys ."'></td>";
								echo "<td>Планета<input type='text' name='planet" . $i . "' value='" . $pln ."'></td>";
								if ($moon == 1)
									echo "<td><input type=checkbox name='moon" . $i . "' value='no' checked='yes'>Луна<br></td>";
								else
									echo "<td><input type=checkbox name='moon" . $i . "' value='no'>Луна<br></td>"; 
								echo "<td><input type='hidden' name='p_id" . $i . "' value='" . $plan . "'></td>";
								echo "</tr>";
								$i++;
							endforeach;
							echo "<td><input type='hidden' name='num_of_planets' value='" . ($i-1) . "'></td>";
							for ($i; $i < 16; $i++)
							{
								echo "<tr>";
								echo "<td>Планета " . $i . "</td>";
								echo "<td>Галактика<input type='text' name='galaxy" . $i . "'></td>";
								echo "<td>Система<input type='text' name='system" . $i . "'></td>";
								echo "<td>Планета<input type='text' name='planet" . $i . "'></td>";
								echo "<td><input type=checkbox name='moon" . $i . "' value='no'>Луна<br></td>";
								echo "</tr>";
						  }
					echo "<td><input type='hidden' name='id' value='" . $o_id . "'></td>";
					?>
					<td><input type='submit' value='Добавить'</td>
				</tr>
        <? echo form_close(); ?>  
		</div>
	</div>		
    </body>     
</html>   