<!--                      VIEW BUS                      -->

<?php

// check session
session_start();
if(!isset($_SESSION['username']) || $_SESSION['loggedin'] != true){
    header("location:login.php");
}
// check session
include("./database.php");


//  values from the form data(input)
$From = $_GET['from'];
$To = $_GET['to'];

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();
} else {
    $selectQuery = "SELECT * FROM `routes` WHERE `From` = '$From' AND `To` = '$To';";
    // $selectQuery  = "SELECT * FROM `routes` WHERE `From` = '$from' AND `To` = '$to'" ;
    $result = mysqli_query($conn, $selectQuery);
    if (mysqli_num_rows($result) > 0) {
    } else {
        $msg = "No Record found";
    }
}
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
            background: #5926dfba;
        }

        .btn-primary {
            background-color: #5926df8f;
            border: none;
        }
 
        .btn-primary:hover {
            background-color: #3614928f;
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

        select,
        input,
        option {
            height: 31px;
            width: 93px;
            border: 2px solid #8aa2f8;
            border-radius: 5px;
            width: 139px;
            margin: 12px 0px;
        }

        select:focus {
            border: 2px solid #3555c4;
            outline: none;
        }

        .bus-card {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin: 9px;
            border: 1px solid black;
            padding: 4px;
            border-radius: 6px;
        }

        .bus-ticket-header {
            color: white;
            background: #d4cfff;
            width: 100%;
            padding: 6px 25px;
        }

        .bus-ticket-footer {
            display: flex;
            padding: 18px;
            width: 100%;
            justify-content: space-between;
        }


        h5 {
            font-weight: 700;
        }

        p {
            color: gray;
        }

        h2 {
            font-family: var(--mdb-body-font-family);
            font-size: 6vh;
            text-align: center;
            margin: 30px;
        }
    </style>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <section class="bus-ticket">

        <?php

        //   Fetch from Location Name 
        $selectFromLocationQuery = "SELECT `Location` FROM `location` WHERE `Id` = " . $From . "";
        $LocationFromResult = mysqli_query($conn, $selectFromLocationQuery);
        $LocationFromName = mysqli_fetch_assoc($LocationFromResult);

        //   Fetch to Location Name 
        $selectToLocationQuery = "SELECT `Location` FROM `location` WHERE `Id` = " . $To . "";
        $LocationToResult = mysqli_query($conn, $selectToLocationQuery);
        $LocationToName = mysqli_fetch_assoc($LocationToResult);

        foreach ($LocationFromName as $FromLocation) {
            foreach ($LocationToName as $ToLocation) {
                echo " <h2>Selected Route From <span style='color:red'>
                $FromLocation 
            </span> To <span style='color:red'>
            $ToLocation
           </span></h2>";
            }
        }
        ?>

        <?php while ($row = mysqli_fetch_assoc($result)) {
            if (mysqli_connect_errno()) {
                echo mysqli_connect_error();
                exit();
            } else {
                //   Fetch Bus Name 
                $selectBusQuery = "SELECT `Bus_name` FROM `bus` WHERE `Id` = " . $row["Bus_name"] . "";
                $BusResult = mysqli_query($conn, $selectBusQuery);
                $BusName = mysqli_fetch_assoc($BusResult);

                foreach ($BusName as $bus) {
                    echo "<div class='bus-card'>
                            <div class='bus-ticket-header'>
                              <span style='color:red'>
                                START FROM
                              </span>
                              " . $row['Address'] . " + 6 STOP
                            </div>
                           <div class='bus-ticket-footer'>
                          <div style='width: 25%;' class='name'>
                              <h5>" . $bus . "</h5>
                              <p>A/C sleeper(2+1)</p>
                              </div>
                          <div style='width: 11%;' class='start-time'>
                              <h5>
                                " . $row['Time'] . " 
                              </h5>
                              <p>" . $row['Address'] . " </p>

                          </div>
                               <div class='totale-time'>
                               <p>
                                 07h 58m
                               </p>
                          </div>
                          <div class='destignation-time'>
                             <h5>
                                 8:00
                             </h5>
                             <p>
                                <span style='color:red'>
                                  03-Jan
                                </span>
                                  200 fit bypass Ajmar road
                             </p>
                           </div>
                           <div class='ticket-price'>Start from INR
                                <h5>" . $row['Cost'] . " $</h5>
                           </div>
                           <div class='rating'>4.3</div>
                           <div class='bus-seat'>
                                <p>22 seat available</p>
                                <p>6 single</p>
                                <button class='btn btn-primary'>VIEW SEATS</button>
                           </div>
                     </div>
               </div>";
                }
            }
        } ?>
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