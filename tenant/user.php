<?php
session_start();
$con=mysqli_connect("localhost","root","","mall");

if (!$_SESSION['username']) {
  header('location:login form.php');
}
else
  $userID=$_SESSION['uid'];
  $select1=" SELECT * FROM tenants_details WHERE tenantID = '$userID'";
  $select2=" SELECT * FROM tenants_agreements WHERE tenant_ID = '$userID'";
  $select3=" SELECT * FROM tenants_address WHERE tenantID = '$userID'";
  $select4=" SELECT * FROM rent_paymnet_record WHERE tenantID = '$userID'";
  $select5=" SELECT * FROM payment  WHERE tenantID = '$userID'";
  $select6=" SELECT * FROM reminder  WHERE tenantID = '$userID'";
  $query1=mysqli_query($con,$select1);
  $query2=mysqli_query($con,$select2);
  $query3=mysqli_query($con,$select3);
  $query4=mysqli_query($con,$select4);
  $query5=mysqli_query($con,$select5);
  $query6=mysqli_query($con,$select6);
  $fetch1=mysqli_fetch_assoc($query1);
  $fetch2=mysqli_fetch_assoc($query2);
  $fetch3=mysqli_fetch_assoc($query3);
  $fetch6=mysqli_fetch_assoc($query6);

?>


