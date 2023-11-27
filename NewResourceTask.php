<?php

if (isset($_POST['submit'])) {

  include "db_conn.php";

  $Name = $_POST['Name'];
  $res = $_POST['res'];

  //$query = "UPDATE tasks SET res='$res' WHERE Name = '$Name'";
  $query_mtm = "INSERT INTO restotask (taskName, resName) VALUES ('$Name', '$res')";

  //$result = mysqli_query($conn, $query);
  $result_mtm = mysqli_query($conn, $query_mtm);

  // if (!$result) {
  //   echo 'failed result';
  // } else {
  //   echo ("<script>location.href='ResourceTask.php';</script>");
  // }

  if (!$result_mtm) {
    echo 'failed result_mtm';
  } else {
    echo ("<script>location.href='ResourceTask.php';</script>");
  }
}
