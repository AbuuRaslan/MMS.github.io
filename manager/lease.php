<?php 

session_start();
if(!$_SESSION['username']) {
  header('location:login form.php');
}
else{
  $con=mysqli_connect("localhost","root","","mall");
  $query= "SELECT tenants_details.tenantID, 
  tenants_details.FullName, 
  tenants_agreements.phase, 
  tenants_agreements.property_name, 
  tenants_agreements.floor_number, 
  tenants_agreements.lease_start_date, 
  tenants_agreements.lease_end_date, 
  tenants_agreements.rental_amount,
  tenants_agreements.payment_frequency FROM tenants_details INNER JOIN tenants_agreements ON tenants_details.tenantID = tenants_agreements.tenant_ID; ";
  $result = mysqli_query($con,$query);
  if (!$result) {
    die(mysqli_error($con));
  }
}
?>


<!DOCTYPE html>
<html>
  <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>M.M.Sytem</title>
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
        width: 80%;
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
      overflow: hidden;
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

    <div class="offcanvas offcanvas-start sidebar-nav bg-dark text-white" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
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
                  <a href="" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-layout-text-sidebar"></i></span>
                    <span>Lease Agreements</span>  
                  </a>
                </li>
                <li>
                  <a href="Rental Payments.php" class="nav-link px-3">
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
   <center><main class=" pt-5 col-10 col-lg-9 sm-10 " style=" width: 82%; overflow-y: scroll; overflow-x: scroll;" >
      <div class="album py-5 bg-light album">
        <p class=" col-10 col-lg-9">
          <div class="container nav-container">
            <div class="collapse" id="navbarToggleExternalContent">
              <div class="bg-dark p-4">
                <h5 class="text-white h4">Collapsed content</h5>
                <span class="text-muted">Toggleable via the navbar brand.</span>
              </div>
            </div>
            <nav class="navbar mininav navbar-dark bg-dark">
              <div class="container-fluid">
                
                <center>
                    <div class="dropdown">
                    <center>
                      <button type="button" class="btn btn-primary dropdown-toggle me-1" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" style="background-image: linear-gradient(to top,#1a4547,black);">
                        ADD PHASE
                      </button>
                        <form action="phase code.php" method="POST" class="dropdown-menu p-4 text-white" style="width:300px;  background-color: rgba(18, 0,15,0.8); box-shadow: 0px 0px 50px black; border: none; border-radius: 10px;">
                          <div class="mb-3">
                            <label for="exampleDropdownFormEmail2" class="form-label">Tenant ID</label>
                            <input type="ID" class="form-control" id="exampleDropdownFormEmail2" placeholder="tenant ID" name="tid" required>
                          </div>
                          <div class="mb-3">
                            <label for="exampleDropdownFormPassword2" class="form-label">Next Phase</label>
                            <input type="number" class="form-control" id="exampleDropdownFormEmail2" placeholder="enter phase number" name="phase" required>
                          </div>
                          <div class="mb-3">
                            <label for="exampleDropdownFormPassword2" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="exampleDropdownFormEmail2" placeholder="enter phase number" name="sdate" required>
                          </div>
                          <div class="mb-3">
                            <label for="exampleDropdownFormPassword2" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="exampleDropdownFormEmail2" placeholder="enter phase number" name="edate" required>
                          </div>
                          <div class="mb-3">
                            <label for="exampleDropdownFormPassword2" class="form-label">Rent Amount</label>
                            <input type="number" class="form-control" id="exampleDropdownFormEmail2" placeholder="enter phase number" name="ramount" required>
                          </div>
                          <center> <button type="submit" class="btn btn-primary" name="button1">Send</button>
                        </form>
                      </div>        
                    </center>
                <center><p class=" text-muted small fw-bold text-uppercase" > <marquee>WELCOME TO MALL MANAGEMENT SYSTEM</marquee> </center>
                <a class="nav-link sidebar-link px-3 " data-bs-toggle="" href="index.php" role="button" aria-expanded="false" aria-controls="collapseExample">
                  <span class="me-2 "><i class="fas fa-home"></i></span>
                  <span class="">home</span>  
                </a>
              </div>
            </nav>
          </div>
        </p>



        

        <h1 class="mt-4">TENANS RENT AGREEMNETS</h1>
        <hr>
        <div class="row" style=" width:100%;">
            <div id="printThis_table" >
                <table id="printableTable" class="table table-striped table-bordered table-hover">
                    <tbody>
                      </tbody><thead>
                        <tr>
                          
                        </tr>
                        
                          <tr class="text-uppercase">
                              <th>S/N</th><th>TENANT ID</th><th>TENANT NAME</th>
                              <th>phase</th><th>PROPERTY NAME</th><th>FLOOR NUMBER</th><th>LEASE-START DATE</th><th>LEASE-END DATE</th><th>RENTAL AMOUNT</th><th>Payment Frequency</th>
                          </tr>

                      </thead>
                    <tbody>
                        <tr>
                          <?php
                            $i=0;
                            while ($row = mysqli_fetch_assoc($result)) {
                          ?>
                          <td id="sn"> <?php $i=$i+1; echo$i; ?> </td>
                          <td> <?php echo $row['tenantID']; ?> </td>
                          <td> <?php echo $row['FullName']; ?> </td>
                          <td> <?php echo $row['phase']; ?> </td>
                          <td> <?php echo $row['property_name']; ?> </td>
                          <td> <?php echo $row['floor_number']; ?> </td>
                          <td> <?php echo $row['lease_start_date']; ?> </td>
                          <td> <?php echo $row['lease_end_date']; ?> </td>
                          <td> $<?php echo number_format($row['rental_amount'],1); ?> </td>
                          <td> <?php echo $row['payment_frequency']; ?> </td>
                        </tr>

                          <?php

                            }

                          ?>
                          <?php 
                            if (mysqli_num_rows($result)<1) {
                          ?>
                              <tr>
                                <th class="text-center text-muted" colspan="10" ><h1>No data available</h1></th>
                              </tr>
                          <?php
                            }
                          ?>
                  </tbody>
                </table>
            </div>
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->


      </div>
    </main></center>
    

    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>