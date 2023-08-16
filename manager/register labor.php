<?php 
$con=mysqli_connect("localhost","root","","mall");
if (isset($_POST["button"])) {
  $aid=$_POST["aid"];
  $ltype=$_POST["ltype"];
  $responsible=$_POST["responsible"];
  $samount= $_POST["samount"];
  $sfrequency=$_POST["sfrequency"];
  $lid=$_POST["lid"];
  $agree= "INSERT INTO labor_agreements(agreementID,labor_type,responsibles,salary_amount,salary_frequency,laborID) values('$aid','$ltype','$responsible','$samount','$sfrequency','$lid')";
  $send=mysqli_query($con,$agree);
  if ($send) {
    echo("<script> alert('labor added to the mall') </script>");
  }
  else{
    die(mysqli_error($con));
    echo("<script> alert('failed to submit') </script>");
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
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
      .agree{
        overflow-y: scroll; height: 110%;

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
     <?php include('style.php'); ?>

   </style>
  </head>
  <body>
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
                  <a href="" class="nav-link px-3">
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
   <center ><main class=" pt-5 col-10 col-lg-9 sm-10 " style=" width: 82%;" >
      <div class="album py-5 bg-light album" >
        <p>
          <div class="container nav-container">
            <div class="collapse" id="navbarToggleExternalContent">
              <div class="bg-dark p-4">
                <h5 class="text-white h4">Collapsed content</h5>
                <span class="text-muted">Toggleable via the navbar brand.</span>
              </div>
            </div>
            <nav class="navbar mininav expand-lg navbar-dark bg-dark">
              <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                 <center><p class=" text-muted small fw-bold text-uppercase"> <marquee>WELCOME TO MALL MANAGEMENT SYSTEM</marquee> </center>
                <a class="nav-link sidebar-link px-3 " data-bs-toggle="" href="index.php" role="button" aria-expanded="false" aria-controls="collapseExample">
                  <span class="me-2 "><i class="fas fa-home"></i></span>
                  <span class="">home</span>  
                </a>
              </div>
            </nav>
          </div>
        </p>
        
        <form class="row g-3 ms-auto agree" action="labor agreements.php" method="POST">
          <h2 >Labor Details</h2>
          <div class="col-6">
            <label for="inputAddress" class="form-label">Labor ID</label>
            <input type="ID" class="form-control" id="inputAddress" placeholder="identification number" name="id" required>
          </div>
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">labor full name</label>
            <input type="text" class="form-control" id="input name" name="name" required>
          </div>
          <center><div class="col-2">
            <label for="inputAddress" class="form-label">gender</label>
            <select id="inputState" class="form-select" placeholder="example: tanzania" name="gender" required>
              <option class="text-muted"></option>
              <option>M</option>
              <option>F</option>
              <option>non either</option>
            </select>
          </div></center>
          <center><div class="col-4">
            <label for="inputAddress" class="form-label">contatc number</label>
            <input type="number" class="form-control" id="inputAddress" placeholder="+255 77* *** ***" name="cnum" required>
          </div></center>
          <center><div class="col-md-4">
            <label for="inputEmail4" class="form-label">email</label>
            <input type="email" class="form-control" id="input email" name="email" >
          </div></center>
          <center><div class="col-10">
            <label for="inputAddress2" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment,house, or floor" name="address" required>
          </div></center>
          <div class="col-md-6">
            <label for="inputCity" class="form-label">City</label>
            <input type="text" class="form-control" id="inputCity" name="city" required>
          </div>
          <div class="col-md-6">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" class="form-select" placeholder="example: tanzania" name="state" required>
              <option class="text-muted">choose..</option>
              <option>tanzania</option>
              <option>kenya</option>
              <option>yemen</option>
              <option>others</option>
            </select>
          </div>
          <div class="col-12 mt-5">
           <button type="submit" class="btn btn-primary" name="button" style="background-color:#1a4547;">Next</button>
          </div>
        </form>
        
          
      </div>
    </main></center>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>