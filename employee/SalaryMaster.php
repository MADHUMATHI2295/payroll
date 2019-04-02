<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="../img/favicon.png">

  <title>Salary Master</title>

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

  <!-- container section start -->
  <section id="container" class="">
 
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
                                  <!-- Edit profile form (not working)-->
                                    <form class="form-horizontal">
                                    <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">Base pay<span class="required">*</span></label>
                                            <div class="col-lg-2">
                                                <input type="text" class="form-control" id="txtFirstName" required />
                                            </div>
                                            </div>
                                          
                                            <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">HRF</label>
                                            <div class="col-lg-2">
                                                <input type="number" class="form-control" id="numhrf">
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">Convenyance Allowence</label>
                                            <div class="col-lg-2">
                                                <input type="number" class="form-control" id="numconvenyance">
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">PFDeduction Employer<span class="required">*</span></label>
                                            <div class="col-lg-2">
                                                <input type="number" class="form-control" id="numpfd" required />
                                            </div>
                                            <label class="control-label col-lg-2" for="title">PFDeduction Employee</label>
                                            <div class="col-lg-2">
                                                <input type="number" class="form-control" id="numpfdemp">
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">CTC</label>
                                            <div class="col-lg-2">
                                                <input type="number" class="form-control" id="numctc">
                                            </div>
                                            </div>
                                            <!-- Buttons -->
                                <div class="form-group">
                                  <!-- Buttons -->
                                  
                    
                                    <div class="col-lg-10">
                                    <p class="form-control-static text-danger" id="pShow"></p>
                                    </div>
                  

                                  <div class="col-lg-2">
                                    <button type="button" class="btn btn-primary" id="btnSave">Save</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                  </div>
                                </div>
                            </form>
                            </div>
                        </div>
                        <div class="widget-foot">
                            <!-- Footer goes here -->
                          </div>
                        </div>
                      </div>
          
                    </div>
                </div>
                <div class="panel-body">
                    <a id="alertBox" href="#myModal" data-toggle="modal"> </a>
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">PAYROLL Manager - Alert</h4>
                                </div>
                                <div class="modal-body">

                                    <form role="form">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </section>

                         <!--main content end-->
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="../js/jquery.scrollTo.min.js"></script>
  <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>

  <!-- jquery ui -->
  <script src="../js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom checkbox & radio-->
  <script type="text/javascript" src="../js/ga.js"></script>
  <!--custom switch-->
  <script src="../js/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="../js/jquery.tagsinput.js"></script>

  <!-- colorpicker -->

  <!-- bootstrap-wysiwyg -->
  <script src="../js/jquery.hotkeys.js"></script>
  <script src="../js/bootstrap-wysiwyg.js"></script>
  <script src="../js/bootstrap-wysiwyg-custom.js"></script>
  <script src="../js/moment.js"></script>
  <script src="../js/bootstrap-colorpicker.js"></script>
  <script src="../js/daterangepicker.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <!-- ck editor -->
  <script type="text/javascript" src="../assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="../js/form-component.js"></script>
  <script type="text/javascript" src="../js/jquery.validate.min.js"></script>

  <!-- custom form validation script for this page-->
  <script src="../js/form-validation-script.js"></script>

  <script src="../js/bootbox.min.js"></script>
  <script src="../js/bootbox.locales.min.js"></script>
  

  <!-- custome script for all page -->
  <script src="../js/scripts.js"></script>
  <script src="../scripts/emp-master-util.js"></script>


</body>

</html>
