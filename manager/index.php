<?php
session_start();
if(!$_SESSION['username']) {
  header('location:login form.php');
}
else{
  $conn=mysqli_connect("localhost","root","","mall");
  $tenant= "SELECT * FROM tenants_details";
  $labor= "SELECT * FROM labor_details";
  $request=" SELECT * FROM messages WHERE subject ='MAINTANANACE REQUEST' ";
  $feed=" SELECT * FROM messages WHERE subject ='FEED BACK' ";
  $query1= mysqli_query($conn,$tenant);
  $query2= mysqli_query($conn,$labor);
  $query3=mysqli_query($conn,$request);
  $query4=mysqli_query($conn,$feed);
  $total_tenant=mysqli_num_rows($query1);
  $total_labor=mysqli_num_rows($query2);
  $total_request=mysqli_num_rows($query3);
  $totalfeed=mysqli_num_rows($query4);
}

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
    }
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

                  if (isset($_POST['mbutton'])) {
                   $cpass=$_POST['cpassword'];
                   $npass=$_POST['npassword'];
                   $updatep="UPDATE manager_login SET password='$npass' WHERE password = '$cpass' ";
                   $queryp=mysqli_query($conn,$updatep);
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
                         <button type="submit" class="btn btn-primary bg-dark" style=" border: none;" name="mbutton">update</button>
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
         <button class="btn text-white me-auto" type="button" style=" cursor:default; ">WELCOME MANAGER</button>
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
            <li><a class="dropdown-item text-white" href="log out.php" >LOG OUT</a></li>
          </ul>
        </li>
      </ul>
     </div>
      </div>
    </nav>

    <!-------------------------------------------off convas start ---------------------------------------->

    <div class="offcanvas offcanvas-start sidebar-nav bg-dark text-white" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel"style="background-image: linear-gradient(to top,#1a4547,black);">
      <div class="offcanvas-header c-header">
        <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
      <div class="navbar-dark">
      <ul class="navbar-nav">
        <li>
          <a href="#" class="nav-link px-3 active ">
            <span class="me-2"><i class="bi bi-speedometer2"></i></span>
            <span >Dashboard</span>
          </a>
        </li>

        <li class="my-4">
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="nav-link sidebar-link px-3" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
          <span class="me-2"><i class="bi bi-layout-text-sidebar"></i></span>
          <span>Registration</span>  
          </a>
            <div>
              <ul  class="navbar-nav ps-3">
                <li>
                  <a href="register tenant.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-layout-text-sidebar"></i></span>
                    <span>register new tenant</span>  
                  </a>
                </li>
                <li>
                  <a href="register labor.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-layout-text-sidebar"></i></span>
                    <span>register new labor</span>    
                  </a>
                </li>
              </ul>
            </div>
        </li>

        <li class="my-4">
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="nav-link sidebar-link px-3" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
          <span class="me-2"><i class="bi bi-layout-text-sidebar"></i></span>
          <span>MANAGEMENTS</span>  
          </a>
            <div>
              <ul  class="navbar-nav ps-3">
                <li>
                  <a href="manage tenants.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-layout-text-sidebar"></i></span>
                    <span>Manage tenats</span>  
                  </a>
                </li>
                <li>
                  <a href="manage labor.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-layout-text-sidebar"></i></span>
                    <span>Manage labors</span>  
                  </a>
                </li>
              </ul>
          </div>
        </li>

        <li class="my-4">
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="nav-link sidebar-link px-3" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
          <span class="me-2"><i class="bi bi-layout-text-sidebar"></i></span>
          <span>Payments</span>  
          </a>
            <div>
              <ul  class="navbar-nav ps-3">
                <li>
                  <a href="lease.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-layout-text-sidebar"></i></span>
                    <span>Lease Agreements</span>  
                  </a>
                </li>
                <li>
                  <a href="rental Payments.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-layout-text-sidebar"></i></span>
                    <span>Rental Payments</span>  
                  </a>
                </li>
              </ul>
          </div>
        </li>

        <li class="my-4">
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="nav-link sidebar-link px-3" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
          <span class="me-2"><i class="bi bi-layout-text-sidebar"></i></span>
          <span>Facilities</span>  
          </a>
            <div>
              <ul  class="navbar-nav ps-3">
                <li>
                  <a href="maintanance.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-layout-text-sidebar"></i></span>
                    <span>Maintanance Request</span>  
                  </a>
                </li>
                <li>
                  <a href="feedback.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-layout-text-sidebar"></i></span>
                    <span>Feedbacks</span>
                  </a>
                </li>
              </ul>
          </div>
        </li>

      </ul>
      </div>
      </div>
    </div>
    <!--------------------------------------------off convas end ---------------------------------------->
   <center ><main class=" pt-5 col-10 col-lg-9 sm-10 " style=" width: 82%;" >
      <div class="album py-5 bg-light album">
        <p>
          <div class="container nav-container">
            <div class="collapse" id="navbarToggleExternalContent">
              <div class="bg-dark p-4">
                <h5 class="text-white h4">Collapsed content</h5>
                <span class="text-muted">Toggleable via the navbar brand.</span>
              </div>
            </div>
            <nav class="navbar mininav expand-lg navbar-dark bg-dark" style="background-image: linear-gradient(to left,#1a4547,black);">
              <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <center><p class=" text-muted small fw-bold text-uppercase"> <marquee>WELCOME TO MALL MANAGEMENT SYSTEM</marquee> </center>
                <a class="nav-link sidebar-link px-3" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                  <span class="me-2 "><i class="fas fa-home"></i></span>
                  <span class="">home</span>  
                </a>
              </div>
            </nav>
          </div>
        </p>
        <h1 class="mt-4">Manager Dashboard</h1>
        <div class="container container2">
        <hr>
          <div class="row row-cols-1 row-cols-sm-9 row-cols-md-3 g-3">
            
            <div class="col">
              <div class="card shadow-sm">
                
                <div class="card-body c1">
                  <center>
                    <h5>number of tenants</h5>
                    <h1>
                      <?php print($total_tenant); ?>
                    </h1>
                  </center>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="all tenants.php" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col">
              <div class="card shadow-sm ">
                
                <div class="card-body c2">
                  <center>
                    <h5>other labors</h5>
                    <h1>
                      <?php print($total_labor); ?>
                    </h1>
                  </center>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="all labors.php" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col">
              <div class="card shadow-sm ">
               
                <div class="card-body c3">
                  <center>
                    <h5>maintanance request</h5>
                    <h1> <?php echo $total_request;?> </h1>
                  </center>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="maintanance.php" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col">
              <div class="card  shadow-sm ">

                <div class="card-body c4">
                  <center>
                    <h5>feed backs</h5>
                    <h1><?php echo $totalfeed; ?></h1>
                  </center>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="feedback.php" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>
      </div>
    </main></center>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>