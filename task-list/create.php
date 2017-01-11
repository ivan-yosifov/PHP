<?php

include_once 'connect.php';

if(isset($_POST['name']) && isset($_POST['description'])){
  $name = $_POST['name'];
  $description = $_POST['description'];

  try{
    $createQuery = "INSERT INTO tasks(name, description, created_at)
      VALUES(:name, :description, now())";

    $stmt = $conn->prepare($createQuery);
    $stmt->execute(array(":name"=>$name, ":description"=>$description));

    if($stmt){
      echo "Record Inserted";
    }

  }catch(PDOException $ex){
    echo "An error occurred: " . $ex->getMessage();
  }
}