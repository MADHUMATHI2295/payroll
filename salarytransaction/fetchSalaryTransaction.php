
<?php
// Start the session
//session_start();

# Get JSON as a string
$json_str = file_get_contents('php://input');
 
//var_dump(json_decode($json));
$results = json_decode($json_str, true);
// Set session variables
// if($results === NULL && isset($_SESSION["emp_id"]))
// {

//     $results = $_SESSION["emp_id"];
// }
// else if($results != NULL)
// {
//     $_SESSION["emp_id"] =$results;
// }
// if($results != NULL)
// {
//echo $results['BP'] . " ". $results['ticket'] . " ". $results['rate'];

include '../common/SqlConnection.php';
//select the row which has this date and busnumber if it is there...
$sql = "SELECT * from Salarytrans where EmpId = '" . $results['EmpID'] . "'";
$sql_currentMonth = "SELECT Month FROM currentmonthprocess";
//intersect
// "SELECT * from currentmonthprocess;

$result = $conn->query($sql);
$json_result = array();
if ($result->num_rows > 0) {
    // need to populate the entire page using the date and busnumber
    while($row = mysqli_fetch_assoc($result)){
        $json_result[] = $row;
        }
    //echo json_encode($json);
} else {
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
$data['month'] = $json_currentMonth;
$data['salaryTransaction'] = $json_result;
echo json_encode($data);
//echo json_encode($json);
// if ($result->num_rows > 0) {
//     // need to populate the entire page using the date and busnumber
//     $json = array();
//     while($row = mysqli_fetch_assoc($result)){
//         $json[] = $row;
//         }
//     echo json_encode($json);
// } else {
//     echo "nothing"; //no row 
// }
$conn->close();

//}




?>