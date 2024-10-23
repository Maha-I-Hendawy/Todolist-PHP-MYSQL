<?php 

require 'settings.php';

$todo_id = $_GET['todo_id'];

$sql = "DELETE FROM todo WHERE todo_id=?";
$conn->prepare($sql)->execute([$todo_id]);

header("Location: home.php");

?>