<!DOCTYPE html>
<html>
  <head>
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="X-UA-Cpmpatible" content="IE=edge">
	 <title>M.M.Sysytem</title>
	 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   <link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet" type="text/css" href="css/bootstrap-utilities.css">
   <link rel="stylesheet" type="text/css" href="css/bootstrap-utilities.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

   <style type="text/css">
    :root{
      --offcanvas-width:280px;
      --topNavbarHeight:64px;
      --main-height:90.1vh;
      --main-width:82%;

    }
    body{
      font-size: 100%;
      background-size: cover;
      background-position: center;
      background-color: whitesmoke;
    }
    .sidebar-nav{
      width: var(--offcanvas-width);
    }
    @media(min-width: 393px) {
      main{
        width: 100%;
      }
    }

    @media (min-width:992px){
      .c-header{
        display: none;
      }
      .offcanvas-backdrop::before{
        display: none;
      }
      .sidebar-nav{
        transform: none;
        visibility: visible !important; 
        top: var(--topNavbarHeight);
        height: calc(100% - var(--topNavbarHeight));
      }
      .btn-close{
        display: none;
      }
      main{
        width: 152vh;
        height: var(--main-height);
        margin-top: 5%;
      }
      .container{
        margin-top: 1%;
      }

    }
    .sidebar-link {
      display: flex;
      align-items:center;
    }
    .sidebar-link .right-icon{
      display: inline-flex;
    }
    .sidebar-link[aria-expanded="true"] .right-icon{
      transform: rotate(180deg);
    }
    main{
      display: inline-flex;
      width: 152vh;
      height: var(--main-height);
      margin-top: 5%;
    }
    .col{
      align-content: center;
    }
    .album{
      width:100%;

    }
    .nav-container{
      margin-top: -7%;
    }
    .container2{
      margin-top: 5%;
    }
    .col .card{
      border-radius: 15px;

      <?php include('style.php'); ?>
   </style>

  </head>
  <body>
   <div class="modal fade" id="resetModal" tabindex="-1" aria-labelledby="resetModalLabel" aria-hidden="true">
         <div class="modal-dialog" >
             <div class="modal-content" style="  background-color:rgba(1000, 150, 20,0.8); box-shadow:0px 0px 70px black; color:dark;">
                 <div class="modal-header">
                     <h5 class="modal-title" id="resetModalLabel">UPDATE PASSWORD</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body fw-bold">
                  <?php

                  if (isset($_POST['pbutton'])) {
                   $cpass=$_POST['cpassword'];
                   $npass=$_POST['npassword'];
                   $updatep="UPDATE tenant_login SET password='$npass' WHERE password = '$cpass' ";
                   $queryp=mysqli_query($con,$updatep);
                   if ($queryp) {
                    echo "<script> alert('password updated') </script>";
                   }
                   else{
                    echo "<script> alert('update failed') </script>";
                    //echo mysqli_error($con);
                   }
                  }

                  ?>
                     <form method="POST">
                         <div class="mb-3">
                             <label for="resetEmail" class="form-label">current pasword</label>
                             <input type="pasword" class="form-control" id="resetEmail" name="cpassword" required>
                         </div>
                         <div class="mb-3">
                             <label for="resetEmail" class="form-label">new pasword</label>
                             <input type="password" class="form-control" id="resetEmail" name="npassword" required>
                         </div>
                         <button type="submit" class="btn btn-primary bg-dark" style=" border: none;" name="pbutton">update</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background-image: linear-gradient(to left,#1a4547,black,black);" >
      <div class="container-fluid">
    <!-----------offcanvas button start ------------->

    <button class="navbar-toggler me-2 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
    <span class="navbar-toggler-icon"></span>
    </button>

    <!-----------offcanvas button end ------------->
    <a class="navbar-brand fw-bold text-uppercase me-auto" href="#" > <i class="bi bi-fire"></i> m.m system</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2">
      <center>
        <form class="d-flex ms-auto ">
        <div class="input-group mb-3 my-3 my-lg-0">
  			 <button class="btn text-white me-auto" type="button" style=" cursor:default; ">WELCOME <?php echo " ".$fetch1['FullName']; ?> </button>
		    </div>
        </form>
      </center>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" style="border: gray solid 1px; height: 40px; border-radius: 10px;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:darkgreen; ">
            <i class="bi bi-person-lines-fill text-white "></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="background-color: rgba(18, 0,15,0.8); box-shadow: 0px 0px 50px black; border: none; border-radius: 10px; color: white; width:200px;">
            <li><a type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#resetModal" style="color: white; text-decoration: none;">Edit Password</a></li>
            <li><hr class="dropdown-divider text-white"></li>
            <li><a class="dropdown-item text-white" href=" log out.php" >LOG OUT</a></li>
          </ul>
        </li>
      </ul>
     </div>


     </div>
    </nav>

    <!-------------------------------------------off convas start ---------------------------------------->

    <div class="offcanvas offcanvas-start sidebar-nav bg-dark text-white" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="background-image: linear-gradient(to top,#1a4547,black);" >
      <div class="offcanvas-header c-header">
        <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
      <div class="navbar-dark">
      <ul class="navbar-nav">
        <li>
          <a href="#" class="nav-link px-1 active " style="font-size: 20px;">
            <span class="me-1"><i class="bi bi-speedometer2"></i></span>
            <span style="color:;">Dashboard</span>
          </a>
        </li>

        <li class="my-4">
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="nav-link sidebar-link px-1" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style=" color:white; ">
          <span class="me-2"><i class="bi bi-layout-text-sidebar"></i></span>
          <span>Agreements</span>  
          </a>
            <div>
              <ul  class="navbar-nav ps-1" >
                <li>
                  <a href="tenant Lease and Contract details.php" class="nav-link px-3" style=" color:white; ">
                    <span class="me-2"><i class="bi bi-layout-text-sidebar"></i></span>
                    <span>Lease Details</span>  
                  </a>
                </li>
              </ul>
            </div>
        </li>

        <li class="my-4">
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="nav-link sidebar-link px-1" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style=" color:white; ">
          <span class="me-2"><i class="bi bi-layout-text-sidebar"></i></span>
          <span>FINANCIAL</span>  
          </a>
            <div>
              <ul  class="navbar-nav ps-1" >
                <li>
                  <a href="tenant rent and payment details.php" class="nav-link px-3" style=" color:white; ">
                    <span class="me-2"><i class="bi bi-layout-text-sidebar"></i></span>
                    <span>Rent and Payment Details</span>    
                  </a>
                </li>
              </ul>
            </div>
        </li>

        <li class="my-4">
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="nav-link sidebar-link px-1" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style=" color:white; ">
          <span class="me-2"><i class="bi bi-layout-text-sidebar"></i></span>
          <span>COMMUNICATION</span>  
          </a>
            <div>
              <ul  class="navbar-nav ps-1">
                <li>
                  <a href=" tenant Communication Channel.php" class="nav-link px-3" style=" color:white; ">
                    <span class="me-2"><i class="bi bi-layout-text-sidebar"></i></span>
                    <span>Communicate with Manager</span> <!-- Include a messaging or communication module that enables tenants to directly communicate with mall management or other relevant parties. This can be used for inquiries, feedback, or general communication.----->
                  </a>
                </li>
              </ul>
          </div>
        </li>

        <li class="my-4">
          <hr class="dropdown-divider">
        </li>

        <!-- <li >
          <a class="nav-link sidebar-link px-1" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style=" color:white; ">
          <span class="me-2"><i class="bi bi-layout-text-sidebar"></i></span>
          <span>Documentation</span>  
          </a>
            <div>
              <ul  class="navbar-nav ps-1" >
                <li>
                  <a href="mall guide lines.php" class="nav-link px-3" style=" color:white; ">
                    <span class="me-2"><i class="bi bi-layout-text-sidebar"></i></span>
                    <span>Mall guidelines</span>  
                  </a>
                </li>
                
              </ul>
          </div>
        </li> -->

      </ul>
      </div>
      </div>
    </div>
    <!--------------------------------------------off convas end ---------------------------------------->

    <center><main class=" pt-5 col-10 col-lg-9 sm-10 " style=" width: 82%;" >
      <div class="album py-5 bg-light album"  style="background-color: whitesmoke;">
        <p>
          <div class="container nav-container">
            <div class="collapse" id="navbarToggleExternalContent">
              <div class="bg-dark p-4 " style="background-image: linear-gradient(to left,#1a4547,black);">
                <button type="submit" class="btn btn-primary me-5">UPDATE LABOR</button>
                <button type="button" class="btn btn-danger ms-5">REMOVE LABORS</button>
              </div>
            </div>
            <nav class="navbar mininav expand-lg navbar-dark bg-light" style="background-image: linear-gradient(to left,#1a4547,black);">
              <div class="container-fluid">
                <button >
                </button>
                <center><p class=" text-white small fw-bold text-uppercase"> <marquee>WELCOME TO MALL MANAGEMENT SYSTEM</marquee> </p></center>
                <a class="nav-link sidebar-link px-3 " data-bs-toggle="" href="user.php" role="button" aria-expanded="false" aria-controls="collapseExample" style=" color:darkgreen; ">
                  <span class=" text-white"><i class="fas fa-home"></i></span>
                  <span class=" text-white  " >home</span>  
                </a>
              </div>
            </nav>
          </div>
        </p>

        <div class="container">

        <div class="container" style=" height:77vh; overflow-y: scroll;">
        <h1 class="mt-4">Mall Tenant Dashboard</h1>
        <hr>

        <div class="row" >
            
             <div class="col-lg-3 col-md-6">
                <div class="card c1" style="background-image: linear-gradient(to left, #1a4547, black); border-radius: 20px;">
                    <div class="card-body d-flex flex-column justify-content-between align-items-start">
                        <div>
                            <h3 class="card-title mb-0" style="color: lightgray;"><?php echo $fetch2['property_name']; ?></h3>
                        </div>
                        <div class="icon-container mt-3">
                            <i class="fas fa-store fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>




            <div class="col-lg-3 col-md-6">
                <div class="card c2" style="background-color: darkgreen; color: lightgray; border-radius: 20px; border: none;">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="card-title">Current Phase</h5>
                            <p class="card-text">
                                <?php
                                while ($fetch4 = mysqli_fetch_assoc($query4)) {
                                    $i = $fetch4['phase'];
                                    $p = $fetch4['amount_payed'];
                                    $d = $fetch4['amount_due'];
                                }
                                echo $i;
                                ?>
                            </p>
                        </div>
                        <div class="icon-container">
                            <i class="fas fa-clock fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6">
              <div class="card c3" style="background-color: darkblue; color: lightgray; border-radius: 20px; border: none;">
                  <div class="card-body d-flex align-items-center justify-content-between">
                      <div>
                          <h5 class="card-title">Amount Paid</h5>
                          <p class="card-text"><?php echo "$".$p; ?></p>
                      </div>
                      <div class="icon-container">
                          <i class="fas fa-coins fa-3x"></i>
                      </div>
                  </div>
              </div>
            </div>



            <div class="col-lg-3 col-md-6">
                <div class="card c4" style="background-color: darkred; color: lightgray; border-radius: 20px; border: none;">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="card-title">Amount Due</h5>
                            <p class="card-text"><?php echo "$".$d; ?></p>
                        </div>
                        <div class="icon-container">
                            <i class="fas fa-exclamation-triangle fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <hr>

        <div class="row">
            

            <div class="col-lg-6" >
                <div class="card" style=" height:30vh; background-color: whitesmoke; overflow-y:scroll;">
                    <div class="card-body">
                        <h3 class="card-title">Personal Information</h3>
                        <ul class="list-group">
                            <p><strong class="me-5"> Name: </strong><?php echo $fetch1['FullName']; ?></p>
                            <p><strong class="me-5"> Email:</strong> <?php echo $fetch1['email']; ?> </p>
                            <p><strong class="me-5">Phone Number:</strong> <?php echo "+255".$fetch1['phone_number']; ?></p>
                            <p><strong class="me-5">Address:</strong> <?php echo $fetch3['address'].",".$fetch3['city'].",".$fetch3['state']; ?> </p>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" >
                <div class="card" style=" height:30vh; overflow-y:scroll; background-color: whitesmoke;">
                    <div class="card-body" >
                        <h3 class="card-title">Payments history</h3>
                        <ul class="list-group" >
                          <?php
                           while (  $fetch5=mysqli_fetch_assoc($query5)) {
                          ?>
                           <li class="list-group-item " style=" background-color: whitesmoke;"><?php echo "on ".$fetch5['payment_date'].", $".$fetch5['amount']." payed for phase ". $fetch5['phase'] ?></li>
                        </ul>

                          <?php

                           }

                          ?>
                    </div>
                </div>
            </div>
        </div>

        <hr>

         </div>

    <!-- Bootstrap 5 JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
        </div>
<!---------------------------------- PAGE CONTENT ENDS ----------------------->
        </div><!-- /.col -->
      </div>


    </main></center>
   
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>