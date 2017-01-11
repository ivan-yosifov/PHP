<?php

include_once 'connect.php';

if(isset($_POST['name']) && isset($_POST['id'])){
  $name = trim($_POST['name']);
  $id = $_POST['id'];

  try{
    $updateQuery = "UPDATE tasks SET name = :name WHERE id = :id";

    $stmt = $conn->prepare($updateQuery);
    $stmt->execute(array(":name"=>$name, ":id"=>$id));

    if($stmt->rowCount() === 1){
      echo "Task name updated successfully";
    }else{
      echo "No changes made";
    }

  }catch(PDOException $ex){
    echo "An error occurred: " . $ex->getMessage();
  }
}else if(isset($_POST['description']) && isset($_POST['id'])){
  $description = trim($_POST['description']);
  $id = $_POST['id'];

  try{
    $updateQuery = "UPDATE tasks SET description = :description WHERE id = :id";

    $stmt = $conn->prepare($updateQuery);
    $stmt->execute(array(":description"=>$description, ":id"=>$id));

    if($stmt->rowCount() === 1){
      echo "Task description updated successfully";
    }else{
      echo "No changes made";
    }

  }catch(PDOException $ex){
    echo "An error occurred: " . $ex->getMessage();
  }
}else if(isset($_POST['status']) && isset($_POST['id'])){
  $status = trim($_POST['status']);
  $id = $_POST['id'];

  try{
    $updateQuery = "UPDATE tasks SET status = :status WHERE id = :id";

    $stmt = $conn->prepare($updateQuery);
    $stmt->execute(array(":status"=>$status, ":id"=>$id));

    if($stmt->rowCount() === 1){
      echo "Task status updated successfully";
    }else{
      echo "No changes made";
    }

  }catch(PDOException $ex){
    echo "An error occurred: " . $ex->getMessage();
  }
}