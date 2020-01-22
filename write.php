<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/stylew.css">
	<title></title>
</head>
<body>
<?php
require "db.php";
$data = $_POST;
if (isset($data['addition'])) 
{
	$errors = array();
	if (trim($data['name'])=='') {
			$errors[] = "Введите ФИО!";
		}	
	if (trim($data['phone_number'])=='') {
			$errors[] = "Введите номер телефона!";
		}		
	if ($data['diagnoz']=='') {
			$errors[] = "выберите диагноз";
		}	
	
	if(empty($errors)){ //все ок регаем

		$visit1 = R::dispense('visit1');
		$visit1->name=$data['name'];
		$visit1->date=$data['date'];
		$visit1->phone_number=$data['phone_number'];
		$visit1->diagnoz=$data['diagnoz'];
		$visit1->act=$data['act'];
		$visit1->oplata=$data['oplata'];
		$visit1->text=$data['text'];
		R::store($visit1);

		echo '<div style="color: green;text-align:center;">Данные внесены!!!</div><hr>';

		 

	}
	else{
		echo '<div style="color: red; text-align:center;">'.array_shift($errors).'</div><hr>';


	}
}

?>



<center>
<form action="/write.php" method="POST">
<table >
   <caption>Запись</caption>
   <tr>
	    <tr><th>ФИО</th><td>
			<input  class="form-control" size="28" type="text" required  name="name" value="" placeholder="ФИО"> </td></tr>
		
	    <tr><th>Дата</th><td>	<input type="date" name="date" value=""></td></tr>
		
	    <tr><th>Телефон</th><td><input type="tel" required  name="phone_number" placeholder="+996"></td></tr>
	   <tr><th>Диагноз</th><td>
			<select type="text" name="diagnoz" onChange="Selected(this)" >				
				<option value="empty" selected></option>
		            <?php
			            $connect = mysqli_connect("localhost" ,"root","","stomotologia");
			            $query = "SELECT * FROM `teeth`";

					$result1 = mysqli_query($connect, $query);

		            while($row1 = mysqli_fetch_array($result1)):;?>

		            <option value="<?php echo $row1[1];?>"><?php echo $row1[0];?></option>

		            <?php endwhile;?>

        </select>
        <div id='Label1' style='display: none;'>
	<select type="text" name="act" >				 
				<option value="empty" selected></option>
			    <option value="удален">удален</option>
			    <option value="поставлен">поставлен</option>
			    <option value="почистил">почистил</option>
			    <option value="др">др</option>
  			</select> </td></tr>

</div>
<div id='Label2' style='display: none;'>
	.............
</div>
<div id='Label3' style='display: none;'>
	....................
</div>
<script type="text/javascript" src="script.js"></script></td></tr>


	    <tr><th>Оплата</th>
		<td>	<input type="number" name="oplata" step="100" min="0"></td></tr>
   </tr>
<table >
   <tr>
	    <th>Описание</th>
	   
   </tr>
	<tr>
		<td>
			<textarea rows="" cols="60" name="text"></textarea></td><br>
	</tr>
	<tr> <th>ФОТО</th> </tr><tr>
		<td><input type="file" name="img_file"></td>
	</tr>
</table>

<BUTTON class="button1" type="submit" name="addition" >Сохранить</BUTTON>
</table>
</form>
</center>


</body>
</html>
