<html>  
    <body>  
		<div class="content">
			<script type="text/javascript">
				$(document).ready(function() {
				$("#object").tablesorter({sortList: [[0,1]]});
				});
			</script>
			
			<?
				function get_date($date, $time)
				{
					$res['year'] = substr($date, 0, 4);
					$res['mon'] = substr($date, 5, 2);
					$res['day'] = substr($date, 8, 2);
					$res['hour'] = substr($time, 0, 2);
					$res['min'] = substr($time, 3, 2);
					$res['sec'] = substr($time, 6, 2);
					$res['uni'] = mktime($res['hour'], $res['min'], $res['sec'], $res['mon'], $res['day'], $res['year']);
					
					return $res;
				}
			?>
			
			<? //echo $name->name;
			echo form_open('main/show_activity/' . $id . '/' . 'old');
			echo "<table>
					<tr>
						<td>с: <input type='text' name='start' class='datepicker'> по:<input type='text' name='stop' class='datepicker'>
						<input type='submit' value='Показать'</td>
					</tr>
					<tr><td>По умолчанию отображается информация за последние три дня</td></tr>
					<tr><td>" . anchor('main/show_activity/' . $id, 'Отобразить сжато') . "</td></tr>
					<tr><td>" . anchor('main/show_activity/' . $id . '/' . 'full', 'Отобразить подробно') . "</td></tr>
					<input type='hidden' name='id' value='" . $id . "'>
				</table>";
			echo form_close(); ?>
			
						<table border='1' id='object' class='tablesorter'>
			<thead>
				<tr><th>Планета</th>
					<th>Дата</th>
					<th style="display: none"></th>
					<th>Время</th>
					<th style="display: none"></th>
					<td>Состояние</td>
					<td>На планете</td>
					<td>На луне</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($o_list->result_array() as $row): ?>
					<tr>
						<? $date = get_date($row['activity_date'], $row['activity_time']+3*60*60); ?>
						<td><? echo $row['galaxy'] . ':' . $row['system'] . ':' . $row['planet'];?></td>
						<td><? echo $row['activity_date']; ?></td>
						<td style="display: none"><? echo $date['uni'] ?></td>
						<td><? echo $row['activity_time']; ?></td>
						<td style="display: none"><? echo $date['uni'] ?></td>
						<td><? echo $row['timer']; ?></td>
						<td><? echo $row['planet_timer']; ?></td>
						<td><? echo $row['moon_timer']; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
		</div>
	</div>
    </body>     
</html>