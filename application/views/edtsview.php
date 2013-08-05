<html>  
    <body>  
		<div class="content">
			<script type="text/javascript">
				$(document).ready(function() {
				$("#objects").tablesorter({sortList: [[0,0]]});
				});
			</script>
			<table>
			<?php 
				echo "<tr><td>Имя жертвы: ";
				echo "$name->name" . "</td></tr><tr><td>" . anchor('main/edt_name/' . $o_id, 'Редактировать имя') . "</td></tr>";
			?>
			</table>
			<table border='1' id='objects' class='tablesorter'>
			<thead>
				<tr><th>#</th>
					<th>Координаты</th>
					<td>Изменить данные</td>
					<td>Удалить</td>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; foreach($planets->result_array() as $row): ?>
					<tr>
						<td><? echo $i++; ?> </td>
						<td><? 
							if ($row['is_main'] == 1)
								echo $row['galaxy'] . ':' . $row['system'] . ':' . $row['planet'] . ' (ГП)';
							else
								echo $row['galaxy'] . ':' . $row['system'] . ':' . $row['planet'];
						?></td>
						<td><? echo anchor('main/edt_coord/' . $row['p_id'] . '/' . $o_id, 'Редактировать планету');?></td>
						<td><? echo anchor('main/del_coord/' . $row['p_id'] . '/' . $o_id, 'Удалить планету и её историю активности');?></td>				
					</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
			<table>
				<?php echo "<tr><td>" . anchor('main/add_planet/' . $o_id, 'Добавить планету') . "</td></tr>"; ?>
			</table>
		</div>
	</div>
    </body>     
</html>