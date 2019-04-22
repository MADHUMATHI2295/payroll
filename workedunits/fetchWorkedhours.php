
<?php

# Get JSON as a string
$json_str = file_get_contents('php://input');

//var_dump(json_decode($json));
$results = json_decode($json_str, true);
$results1 = json_decode($json_str, true);

//echo $results['BP'] . " ". $results['ticket'] . " ". $results['rate'];

include '../common/SqlConnection.php';

//$sql = "SELECT * from Workedhours where EmpId = '" . $results['EmpID'] . "'";
$sql = "SELECT * from Workedunits where EmpId = '" . $results['EmpID'] . "'";



$sql_currentMonth = "SELECT Month,Year FROM `currentmonthprocess` ORDER BY `createdDate` DESC LIMIT 1";

$result = $conn->query($sql);


$json_result = array();

if ($result->num_rows > 0) { 
    while($row = mysqli_fetch_assoc($result)){
        $json_result[] = $row;
        }
    //echo json_encode($json);
} 
// else {
//     echo "nothing"; //no row 
 //}
 else {
    $json_result[] = "nothing"; //no row 
}
if($json_result[0] !="nothing" )
{ 
    $result_currentMonth = $conn->query($sql_currentMonth);
    $json_currentMonth = array();
    if ($result_currentMonth->num_rows > 0) {
        // need to populate the entire page using the date and busnumber
       
        while($row = mysqli_fetch_assoc($result_currentMonth)){
            $json_currentMonth[] = $row;
            } 
    } else {
        $json_currentMonth[] =  "nothing"; //no row 
    }
}
else {
    $json_currentMonth[] =  "nothing"; //no row 
    unset($_SESSION['emp_id']);
}

$data = array();
$data['month'] = $json_currentMonth[0]['Month'];
$data['year'] = $json_currentMonth[0]['Year'];
$data['WorkedUnits'] = $json_result;
echo json_encode($data);



$conn->close();


?>