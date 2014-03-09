<?php

$con=mysqli_connect("host","username","password","database");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="INSERT INTO my_time (Name, Activity, Time)
VALUES
('$_POST[my_name]','$_POST[my_activity]','$_POST[my_time]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }

header("Location: index.php");
die();

mysqli_close($con);

?>