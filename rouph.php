<!--------------------------------------- Rouph Purposes ------------------------------------------>

<?php
// header("location:bus-ticket.php"); 
// check session
// session_start();
// if(!isset($_SESSION['username'])){
//     header("location:login.php");
// }
// check session


include("./database.php");

// Check connection
//  values from the form data(input)
// $From = $_GET['from'];
// $To = $_GET['to'];


if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();
} else {
    $selectQuery = "SELECT * FROM `routes`;";
    //$selectQuery  = "SELECT * FROM `routes` WHERE `From` = '$from' AND `To` = '$to'" ;
    $result = mysqli_query($conn, $selectQuery);
    if (mysqli_num_rows($result) > 0) {
    } else {
        $msg = "No Record found";
    }
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
            margin: 8px;
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
            text-transform: uppercase;
            margin: 30px;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <section class="bus-ticket">

        <h2>Selected route buses</h2>
        <div class="bus-card">
            <div class="bus-ticket-header">
                <span style="color:red">
                    START FROM
                </span>
                PARAS CIRCLE + 6 STOP
            </div>
            <div class="bus-ticket-footer">
                <div class="name">
                    <h5> MATRO RAJLAKSHMI TRAILER</h5>
                    <p>A/C sleeper(2+1)</p>
                </div>
                <div class="start-time">
                    <h5>
                        6:00 AM
                    </h5>
                    <p>PARAS CIECLE</p>

                </div>
                <div class="totale-time">
                    <p>
                        07h 58m
                    </p>
                </div>
                <div class="destignation-time">
                    <h5>
                        8:00
                    </h5>
                    <p>
                        <span style="color:red">
                            03-Jan
                        </span>
                        200 fit bypass Ajmar road
                    </p>
                </div>
                <div class="ticket-price">Start from INR
                    <h5>500$</h5>
                </div>
                <div class="rating">4.3</div>
                <div class="bus-seat">
                    <p>22 seat available</p>
                    <p>6 single</p>
                    <button class="btn btn-primary">VIEW SEATS</button>
                </div>
            </div>
        </div>
        <!-- card 2 -->


    </section>

    <section>
         
    <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Bus ID</th>
                            <th scope="col">Bus Name</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Time</th>
                            <th scope="col">Date/Time</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php while ($row = mysqli_fetch_assoc($result)) {

                            if (mysqli_connect_errno()) {
                                echo mysqli_connect_error();
                                exit();
                            } else {
                                //   Fetch Bus Name 
                                $selectBusQuery = "SELECT `Bus_name` FROM `bus` WHERE `Id` = " . $row["Bus_name"] . "";
                                $BusResult = mysqli_query($conn, $selectBusQuery);
                                $BusName = mysqli_fetch_assoc($BusResult);

                                //   Fetch from Location Name 
                                $selectFromLocationQuery = "SELECT `Location` FROM `location` WHERE `Id` = " . $row["From"] . "";
                                $LocationFromResult = mysqli_query($conn, $selectFromLocationQuery);
                                $LocationFromName = mysqli_fetch_assoc($LocationFromResult);

                                //   Fetch from Location Name 
                                $selectToLocationQuery = "SELECT `Location` FROM `location` WHERE `Id` = " . $row["To"] . "";
                                $LocationToResult = mysqli_query($conn, $selectToLocationQuery);
                                $LocationToName = mysqli_fetch_assoc($LocationToResult);

                                foreach ($BusName as $bus) {
                                    foreach ($LocationFromName as $FromLocation) {
                                        foreach ($LocationToName as $ToLocation) {
                                        echo "<tr>
                                         <td scope='row'> " . $row["Id"] . "</td>
                                         <td>" . $row["Bus_id"] . "</td>
                                         <td>" . $bus . "</td>
                                         <td>" . $FromLocation . "</td>
                                         <td>" .  $ToLocation  . "</td>
                                         <td>" . $row["Time"] . "</td>
                                         <td>" . $row["Date_Time"] . "</td>
   
                                         <td>
                                   <a class='bg-primary text-white p-1 px-2  rounded-5' href='bus-update.php'>update</a>
                                   <a class='bg-danger text-white p-1 px-2  rounded-5' href='bus-delete.php'>Delete</a>
                               </td>
                                     </tr>";
                                        }
                                    }
                                }
                            }
                        } ?>
                    </tbody>
                </table>

    </section>

    <?php include 'footer.php'; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>