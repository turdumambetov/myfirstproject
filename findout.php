<!DOCTYPE>
<html>
<head>

<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<title></title>
</head>
<body>


<?php
if (isset($_POST['search'])) {
    $poisk = $_POST['poisk'];
    $query = "SELECT * FROM `visit1` WHERE CONCAT(`name`) LIKE '%" . $poisk . "%'";
    $search_result = filterTable($query);
}

function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "stomotologia");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<form method="POST">
    <div>
    <table>
		<thead>	
			<tr>
			  <th>Ф.И.О</th>
			  <th>Дата</th>
			  <th>Телефон</th>
			  <th>Диагноз</th>
			  <th>действие</th>
			  <th>Оплата</th>
			  <th>Описание</th>
			</tr>
		</thead>
	<tbody>	
	<tr>	
		 <?php 
		 if (empty($search_result)) {

	}
	else{
		 while($row = mysqli_fetch_array($search_result)):
		    echo '<tr>';
			echo '<td>' . $row['name'] . '</td>';
			echo '<td>' . $row['date'] . '</td>';
			echo '<td>' . $row['phone_number'] . '</td>';
			echo '<td>' . $row['diagnoz'] . '</td>';
			if($row['act'] == 'удален'){
			echo '<td style="color:red;">' . $row['act'] . '</td>';	
			}
			elseif($row['act'] == 'поставлен'){
			echo '<td style="color:blue;">' . $row['act'] . '</td>';	
			}
			else{
				echo '<td>' . $row['act'] . '</td>';	
			}	
			echo '<td>' . $row['oplata'] .' сом' . '</td>';
			echo '<td>' . $row['text'] . '</td>';
			echo '</tr>';

		  endwhile; }
		?> 
	</tr>
</tbody>


    <div align="right">
        <fieldset align="">  
         
            <input  type="search" placeholder="Поиск" name="poisk"?>
            <button   name="search" method="POST" type="submit">Найти</button>
        
 		<a href="/index.php">Главная</a>
        </fieldset>
    
    </div>
    </form>


</body>
</html>