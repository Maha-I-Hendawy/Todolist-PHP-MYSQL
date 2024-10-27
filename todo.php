<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="public/css/main.css">
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

		echo '<h3 class="header">' . $row['todo'] . '</h3>';

		echo '<div class="buttons">';

		 echo  '<a href="update.php?todo_id=' . 
            $row['todo_id'] . '" class="button">' . 'Update'; 


            echo  '</a>';


            echo  '<a href="delete.php?todo_id=' .
            $row['todo_id'] . '" class="button">' . 'Delete';


            echo '</a>';

       echo '</div>';
	}



	?>

</body>
</html>