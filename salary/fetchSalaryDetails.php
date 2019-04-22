
<?php
//session_start();

# Get JSON as a string
$json_str = file_get_contents('php://input');

//var_dump(json_decode($json));
$results = json_decode($json_str, true);

//echo $results['BP'] . " ". $results['ticket'] . " ". $results['rate'];
// if($results === NULL && isset($_SESSION["emp_id"]))
// {

//     $results['EmpID']  = $_SESSION["emp_id"];
// }
// else if($results != NULL)
// {
//     $_SESSION["emp_id"] = $results['EmpID'] ;
// }
// if($results != NULL)
// {

include '../common/SqlConnection.php';
//select the row which has this date and busnumber if it is there...
$sql = "SELECT e.EmpID, CONCAT(e.FirstName,' ',e.LastName,' ',e.Initials) AS EmpName,s.BasicPay,s.MedicalAllowance,s.HRA,s.SpecialAllowance,s.ConveyanceAllowance,s.TelephoneAllowance,
s.PFDeductionEmployer,s.PFDeductionEmployee,s.PayPeriodType,s.CTC
from salarymaster s inner join employeemaster e on s.EmpId=e.EmpId where s.EmpId = '" . $results['EmpID'] . "'";

//sql="SELECT StudentCourse.COURSE_ID, Student.NAME, Student.AGE FROM Student
//INNER JOIN salarymaster
//ON Student.ROLL_NO = StudentCourse.ROLL_NO";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // need to populate the entire page using the date and busnumber
    $json = array();
    while($row = mysqli_fetch_assoc($result)){
        $json[] = $row;
        }
    echo json_encode($json);
   
} else {
    echo "nothing"; //no row 
}
$conn->close();
//}

?>