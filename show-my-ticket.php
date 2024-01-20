<!--                      VIEW BUS                      -->

<?php

// check session
session_start();
if (!isset($_SESSION['username']) || $_SESSION['loggedin'] != true) {
    header("location:login.php");
}
// check session

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

        <h2> PRINT TICKET</h2>

        <p class="text-center text-4">Verify your details, and Print your tickets</p>

        <div class="show-ticket-form d-flex   justify-content-center">
            <form action="" class="d-flex align-items-center justify-content-center">
                <div class="m-3">
                    <label for="exampleFormControlInput1" class="form-label mb-0">TICKET NUMBER</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your Ticket Number">
                </div>
                <div class="m-3">
                    <label for="exampleFormControlInput2" class="form-label mb-0">MOBILE NUMBER</label>
                    <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="+91">
                </div>

                <button  class="btn btn-primary" type="submit">Submit</button>
            </form>
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