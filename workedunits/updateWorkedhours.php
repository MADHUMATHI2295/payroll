<?php 


# Get JSON as a string
$json_str = file_get_contents('php://input');

//var_dump(json_decode($json));
$results = json_decode($json_str, true);
include '../common/SqlConnection.php';

 
$sql1 = "Update workedunits SET EmpID = '". $results['EmpID'] . "',Period = '" . $results['Period'] . "',Month = '" 
. $results['Month'] . "',Year = '" . $results['Year'] . "',WorkedUnits = '" . $results['WorkedUnits'] . "',LeaveUnits = '" . $results['LeaveUnits'] 
. "',TotalUnits = '" . $results['TotalUnits']  ."' Where EmpID = '" . $results['EmpID'] . "'";
echo $sql1;
$result1 = $conn->query($sql1);
if ($result1 == 1) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

//echo $sql1;

$result1 = $conn->query($sql1);

$conn->close();

?>