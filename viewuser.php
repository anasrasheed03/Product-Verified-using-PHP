<?php

session_start();
$uid=$_GET['id'];
include('config/db.php');
if(!isset($_SESSION["useraccess"])){
header("Location: index.php");
exit(); }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <title>Admin Portal - Halal o Produvt Verifier</title>
    <!-- Custom CSS -->
    <link href="../../Portal2/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../../Portal2/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../../Portal2/assets/libs/morris.js/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../Portal2/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        
         <?php 

                include ("config/header.php");

            ?>
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
       <?php 

                include ("config/menu.php");

            ?>

       
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
   
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Profile</h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">User</li>
                                    <li class="breadcrumb-item active" aria-current="page">View User</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
           <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                
                                <?php 
                                            
                                            $disply_info="SELECT * FROM tbl_login WHERE id=$uid";

                                                                if ($check_result=mysqli_query($mysqli,$disply_info))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check=mysqli_fetch_assoc($check_result);
                                                                  }
                                        
                                                    $key=$check['refkey'];                                        
                                            ?>
                                <center class="m-t-30"> <img src="../../Portal2/img/<?php echo $check['pictures'];?>" class="rounded-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?php echo $check['loginid'];?></h4>
                                    <h6 class="card-subtitle"><?php 
                                        if($check["role"]==1){
                                        echo "Admin";
                                        }elseif($check["role"]==2){
                                        echo "Brand";
                                        }elseif($check["role"]==3){
                                        echo "Certification Authority";
                                        }elseif($check["role"]==4){
                                        echo "Ulema";
                                        }elseif($check["role"]==5){
                                        echo "User";}?></h6>
                                    
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6><?php echo $check['email'];?><?php
                                
                                    
                                        
                                        $disply_br="SELECT * FROM brands WHERE brkey='$key'";

                                                                if ($check_result2=mysqli_query($mysqli,$disply_br))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check2=mysqli_fetch_assoc($check_result2);
                                                                  }
                                                                  
                                        $disply_ca="SELECT * FROM certification_authorities WHERE crkey='$key'";

                                                                if ($check_result1=mysqli_query($mysqli,$disply_ca))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check1=mysqli_fetch_assoc($check_result1);
                                                                  }
                                        $disply_ul="SELECT * FROM ulema WHERE ulkey='$key'";

                                                                if ($check_result3=mysqli_query($mysqli,$disply_ul))
                                                                  {
                                                                  // Return the number of rows in result set
                                                                  $check3=mysqli_fetch_assoc($check_result3);
                                                                  }
                                                            
                                                         if($check2['brkey']!=''){
                                        
                                                
                                                
                                    ?></h6> <small class="text-muted p-t-30 db">Phone</small>
                                <h6><?php echo $check2['brand_contact'];?></h6> <small class="text-muted p-t-30 db">Website</small>
                                <h6><?php echo $check2['brand_website'];?></h6>
                                <small class="text-muted p-t-30 db">Social Profile</small>
                                <br/>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tabs -->
                            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                                </li>
                                </ul>
                            <!-- Tabs -->
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Brand Name</strong>
                                                <br>
                                                <p class="text-muted"><a href="viewbrand.php?b=<?php echo $check2['brand_name']; ?>"><?php echo $check2['brand_name']; ?></a></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Brand Contact</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $check2['brand_contact']; ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Brand Email</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $check2['brand_email']; ?></p>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-3 col-xs-6"> <strong>Brand Manager</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $check2['brand_manager']; ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Brand Affiliation</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $check2['certification_authority']; ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-md-3 col-xs-6"> <strong>Brand Description</strong>
                                                <br>
                                        <p class="m-t-30"><?php echo $check2['brand_description']; ?></p>
                                        </div>
                                        
                                        <?php }elseif($check1['crkey']!=''){?>
                                        </h6> <small class="text-muted p-t-30 db">Phone</small>
                                <h6><?php echo $check1['authority_contact'];?></h6> <small class="text-muted p-t-30 db">Website</small>
                                <h6><?php echo $check1['authority_website'];?></h6>
                                <small class="text-muted p-t-30 db">Social Profile</small>
                                <br/>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tabs -->
                            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                                </li>
                                </ul>
                            <!-- Tabs -->
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Certification Authority Name</strong>
                                                <br>
                                                <p class="text-muted"><a href="viewcerts.php?id=<?php echo $check1['authority_id']; ?>"><?php echo $check1['certification_authority']; ?></a></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Brand Contact</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $check1['authority_contact']; ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Brand Email</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $check1['authority_email']; ?></p>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-3 col-xs-6"> <strong>Authority Manager</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $check1['Manager']; ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Authority CEO</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $check1['ceo']; ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-md-3 col-xs-6"> <strong>Authority Address</strong>
                                                <br>
                                        <p class="m-t-30"><?php echo $check1['Address']; ?></p>
                                        </div>
                                        
                                        <?php 
                                            
                                        }
                                        elseif($check3['ulkey']!=''){
                                        ?>
                                        </h6> <small class="text-muted p-t-30 db">Phone</small>
                                <h6><?php echo $check3['ulema_contact'];?></h6> 
                                <small class="text-muted p-t-30 db">Social Profile</small>
                                <br/>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tabs -->
                            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                                </li>
                                </ul>
                            <!-- Tabs -->
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $check3['ulema_name']; ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Designation</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $check3['designation']; ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Address</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $check3['address']; ?></p>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-3 col-xs-6"> <strong>Affiliation</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $check3['certification_authority']; ?></p>
                                            </div>
                                            </div>
                                            
                                            <?php
                                        }
                                            ?>
                                        </div>
                                </div>
                                </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div></div>
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
             <?php
           include ("config/footer.php");
           ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../Portal2/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../Portal2/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../Portal2/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="../../Portal2/dist/js/app.min.js"></script>
    <script src="../../Portal2/dist/js/app.init.horizontal.js"></script>
    <script src="../../Portal2/dist/js/app-style-switcher.horizontal.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../Portal2/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../Portal2/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../Portal2/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../Portal2/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../Portal2/dist/js/custom.min.js"></script>
</body>

</html>