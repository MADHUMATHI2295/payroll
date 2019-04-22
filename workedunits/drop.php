<?php


include '../common/SqlConnection.php';
//select the row which has this date and busnumber if it is there...
//$sql = "SELECT  OptionValue from configtable where OptionType = '" . $selectOption . "'";
//echo $sql;
$sql="SELECT DISTINCT month FROM workedunits";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    $str =  " ";
    while($row = $result->fetch_assoc()) {
      $str .=  "<option value=" . $row['month'] . ">" . $row['month'] . "</option>\n";
    }
    echo $str;
    
} else {
    echo "nothing"; //no row 
}
$conn->close();


?>