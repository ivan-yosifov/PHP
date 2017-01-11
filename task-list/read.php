<?php

include_once 'connect.php';

try{
  $readQuery = "SELECT * FROM tasks";

  $stmt = $conn->query($readQuery);
  while($task = $stmt->fetch(PDO::FETCH_OBJ)){
    $create_date = strftime("%b %d, %Y", strtotime($task->created_at));
    $output = "<tr>
          <td title=\"Click to edit\">
            <div class=\"editable\" onclick=\"makeElementEditable(this)\" onblur=\"updateTaskName(this, '{$task->id}')\">$task->name</div>
          </td>
          <td title=\"Click to edit\">
            <div  class=\"editable\" onclick=\"makeElementEditable(this)\" onblur=\"updateTaskDescription(this, '{$task->id}')\">$task->description</div>
          </td>
          <td title=\"Click to edit\">
            <div  class=\"editable\" onclick=\"makeElementEditable(this)\"  onblur=\"updateTaskStatus(this, '{$task->id}')\">$task->status</div>
          </td>
          <td>
            <div>$create_date</div>
          </td>
          <td style=\"width: 5%;\">
            <button class=\"btn-danger\" onclick=\"deleteTask('{$task->id}')\"><i class=\"fa fa-times\"></i></button>
          </td>
        </tr>";
    echo $output;
  }
  
}catch(PDOException $ex){
  echo "An error occurred: " . $ex->getMessage();
}