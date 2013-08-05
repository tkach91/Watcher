<html>  
    <body>  
		<div class="content">
			
			<?php function get_date($date, $time)
			{
				$res['year'] = substr($date, 0, 4);
				$res['mon'] = substr($date, 5, 2);
				$res['day'] = substr($date, 8, 2);
				$res['hour'] = substr($time, 0, 2);
				$res['min'] = substr($time, 3, 2);
				$res['sec'] = substr($time, 6, 2);
				$res['uni'] = mktime($res['hour'], $res['min'], $res['sec'], $res['mon'], $res['day'], $res['year']);
				
				return $res;
			} ?>
			
			<? 
			echo '<h2>Имя игрока: ' . $name['name'] . '</h2>';
			echo form_open('main/show_activity/' . $id . '/');
			echo "<table>
					<tr>
						<td>с: <input type='text' name='start' class='datepicker'> по:<input type='text' name='stop' class='datepicker'>
						<input type='submit' value='Показать'</td>
					</tr>
					<tr><td>По умолчанию отображается информация за последние три дня</td></tr>
					<input type='hidden' name='id' value='" . $id . "'>
				</table>";
			echo form_close(); ?>
			
			<?php 
				$cur_date = '00-00-0000';
				$cur_uni = 0;
				foreach($o_list->result_array() as $row)
				{
					$date = get_date($row['activity_date'], $row['activity_time']);
					// Проверим дату, старая она или новая. Если новая
					if ($cur_date != $date['day'] . '-' . $date['mon'] . '-' . $date['year'])
					{
						echo '<table align="center" border="1" cellpadding="0" style="text-align:center; border-collapse: collapse;"><td>';
						echo '<table width="100" height="45" border="1" cellpadding="2" bgcolor="#ffd598" style="text-align:center; border-collapse: collapse; font-size:16"><td>' . $date['day'] . '-' . $date['mon'] . '-' . $date['year'] . '</td></table>';
						foreach ($coords->result_array() as $coor)
							echo '<table width="100" height="45" border="1" cellpadding="2" bgcolor="#eec0ee" style="text-align:center; border-collapse: collapse; font-size:16"><td>' . $coor['galaxy'] . ':' . $coor['system'] . ':' . $coor['planet'] . '</td></table>';
						echo '<td>';
						$cur_date = $date['day'] . '-' . $date['mon'] . '-' . $date['year'];
					}
					
					// Оформляем обломки
					if ((trim($row['derbis_met']) == 'No') && (trim($row['derbis_kris']) == 'No'))
						$derbis = '';
					else
						$derbis = $row['derbis_met'] . '/' . $row['derbis_kris'];
						
					// А это для активности
					$delim = ' | ';
					if (($row['planet_timer'] == 'inact') && ($row['moon_timer'] == 'inact'))
					{
						$row['planet_timer'] = '';
						$row['moon_timer'] = '';
						$delim = '';
						$color = 'FFFFFF';
					}
					else if ($row['planet_timer'] == '*' | $row['moon_timer'] == '*')
						$color = 'FF3000';
					else 
						$color = 'FF9933';
					
					// Проверяем дату и время
					if ($cur_uni+300 < $date['uni'])
					{
						echo '</td><td>';
						echo '<table width="50" height="45" border="1" cellpadding="2" bgcolor="#80dd80" style="text-align:center; border-collapse: collapse; font-size:16"><td>' . $date['hour'] . ':' . $date['min'] . '</td></table>';
						$cur_uni = $date['uni'];
						echo '<table width="50" height="45" border="1" cellpadding="2"  bgcolor="' . $color . '"style="text-align:center; border-collapse: collapse; font-size:11"><td><br><div style="font-size:9">' . $row['planet_timer'] . $delim . $row['moon_timer'] . '<br>' . $derbis . '</div></td></table>';
					}
					else
					{
						echo '<table width="50" height="45" border="1" cellpadding="2"  bgcolor="' . $color . '"style="text-align:center; border-collapse: collapse; font-size:11"><td><br><div style="font-size:9">' . $row['planet_timer'] . $delim . $row['moon_timer'] . '<br>' . $derbis . '</div></td></table>';
					}
				}
			?>