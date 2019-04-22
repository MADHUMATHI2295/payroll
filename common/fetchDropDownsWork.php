<?php


include 'SqlConnection.php';

//echo $sql;
$sql ="SELECT Month from currentmonthprocess";
$result = $conn->query($sql);
$curMonth ="";

$A =0;
if ($result->num_rows > 0) {
  
    while($row = mysqli_fetch_assoc($result)){
        $curMonth= $row['Month'];
      }
     
$allmonth_arr=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
$Cmonth=$curMonth;

$temp_arr=array();

   for( $i=0;$i < count($allmonth_arr);$i++)
    {
        if($allmonth_arr[$i] == $Cmonth)
        {
            for( $j=3;$j>0;$j--)
            {
                $index_val =$i-$j;
                if($index_val>=0)
                {
                    array_push($temp_arr, $allmonth_arr[$index_val]);   
                }
                else
                {
                    array_push($temp_arr,$allmonth_arr[$index_val+count($allmonth_arr)]);
                }
          }
        }
       
    }
    array_push($temp_arr,$Cmonth);
    $str =  "<option value=''>Choose the month ";
    while($A < count($temp_arr)) {
       $str .=  "<option value=" . $temp_arr[$A] . ">" . $temp_arr[$A] .  "";
       $A++;
    }

  echo json_encode($str);
    
}else {
     echo "nothing"; //no row 
 }
$conn->close();


?>