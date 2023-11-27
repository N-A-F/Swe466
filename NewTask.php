<?php

if (isset($_POST['submit'])) {

  include "db_conn.php";

  $Task = $_POST['Task'];
  $Start = $_POST['Start'];
  $End = $_POST['End'];
  //$Duration = $_POST['Duration'];
  //die($Duration);

  $query = "INSERT INTO tasks (Name,Start,End) VALUES ('$Task','$Start','$End')";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    echo 'failedd';
  } else {
    echo ("<script>location.href='Task.php';</script>");
  }
}
