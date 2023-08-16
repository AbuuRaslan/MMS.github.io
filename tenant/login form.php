<?php
session_start();
$error="";
if (isset($_POST['btn'])) {

$con=mysqli_connect("localhost","root","","mall");
$query=" SELECT * FROM tenant_login ";
$query2=" SELECT * FROM manager_login ";
$result=mysqli_query($con,$query);
$result2=mysqli_query($con,$query2);

}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the entered username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate the username and password
    while ($fetch=mysqli_fetch_assoc($result)) {
        $correctUsername = $fetch['username'];
        $correctPassword = $fetch['password'];
        $userID= $fetch['tenantID'];
        if ($username == $correctUsername && $password == $correctPassword) {
            // Redirect to the next page
            $_SESSION['username']=$username;
            $_SESSION['uid']=$userID;
            header("Location:tenant/user.php");
            exit();
        } 
        else {
                $fetch2=mysqli_fetch_assoc($result2);
                $correctUsername2 = $fetch2['username'];
                $correctPassword2 = $fetch2['password'];
                if ($username == $correctUsername2 && $password == $correctPassword2) {
                    // Redirect to the next page
                    $_SESSION['username']=$username;
                    header("Location:manager/index.php");
                    exit();
                }
                else{
                    $error="Invalid UserName or Password !";
                }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en" style="background-image:url(mallpic.jpeg); background-repeat: no-repeat; background-position-x: initial; background-position-y: center; background-size: cover;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            
            background-color: background-color: rgba(0, 0, 0, 0);
        }
        center{
            font-size: 20px;
            color: red;
        }
        /*.zoom {
            transition: transform 0.3s;
        }

        .zoom:hover {
            transform: scale(1.1);
        }

        .zoom:active {
            transform: scale(1.1);
        }*/

    </style>
</head>
<body style="background-color: rgba(20,0, 60, 0.5);">

    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card zoom" style="background-color: rgba(0, 0, 0, 0.7);box-shadow: 0px 0px 20px black; ">
                    <div class="card-body" style="color:orange; height: 350px; ">
                        <h3 class="card-title text-center">Login</h3>
                        <form  method="POST" >
                            <div class="mb-3" >
                                <label>UserName/email</label>
                                <input type="text" class="form-control " id="email" name="username" placeholder="enter your user name" required>
                            </div>
                            <div class="mb-3" class="zoom">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"  placeholder="enter your password" required>
                            </div>
                            <div class="mb-3 text-center" >
                                <button type="submit" class="btn btn-primary" style="background-color:darkorange; border:none;" name="btn">Login</button>
                                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#resetModal" style="color: orange;">Forgot Password?</button>
                                <br><br>
                                <center> <?php echo $error; ?> </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="reset passord.php">
    <!-- Reset Password Modal -->
    <div class="modal fade" id="resetModal" tabindex="-1" aria-labelledby="resetModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content" style="  background-color:rgba(1000, 150, 20,0.8); box-shadow:0px 0px 70px black; color:dark;">
                <div class="modal-header">
                    <h5 class="modal-title" id="resetModalLabel">Reset Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body fw-bold">
                    <p>Fill the following fields to reset your password</p>
                        <div class="mb-3">
                            <label for="resetEmail" class="form-label">UserName/Email</label>
                            <input type="text" class="form-control" id="resetEmail" name="remail" required>
                        </div>
                        <div class="mb-3">
                            <label for="resetEmail" class="form-label">PastPassword/ID</label>
                            <input type="password" class="form-control" id="resetEmail" name="rid" required>
                        </div>
                        <button type="submit" class="btn btn-primary bg-dark" style=" border: none;" name="rbutton">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>