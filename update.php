<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Todo</title>
</head>
<body>
	<h1>Update Todo: </h1>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
		<?php

		   require 'settings.php';

       $todo_id = $_GET["todo_id"];


		  $sql = "SELECT todo from todo WHERE todo_id=?";
  	  $stmt = $conn->prepare($sql);
	    $stmt->execute([$todo_id]);

	    while ($row = $stmt->fetch()) {
            
           
            echo '<input type="text" name="todo" value=" ' . $row['todo'] . ' ">';

    
	  
		        
		     }

		?>
		
		<input type="submit" value="Update">
	</form>

</body>
</html>

<?php 

 
  //echo $todo_id;

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $todo_id = $_GET["todo_id"];
  	$todo = $_POST['todo'];

  	$sql = "UPDATE todo SET todo=:todo WHERE todo_id=:todo_id";
  	$stmt = $conn->prepare($sql);
  	$stmt->bindParam(':todo', $todo);
  	$stmt->bindParam(':todo_id', $todo_id);
  	$stmt->execute();

	  $conn = null;
  		
  	header('Location: home.php');


  }
  







?>