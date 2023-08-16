 <?php
    $con=mysqli_connect("localhost","root","","mall");
    if (isset($_POST['rbutton'])) {
        $uID=$_POST['rid'];
        $remail=$_POST['remail'];
        if ($remail=="manager") {
            $resetp="UPDATE manager_login SET password='$uID' ";
            $queryp=mysqli_query($con,$resetp);
            if ($queryp) {
                echo "<script> alert('reset completed') </script>";
                header("Location:login form.php");
            }
            else{
                echo "<script> alert('resete failed') </script>";
                echo mysqli_error($con);
            }
        }
        else{
            $resetp="UPDATE tenant_login SET password='$uID' where tenantID='$uID' ";
            $queryp=mysqli_query($con,$resetp);
            if ($queryp) {
                echo "<script> alert('reset completed') </script>";
                header("Location:login form.php");
            }
            else{
                echo "<script> alert('resete failed') </script>";
                echo mysqli_error($con);
            }
        }
        
    }
?>