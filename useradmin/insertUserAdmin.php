<?php 

# Get JSON as a string
$json_str = file_get_contents('php://input');
// var_dump(json_decode($json_str));
$results = json_decode($json_str, true);
//echo $results;

include '../common/SqlConnection.php';

//get the new emp id max + 1

//$sql = "select max(EmpID)+1 as EmpID from EmployeeMaster";

// $result = $conn->query($sql);
// $row = $result->fetch_assoc();

//$empid = $row['EmpID'];


    //insert
$sql1 = "Insert into UserAdmin (UserID,Password ,Role) Values ('" . $results['UserID'] . "' ,'" . $results['Password'] . "','" . 
$results['Role'] ."')";

$result1 = $conn->query($sql1);

if ($result1 == 1) {
    echo "1";
} else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}


//insert one empty record in salarymaster with the empid..
    
//echo $sql;

//echo $result;

$conn->close();


?>