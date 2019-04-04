<?php 


# Get JSON as a string
$json_str = file_get_contents('php://input');

//var_dump(json_decode($json));
$results = json_decode($json_str, true);

include '../common/SqlConnection.php';

//get the new emp id max + 1

//$sql = "select max(EmpID)+1 as EmpID from SalaryMaster";

//$result = $conn->query($sql);
//$row = $result->fetch_assoc();

//$empid = $row['EmpID'];
 
$sql = " Update salarymaster SET BasicPay = '". $results['BasicPay'] . "',MedicalAllowance = '" . $results['MedicalAllowance'] . "',HRA = '" 
. $results['HRA'] . "',SpecialAllowance = '" . $results['SpecialAllowance'] . "',ConveyanceAllowance = '" . $results['ConveyanceAllowance'] 
. "',TelephoneAllowance = '" . $results['TelephoneAllowance'] . "',PFDeductionEmployer = '" . $results['PFDeductionEmployer'] 
. "',PFDeductionEmployee = '" . $results['PFDeductionEmployee'] . "',PayPeriodType = '" 
. $results['PayPeriodType'] . "',CTC = '" . $results['CTC'] ."' Where EmpID = '" . $results['EmpID'] . "'";

$result = $conn->query($sql);
if ($result == 1) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

echo $sql;

$result = $conn->query($sql);

$conn->close();




?>