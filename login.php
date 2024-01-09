<!--                      VIEW BUS                      -->

<?php



include("./database.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    
  
    $Sql = "SELECT * FROM `user` WHERE `Email` = '$Email'";
    $result = mysqli_query($conn, $Sql);
    $num = mysqli_num_rows($result);
    
    if($num == 1){
        while($row = mysqli_fetch_array($result)){
            if (password_verify($Password, $row['Password'])) {
                echo "<br>. Your Query : $sql.<br>";
                $login = true;
                session_start();
                $_SESSION['username'] = $Email;
                $_SESSION['loggedin'] = true;
                header("location:index.php"); 
            } else{
                echo "<script>alert('ERROR: Wrong Password try again with conrrect cradentials')</script>";
            }
        }    
    }
    else{
        $showError = "usrname NOT Exists";
        echo "<script>alert('ERROR: Username not Exists')</script>";

    }


} else {
}

// Close connection
mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'link.php'; ?>
    <style>
        * {
            padding: 0px;
            margin: 0px;
        }

        nav#home-navbar {
            background: #5926dfba;
        }

        .footer-section {
            background: #5926dfba;
        }




        .login-section {
            background-image: url('./image/bus_with_lake.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .mid-login-component {
            margin: 38px;
            width: 39%;
            border-radius: 18px;
            background:white;
           
        }


    
    </style>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <section style="height: 100% " class="login-section d-flex align-items-center justify-content-center flex-column">

        <!-- <img style=" object-fit: cover " src="./image/bus_with_lake.jpg"> -->
        <div style="width:50%" class="mid-login-component p-5 d-flex align-items-center justify-content-center flex-column ">

            <h2 style=" font-weight: bold; color :  #5334a9  ">Hello!</h2>
            <p style=" font-weight: bold; font-size:  23px  ">Welcome back
            </p>

            <h3 style=" font-weight:  bold; color:  #5334a9;">Log in to your account </h3>

            <form class="d-flex align-items-center justify-content-center flex-column " action='login.php' method="post">
                <div class="user-box">
                    <input class='form-control my-2' type="email" name="email" required="" placeholder='Email'>
                </div>
                <div class="user-box">
                    <input class='form-control my-2' type="password" name="password" required="" placeholder='password'>
                </div>

                <button name="submit-btn" class="mt-3 submit-btn btn btn-primary m-auto" type="submit">
                    Login Now
                </button>
            </form>

            <div style="margin: 10px 38px" class="form-footer">
                Dont't have an account with us yet?
                <a href="sign-up.php"> Register</a>
            </div>

        </div>


    </section>


    <?php include 'footer.php'; ?>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- bootstrap js -->

</body>

</html>