<html>  
    <body>  
		<div class="content">
			<!-- <script type="text/javascript">
				$(document).ready(function() {
				$("#object").tablesorter({sortList: [[0,1]]});
				});
			</script> -->
			
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
			
			<? echo $name->name;
			echo form_open('main/show_activity/' . $id . '/' . 'full');
			echo "<table>
					<tr>
						<td>с: <input type='text' name='start' class='datepicker'> по:<input type='text' name='stop' class='datepicker'>
						<input type='submit' value='Показать'</td>
					</tr>
					<tr><td>По умолчанию отображается информация за последние три дня</td></tr>
					<tr><td>" . anchor('main/show_activity/' . $id, 'Отобразить сжато') . "</td></tr>
					<tr><td>" . anchor('main/show_activity/' . $id . '/' . 'old', 'Прежний вид') . "</td></tr>
					<input type='hidden' name='id' value='" . $id . "'>
				</table>";
			echo form_close(); ?>
			
			<table border='1' id='object'>
			<thead>
				<tr>
					<th>Координаты / Время</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					echo "Нет его :(";
					/*foreach($o_list->result_array() as $row)
					{
						
						if ($cur_coor == $row['galaxy'] . ':' . $row['system'] . ':' . $row['planet'])
						{
							$date = get_date($row['activity_date'], $row['activity_time']);
							if (isset($old_date))
							{
								$dif = $date['uni'] - $old_date;
								if ($dif > 1020)
								{
									for ($i = 1; $i < round($dif / 900); $i++)
										echo '<td><table border="0" style="color:green"><tr><td height="30">Нет данных</td></tr></table></td>';
									//echo $row['galaxy'] . ':' . $row['system'] . ':' . $row['planet'] . '     ' . $old_date . '     ' . $oold_date . '     ' . $row['activity_date'] . '     ' . $row['activity_time'] . '     ' . $dif . '     ' . $dif / 900 . '<br>';
								}
							}
							
							if (($row['planet_timer'] == 'inact') & ($row['moon_timer'] == 'inact'))
							{
								$old_date = $date['uni'];
								$oold_date = $row['activity_date'] . ' ' . $row['activity_time'];
								echo '<td><table border="0" style="color:red"><tr><td height="50">' . $row['activity_date'] . '</td></tr><tr><td height="50">' . $row['activity_time'] . '</td></tr><tr><td height="50">' . 'planet ' . $row['planet_timer'] . '</td></tr><tr><td height="50">' . 'moon ' . $row['moon_timer'] , '</td></tr></table></td>';
							}
							else
							{
								$old_date = $date['uni'];
								$oold_date = $row['activity_date'] . ' ' .$row['activity_time'];
								echo '<td><table border="0"><tr><td height="50">' . $row['activity_date'] . '</td></tr><tr><td height="50">' . $row['activity_time'] . '</td></tr><tr><td height="50">' . 'planet ' . $row['planet_timer'] . '</td></tr><tr><td height="50">' . 'moon ' . $row['moon_timer'] , '</td></tr></table></td>';
							}
						}
						else
						{
							$cur_coor = $row['galaxy'] . ':' . $row['system'] . ':' . $row['planet'];
							echo '</tr><tr><td>' . $cur_coor . '</td>';
							
							if ($coord[$j] == true)
							{
								echo '<td><table border="0" style="color:green"><tr><td height="30">Нет данных</td></tr></table></td>';
							}	

							$j++;
							
							$date = get_date($row['activity_date'], $row['activity_time']);
							if (($row['planet_timer'] == 'inact') & ($row['moon_timer'] == 'inact'))
							{
								$old_date = $date['uni'];
								$oold_date = $row['activity_date'] . ' ' . $row['activity_time'];
								echo '<td><table border="0" style="color:red"><tr><td height="50">' . $row['activity_date'] . '</td></tr><tr><td height="50">' . $row['activity_time'] . '</td></tr><tr><td height="50">' . 'planet ' . $row['planet_timer'] . '</td></tr><tr><td height="50">' . 'moon ' . $row['moon_timer'] , '</td></tr></table></td>';
							}
							else
							{
								$old_date = $date['uni'];
								$oold_date = $row['activity_date'] . ' ' .$row['activity_time'];
								echo '<td><table border="0"><tr><td height="50">' . $row['activity_date'] . '</td></tr><tr><td height="50">' . $row['activity_time'] . '</td></tr><tr><td height="50">' . 'planet ' . $row['planet_timer'] . '</td></tr><tr><td height="50">' . 'moon ' . $row['moon_timer'] , '</td></tr></table></td>';
							}*/
							//unset($dif);
						//}
					//}
					//echo '</tr>';*/
				?>
			</tbody>
			</table>
		</div>
	</div>
    </body>     
</html>