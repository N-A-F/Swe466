<?php 

if (isset($_POST['submit'])) {

	include "db_conn.php";

	$Resource = $_POST['Resource'];
	$Type = $_POST['Type'];
  $Material = $_POST['Material'];
  $Max = $_POST['Max'];
  $Rate = $_POST['Rate'];
  $Ovt = $_POST['Ovt'];
  //$Cost = $_POST['Cost'];
 
  $query = "INSERT INTO resource (res,type,material,max,rate,ovt) VALUES ('$Resource','$Type','$Material','$Max','$Rate','$Ovt');";
	$result = mysqli_query($conn, $query);

  if(!$result){
    echo'failed';
  }
  else{
    echo("<script>location.href='Material.php';</script>");
  }
}
