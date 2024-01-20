

<?php

// check session
session_start();
if(!isset($_SESSION['username']) || $_SESSION['loggedin'] != true){
    header("location:login.php");
}
// check session


include("./database.php");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

 
// add initial location  in dropdown input
$selectQuery2 = "SELECT * FROM `location`;";

$result2 = mysqli_query($conn, $selectQuery2);

if (mysqli_num_rows($result2) > 0) {
} else {
    $msg2 = "No Record found";
}

// add ending  location  in dropdown input
$selectQuery3 = "SELECT * FROM `location`;";

$result3 = mysqli_query($conn, $selectQuery3);

if (mysqli_num_rows($result3) > 0) {
} else {
    $msg3 = "No Record found";
}

// Taking all 4 values from the form data(input)


$Name = "";
$Type = "";
$Capacity = "";
$Number = "";

if (isset($_POST['submit-btn'])) {

    $Name = $_POST['bus_name'];  
    $From = $_POST['from'];
    $To = $_POST['to'];
    $Address = $_POST['address'];
    $Time= $_POST['time'];

  
    // Performing insert query execution
    $sql = "INSERT INTO `routes`(`Bus_id`, `Bus_name`, `From`, `To`, `Address`, `Time`) VALUES ('$Name', '$Name', '$From', '$To', '$Address', '$Time')";


    if (mysqli_query($conn, $sql)) {

        echo "<br>. Your Query : $sql.<br>";
        // echo "<script>alert('Successfully save your activities')</script>";

        header("location:view-routes.php"); // 
    } else {
        echo "<script>alert('ERROR: Hush! Sorry')</script>";
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
            background: #0037ff3b;
        }

        nav#home-navbar::before {
            content: "";
            background-image: url("./image/bus_In_night.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: absolute;
            top: 0px;
            left: 0px;
            height: 100vh;
            width: 100%;
            z-index: -1;
        }

        .home-section {
            height: 90vh;

            background: #0037ff3b;
        }

        h2 {
            font-family: emoji;
            font-size: 10vh;
        }

        h3 {
            font-family: fantasy;
        }

        h4 {
            font-family: fangsong;
            font-size: 37px;
        }

        .mid-pera {
            width: 88%;
        }

        .footer-section {
            background-color: #111e4aa1;
        }

        .btn-primary {
            background-color: #0037ff3b;
            border: none;
        }


        .ticket-booking-container {
            position: relative;
            height: 7vh;
        }

        .booking-inner-container {
            margin: 0px 113px;
            box-shadow: 0 0 22px #c2c1c1;
            padding: 23px;
            border-radius: 10px;
            position: absolute;
            top: -57px;
            left: 0px;
            width: 80%;
            background-color: white
        }

        select,input,option{
            height: 31px;
    width: 93px;
    border: 2px solid #8aa2f8;
    border-radius: 5px;
    width: 139px;
    margin: 12px 0px;
        }

        select:focus{
            border: 2px solid #3555c4;
            outline: none;
        }

        .navbar{

            --mdb-navbar-box-shadow: none;
        }

        .btn:hover{
            background-color:  #7385e6;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="home-section p-5 d-flex align-items-center justify-content-center flex-column">
        <p class="text-white" >Lorem ipsum dolor sit amet.
        </p>
        <h2 class="text-white">Welcome to  GriTisome  travel agency</h2>
        <h2 class="text-white">Most welcome</h2>
        <button type="button" class="btn btn-outline-light">Register Now -></button>
    </div>

    <!-- ticket boking container  -->

    <div class="ticket-booking-container ">
        <div class="booking-inner-container">
            <form class="d-flex align-items-center justify-content-between" action="bus-ticket.php">
                <div class="inputs d-flex flex-column">
                    <label class="text-secondary" for="from">From:</label>
                    <select   type="select" name="from" >
                        <option   value="">Select</option>
                        <?php while ($row = mysqli_fetch_assoc($result2)) {
                        echo " <option value='" . $row["Id"] . "'>" . $row["Location"] . "</option>
                        ";
                         } ?>
                    </select>
                </div>
                <div class="inputs  d-flex flex-column">
                    <label class="text-secondary" for="to">To:</label>
                    <select id="to" type="select" name="to" >
                        <option   value="">Select</option>
                        <option value="">Select To</option>
                        <?php while ($row = mysqli_fetch_assoc($result3)) {
                        echo " <option value='" . $row["Id"] . "'>" . $row["Location"] . "</option>
                        ";
                         } ?>
                    </select>
                </div>
                <div class="inputs  d-flex flex-column">
                    <label class="text-secondary" for="from">Date:</label>
                    <input name="date" type="date">
                </div>

                <button type="submit-btn" class="btn btn-primary ">Check Availability</button>
            </form>
        </div>
    </div>
    <!-- ticket boking container  -->

    <!-- about us section -->
    <div class="about-section p-5 row text-black">
        <div class="about-left col-lg-6 d-flex  justify-content-center flex-column p-3">
            <h3 class="text-black">About us</h3>
            <h4 class="text-black">At Luxury Bus</h4>
            <p class="text-black mid-pera">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem explicabo sunt ea iusto? Nisi aliquid magnam saepe illum dignissimos quis doloremque expedita harum, fugit itaque, sunt nihil, amet veniam. Commodi molestiae voluptatibus debitis repellendus in et porro cumque sapiente harum reprehenderit ea, tempora, vitae fuga.</p>

            <button style="width: 27%;" class="btn btn-primary">Read more -></button>
        </div>
        <div class="about-right col-lg-6 p-3">
            <img style="height:400px;width:100%" src="./image/about.png" alt="">
        </div>
    </div>
    <!-- about us section -->


    <!-- featured offer -->
    <div class="featured-section p-5 row text-black">
        <div class="about-right col-lg-6 p-3 ">
            <img style="height:400px;width:100%" src="./image/blue_bus.jpg" alt="">
        </div>
        <div class="about-left col-lg-6 d-flex  justify-content-center flex-column p-3">
            <h3 class="text-black">Our Featured</h3>
            <h4 class="text-black">Economy Luxe Bus</h4>
            <p class="text-black">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem explicabo sunt ea iusto? Nisi aliquid magnam saepe illum dignissimos quis doloremque expedita harum, fugit itaque, sunt nihil, amet veniam. Commodi molestiae voluptatibus debitis repellendus in et porro cumque sapiente harum reprehenderit ea, tempora, vitae fuga.</p>

            <button style="width: 27%;" class="btn btn-primary">Read more -></button>
        </div>
    </div>


    <?php include 'footer.php'; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>