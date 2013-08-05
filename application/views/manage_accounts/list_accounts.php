<html>  
    <body>  
		<div class="content">
			<script type="text/javascript">
				$(document).ready(function() {
				$("#accounts").tablesorter({sortList: [[0,0]]});
				});
			</script>	
			<table border='1' id='accounts' class='tablesorter'>
			<thead>
				<tr><th>Имя аккаунта</th>
					<td>Пароль</td>
					<td>Цель</td>
					<td>Владелец</td>
					<td>Изменить данные</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($o_list->result_array() as $row): ?>
					<tr>
						<td><? echo $row['account_name']; ?></td>
						<td><? echo $row['account_password']; ?></td>
						<td><? echo $row['account_target']; ?></td>
						<td><? echo $row['user_name']; ?></td>
						<td><? echo anchor('main/edt_account/' . $row['account_id'], 'Редактировать данные'); ?></td>
						
					</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
		</div>
	</div>
    </body>     
</html>