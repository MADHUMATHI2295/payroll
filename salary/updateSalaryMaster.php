<?php 


# Get JSON as a string
$json_str = file_get_contents('php://input');

//var_dump(json_decode($json));
$results = json_decode($json_str, true);

include '../common/SqlConnection.php';
$sql = "select EmpID from SalaryMaster Where EmpID = '" . $results['EmpID'] . "'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$empid = $row['EmpID'];
echo  $empid ;
 
$sql1 = " Update salarymaster SET BasicPay = '". $results['BasicPay'] . "',MedicalAllowance = '" . $results['MedicalAllowance'] . "',HRA = '" 
. $results['HRA'] . "',SpecialAllowance = '" . $results['SpecialAllowance'] . "',ConveyanceAllowance = '" . $results['ConveyanceAllowance'] 
. "',TelephoneAllowance = '" . $results['TelephoneAllowance'] . "',PFDeductionEmployer = '" . $results['PFDeductionEmployer'] 
. "',PFDeductionEmployee = '" . $results['PFDeductionEmployee'] . "',PayPeriodType = '" 
. $results['PayPeriodType'] . "',CTC = '" . $results['CTC'] ."' Where EmpID = '" . $results['EmpID'] . "'";

$result1 = $conn->query($sql1);
if ($result1 == 1) {
    $Workempid = $empid;
    $Workperiod=$results['PayPeriodType'];
    echo $Workperiod;
    $query="insert into Workedunits(EmpID,Period) values('$Workempid','$Workperiod')";
    echo $query;
    $result2 = $conn->query($query);
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

//echo $sql;

$result = $conn->query($sql);

$conn->close();




?>