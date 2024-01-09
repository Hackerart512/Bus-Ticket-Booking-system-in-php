<!--                      ADD BUS                      -->

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

// add bus type in dropdown input
$selectQuery = "SELECT * FROM `bus_type`;";

$result = mysqli_query($conn, $selectQuery);

if (mysqli_num_rows($result) > 0) {
} else {
    $msg = "No Record found";
}

// Taking all 4 values from the form data(input)


$Name = "";
$Type = "";
$Capacity = "";
$Number = "";

if (isset($_POST['submit-btn'])) {

    $Name = $_POST['bus_name'];
    $Type = $_POST['bus_type'];
    $Capacity = $_POST['bus_capacity'];
    $Number = $_POST['bus_number'];


    // Performing insert query execution
    $sql = "INSERT INTO `bus`(`Bus_name`, `Bus_type`,`Bus_capacity`,`Bus_number`, `Active_status`) VALUES ('$Name', '$Type', '$Capacity', '$Number', '1')";


    if (mysqli_query($conn, $sql)) {

        echo "<br>. Your Query : $sql.<br>";
        // echo "<script>alert('Successfully save your activities')</script>";

        header("location:view-bus.php"); // 
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
        /* .main-content{
            margin: 111px 53px;
        } */
        body {
            background-color: #fbfbfb;
        }


        @media (min-width: 991.98px) {
            main {
                padding-left: 240px;
            }
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            padding: 58px 0 0;
            /* Height of navbar */
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
            width: 240px;
            z-index: 600;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                width: 100%;
            }
        }

        .sidebar .active {
            border-radius: 5px;
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: 0.5rem;
            overflow-x: hidden;
            overflow-y: auto;
            /* Scrollable contents if viewport is shorter than content. */
        }
    </style>
</head>

<body>
    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Brand -->
                <a style="    font-style: oblique;
    /* font-size: 19px; */
    font-weight: 900;color: #a8bfe3" class="navbar-brand" href="#">
                    <!-- <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="25" alt="MDB Logo" loading="lazy" /> -->
                    <span style="color:#6464d6">Griti</span>some
                </a>
                <!-- Search form -->
                <form class="d-none d-md-flex input-group w-auto my-auto">
                    <input autocomplete="off" type="search" class="form-control rounded" placeholder='Search (ctrl + "/" to focus)' style="min-width: 225px;" />
                    <span class="input-group-text border-0"><i class="fas fa-search"></i></span>
                </form>

                <!-- Right links -->
                <ul class="navbar-nav ms-auto d-flex flex-row">
                    <!-- Notification dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            <span class="badge rounded-pill badge-notification bg-danger">1</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="#">Some news</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Another news</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Icon -->
                    <li class="nav-item">
                        <a class="nav-link me-3 me-lg-0" href="#">
                            <i class="fas fa-fill-drip"></i>
                        </a>
                    </li>
                    <!-- Icon -->
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="#">
                            <i class="fab fa-github"></i>
                        </a>
                    </li>

                    <!-- Avatar -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (31).webp" class="rounded-circle" height="22" alt="Avatar" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="#">My profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Settings</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 58px;">
        <div class="main-content pt-4 bg-white p-5 rounded-5">
            <h2 class="text-center my-3">Add Bus</h2>
            <form style="padding: 0px 216px;" class=" my-5 d-flex  justify-content-center flex-column" action="add-bus.php" method="post">

                <div class="my-3 d-flex  align-items-center justify-content-center">
                    <label class="form-label  w-100" for="busname">Bus Name</label>
                    <input name="bus_name" type="text" id="busname" class="form-control border-dark " />
                </div>
                <div class="my-3 d-flex  align-items-center justify-content-center">
                    <label class="form-label  w-100" for="bustype">Bus Type</label>
                    <select name="bus_type" style="height:38px" class="w-100 px-2 rounded-2" id="bustype">
                        <option value="">Select bus type</option>

                        <?php while ($row = mysqli_fetch_assoc($result)) {
                        echo " <option value='" . $row["Type"] . "'>" . $row["Type"] . "</option>
                        ";
                         } ?>
                       
                    </select>

                </div>
                <div class="my-3 d-flex  align-items-center justify-content-center">
                    <label class="form-label  w-100" for="buscapacity">Bus Capicity</label>
                    <input name="bus_capacity" type="text" id="buscapacity" class="form-control border-dark " />
                </div>
                <div class="my-3 mb-5 d-flex  align-items-center justify-content-center">
                    <label class="form-label  w-100" for="busnumber">Bus Number</label>
                    <input name="bus_number" type="text" id="busnumber" class="form-control border-dark " />
                </div>

                <button name="submit-btn" style="background-color:#3b71ca" class="btn btn-dark rounded-5  ">Submit</button>
            </form>
        </div>
    </main>
    <!--Main layout-->

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