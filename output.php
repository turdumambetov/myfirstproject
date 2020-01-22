<link rel="stylesheet" type="text/css" href="css/style.css">
<?php
require "db.php";// библиотека redbeanphp
$out = R::getAssoc('SELECT * FROM visit');
?>

<table>
	<thead>	


<tr>
  <th>Ф.И.О</th>
  <th>Дата</th>
  <th>Телефон</th>
  <th>Диагноз</th>
  <th>Оплата</th>
  <th>Описание</th>
</tr>
	</thead>
	<tbody>	
	<tr>	
	<?php
foreach ($out as $row){
	echo '<tr>';
	echo '<td>' . $row['name'] . '</td>';
	echo '<td>' . $row['date'] . '</td>';
	echo '<td>' . $row['phone_number'] . '</td>';
	echo '<td>' . $row['diagnoz'] . '</td>';
	echo '<td>' . $row['oplata'] .' сом' . '</td>';
	echo '<td>' . $row['text'] . '</td>';
	echo '</tr>';
}
?> 
	</tr>
</tbody>



</table>
