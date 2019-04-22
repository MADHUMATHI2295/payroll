
<?php

# Get JSON as a string
$Month = $_POST['month'];

//var_dump(json_decode($json));
//$results = json_decode($json_str, true);
 
include '../common/SqlConnection.php';
//select the row which has this date and busnumber if it is there...
$sql = "SELECT * from WorkedUnits where Month='$Month'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $json = array();
    while($row = mysqli_fetch_assoc($result)){
        $json[] = $row;
        }
    echo json_encode($json);
} else {
    echo "nothing"; //no row 
}
$conn->close();

?>