<html>
	<body>
		<?php 
			echo '<ul>';
				echo  '<li>' . anchor('main', 'Главная') . '</li>';
				echo  '<li>' . anchor('main/add_sacrifice', 'Добавить объект') . '</li>';
				echo  '<li>' . anchor('main/get_over', 'Взгляд от лица бота') . '</li>';
				echo  '<li>' . anchor('main/logout', 'Выход') . '</li>';
			echo '</ul>';
		?>
	</body>
</html>