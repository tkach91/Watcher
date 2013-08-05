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
			
			<?php
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
			
			<table border='1' id='object'>
			<thead>
				<tr>
					<th>Координаты / Время</th>
					<th>Легенда</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$cur_coor = '1:1:1';
					$j = 1;
					echo '<tr>';
					foreach($o_list->result_array() as $row)
					{
						// Если мы работаем с одними и теми же координатами
						if ($cur_coor == $row['galaxy'] . ':' . $row['system'] . ':' . $row['planet'])
						{
							$date = get_date($row['activity_date'], $row['activity_time']);
							/*if (isset($old_date))
							{
								$dif = $date['uni'] - $old_date;
								if ($dif > 1020)
								{
									for ($i = 1; $i < round($dif / 900); $i++)
										echo '<td><table border="0"><tr><td height="10">Нет данных</td></tr></table></td>';
									//echo $row['galaxy'] . ':' . $row['system'] . ':' . $row['planet'] . '     ' . $old_date . '     ' . $oold_date . '     ' . $row['activity_date'] . '     ' . $row['activity_time'] . '     ' . $dif . '     ' . $dif / 900 . '<br>';
								}
							}*/
							echo '<td><table border="0"><tr><td height="10">' . $date['day'] . '-' . $date['mon'] . '-' . $date['year'] . '</td></tr><tr><td height="10">' . $row['activity_time'] . '</td></tr><tr><td height="10">' . $row['planet_timer'] . '</td></tr><tr><td height="10">' . $row['moon_timer'] . '</td></tr><tr><td height="10">' . $row['derbis_met'] . '/' . $row['derbis_kris'] . '</td></tr></table></td>';

							/*if (($row['planet_timer'] == 'inact') & ($row['moon_timer'] == 'inact'))
							{
								$old_date = $date['uni'];
								$oold_date = $row['activity_date'] . ' ' . $row['activity_time'];
								echo '<td><table border="0"><tr><td height="10">' . $date['day'] . '-' . $date['mon'] . '</td></tr><tr><td height="10">' . $row['activity_time'] . '</td></tr><tr><td height="10">' . $row['timer'] . '</td></tr></table></td>';
							}
							else
							{
								$old_date = $date['uni'];
								$oold_date = $row['activity_date'] . ' ' .$row['activity_time'];
								echo '<td><table border="0"><tr><td height="10">' . $date['day'] . '-' . $date['mon'] . '</td></tr><tr><td height="10">' . $row['activity_time'] . '</td></tr><tr><td height="10">' . $row['timer'] . '</td></tr></table></td>';
							}*/
						}
						// Если приехали новые координаты
						else
						{
							$cur_coor = $row['galaxy'] . ':' . $row['system'] . ':' . $row['planet'];
							echo '</tr><tr><td>' . $cur_coor . '</td>';
							echo '<td><table border="0"><tr><td height="10">Дата</td></tr><tr><td height="10">Время сбора данных</td></tr><tr><td height="10">Таймер планеты</td></tr><tr><td height="10">Таймер луны</td></tr><tr><td height="10">ПО мет/крис</td></tr></table></td>';
							
							/*if ($coord[$j] == true)
							{
								echo '<td><table border="0"><tr><td height="10">Нет данных</td></tr></table></td>';
							}*/

							// $j++;
							
							// Получили текущие дату и время, собрали их в единое целое
							$date = get_date($row['activity_date'], $row['activity_time']);
							/*
							if (($row['planet_timer'] == 'inact') & ($row['moon_timer'] == 'inact'))
							{
								$old_date = $date['uni'];
								$oold_date = $row['activity_date'] . ' ' . $row['activity_time'];
								echo '<td><table border="0" style=><tr><td height="10">' . $date['day'] . '-' . $date['mon'] . '</td></tr><tr><td height="10">' . $row['activity_time'] . '</td></tr><tr><td height="10">' . $row['timer'] . '</td></tr></table></td>';
							}
							else
							{
							*/
								// $old_date = $date['uni'];
								// $oold_date = $row['activity_date'] . ' ' .$row['activity_time'];
								echo '<td><table border="0"><tr><td height="10">' . $date['day'] . '-' . $date['mon'] . '-' . $date['year'] . '</td></tr><tr><td height="10">' . $row['activity_time'] . '</td></tr><tr><td height="10">' . $row['planet_timer'] . '</td></tr><tr><td height="10">' . $row['moon_timer'] . '</td></tr><tr><td height="10">' . $row['derbis_met'] . '/' . $row['derbis_kris'] . '</td></tr></table></td>';
							// }
							// unset($dif);
						}
					}
					echo '</tr>';
				?>
			</tbody>
			</table>
		</div>
	</div>
    </body>     
</html>