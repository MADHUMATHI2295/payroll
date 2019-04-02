<?php
$a=$_POST["firstname"];
$b=$_POST["lastname"];

$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,'insert1');
$insert="insert into user(firstname,lastname)values('$a','$b')";
if (mysqli_query($con, $insert)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($con);
}

mysqli_close($con);
?>