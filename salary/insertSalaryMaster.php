<?php 

function checkBlank($fieldName, $results) {
    //this will check if the value is not blank to be added as a field
    //in the insert query insert into fieldname
    if ($results[$fieldName] != '' ) {
        $tmp = "," . $fieldName ;
        return $tmp;
    }
    else
        return ' ';

}



# Get JSON as a string
$json_str = file_get_contents('php://input');

//var_dump(json_decode($json));
$results = json_decode($json_str, true);

echo($results);

include '../common/SqlConnection.php';

//get the new emp id max + 1

$sql = "select max(EmpID)+1 as EmpID from EmployeeMaster";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$empid = $row['EmpID'];

    //insert
$sql = "Insert into EmployeeMaster (EmpID,BasicPay,MedicalAllowance,HRA,SpecialAllowance,ConveyanceAllowance,
TelephoneAllowance,PFDeductionEmployer,PFDeductionEmployee,PayPeriodType,CTC )
Values ('" . $empid . "','" . 
$results['BasicPay']   . ",'" . $results['MedicalAllowance'] . "','" . 
$results['HRA'] . "','" . $results['SpecialAllowance'] . "','" . $results['ConveyanceAllowance'] . "','" . 
$results['TelephoneAllowance'] . "','" . $results['PFDeductionEmployer'] . "','" . $results['PFDeductionEmployee'] . 
"','" . $results['PayPeriodType'] . "','" . $results['CTC']  . ")";

//$result = $conn->query($sql);
    
echo $sql;

//echo $result;

$conn->close();


?>