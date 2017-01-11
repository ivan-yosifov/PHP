<?php

include_once 'connect.php';

if(isset($_POST['id'])){
  $id = $_POST['id'];

  try{
    $deleteQuery = "DELETE FROM tasks WHERE id = :id";

    $stmt = $conn->prepare($deleteQuery);
    $stmt->execute(array(":id"=>$id));

    if($stmt){
      echo "Task deleted successfully";
    }

  }catch(PDOException $ex){
    echo "An error occurred: " . $ex->getMessage();
  }
}