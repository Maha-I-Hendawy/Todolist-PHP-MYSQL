<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="public/css/main.css">
	<title>Home Page</title>
</head>
<body>
	<div>
		<h1>Add Todo:</h1>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
			<input type="text" name="todo">
		    <input type="submit" value="Add">
		</form>

		
	</div>

</body>
</html>

<?php
  require 'settings.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

  	$todo = $_POST['todo'];

  	$sql = "INSERT INTO todo (todo) VALUES (?)";
	$conn->prepare($sql)->execute([$todo]);

	$conn = null;
    header('Location: home.php');
    
  	}
  	else {

  		//$todo_id = $_GET['todo_id'];

  		$sql = "SELECT * FROM todo";
  		$stmt = $conn->prepare($sql);
	  	$stmt->execute();

	  	while ($row = $stmt->fetch()) {
            
            echo "<ul>";

            echo '<li><a href="todo.php?todo_id=' . 
            $row['todo_id'] . '">' . $row['todo']  . '</a></li>' ;

            echo "</ul";
	  
		        
		     }



		$conn = null;
  		

  	}
  	
  	
  


?>