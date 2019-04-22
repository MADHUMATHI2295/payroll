<!DOCTYPE html>
<html>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

 <div class="form-group">
 <label class="control-label col-lg-2">Month</label>
 <div class="col-lg-2">
 <select class="form-control" id="selMonth">
     <option value="">- Choose Month -</option>
      <?php
    //      //$selectOption = "BusinessTitle";
         include "../workedunits/drop.php";
?>
 </select>
</div>
</div>


<script src="../scripts/fetch.js"></script>

</body>
</html>