<html>  
    <body>   
		<div class="content">
        <? echo form_open('main/updt_name');?>     
			<table>
				<tr>
					<?php   echo "<td>Имя жертвы:</td>";
							echo "<td><input type='text' name='name' value='" . $name->name . "'></td>";
							echo "<td><input type='hidden' name='id' value='" . $o_id . "'></td>";
					?>
					<td><input type='submit' value='Добавить'</td>
				</tr>
			</table>
        <? echo form_close(); ?>  
		</div>
	</div>		
    </body>     
</html>   