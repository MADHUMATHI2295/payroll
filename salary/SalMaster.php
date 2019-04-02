<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Payroll</title>

<link rel="stylesheet" href="../css/sidemenu.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">

<SCRIPT id=jQuery src="/js/jquery-3.3.1.min.js" type="text/javascript"></SCRIPT>
<SCRIPT id=jQueryUI src="/js/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></SCRIPT>
<link id=jQueryUICSS rel="stylesheet" href="/js/jquery-ui-1.12.1/jquery-ui.min.css" type="text/css"/>

<script src="/js/Popper.js"></script>
<script src="/js/tether.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="../scripts/sal-master-util.js"></script>

<script>
//window.alert = function() {
   // debugger;
//}
</script>


  <!-- Bootstrap CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="../css/elegant-icons-style.css" rel="stylesheet" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" />
  <link href="../css/daterangepicker.css" rel="stylesheet" />
  <link href="../css/bootstrap-datepicker.css" rel="stylesheet" />
  <link href="../css/bootstrap-colorpicker.css" rel="stylesheet" />
  <!-- date picker -->

  <!-- color picker -->

  <!-- Custom styles -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->

</head>
<body>
<div class="container">
 
<!-- end php code -->

<br>
<br>

<div class="container">
    <div class="row">
        <?php include '../common/RightPanel.php';?>
        <div class="col-sm-9  " align="center">
            <div class="page-header">
                <h2>Salary Master </h2> 
            </div>
        </div>
</div>
 <!--main content start-->
 <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-md-12 portlets">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <label id="lblEmpID"></label>
                            </div>
                            <div class="widget-icons pull-right">
                                <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                                <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="padd">
                                <div class="form quick-post">

                                    <form class="form-horizontal">
                                    
                                    <div class="form-group" align="center">
                                            <label class="control-label col-lg-2" for="title">Base pay</label>
                                            <div class="col-lg-2">
                                                <input type="text" class="form-control" id="txtFirstName" required />
                                            </div>
                                            </div>
                                          
                                            <div class="form-group" align="center">
                                            <label class="control-label col-lg-2" for="title">HRF</label>
                                            <div class="col-lg-2">
                                                <input type="number" class="form-control" id="numhrf">
                                            </div>
                                            </div>
                                            <div class="form-group" align="center">
                                            <label class="control-label col-lg-2" for="title">Convenyance Allowence</label>
                                            <div class="col-lg-2">
                                                <input type="number" class="form-control" id="numconvenyance">
                                            </div>
                                            </div>
                                            <div class="form-group" align="center">
                                            <label class="control-label col-lg-2" for="title">PFDeduction Employer</label>
                                            <div class="col-lg-2">
                                                <input type="number" class="form-control" id="numpfd" required />
                                            </div>
                                            <label class="control-label col-lg-2" for="title">PFDeduction Employee</label>
                                            <div class="col-lg-2">
                                                <input type="number" class="form-control" id="numpfdemp">
                                            </div>
                                            </div>
                                            <div class="form-group" align="center">
                                            <label class="control-label col-lg-2" for="title">CTC</label>
                                            <div class="col-lg-2">
                                                <input type="number" class="form-control" id="numctc">
                                            </div>
                                            </div>
<div class="modal-footer" align="center">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnSave">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCancel">Cancel</button>
</div>



</body>
</html>