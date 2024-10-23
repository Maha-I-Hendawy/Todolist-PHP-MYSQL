<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>One Todo</title>
</head>
<body>
	<?php 

	require 'settings.php';

	$todo_id = $_GET['todo_id'];

	$sql = "SELECT * FROM todo WHERE todo_id = ?";

	$stmt = $conn->prepare($sql);

	$stmt->execute([$todo_id]);

	while($row = $stmt->fetch()){

		echo '<h3>' . $row['todo'] . '</h3>';

		 echo  '<a href="update.php?todo_id=' . 
            $row['todo_id'] . '">' . 'Update'; 


            echo  '</a>';


            echo  '<a href="delete.php?todo_id=' .
            $row['todo_id'] . '">' . 'Delete';


            echo '</a>';
	}



	?>

</body>
</html>