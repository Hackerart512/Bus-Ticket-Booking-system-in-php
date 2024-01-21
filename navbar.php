
<!-- Navbar -->
<nav id="home-navbar" class="navbar navbar-expand-lg  ">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand text-white" href="#"><img class="mx-2" style="width:42px" src="./image/logo.png" alt=""></a>

    <!-- Toggle button -->
    <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">My Booking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Contact Us</a>
        </li>
      </ul>

      <!-- Left links -->


      <div class="d-flex align-items-center">

      <?php
           if(isset($_SESSION['username'])){
            echo"<a  href='login.php' data-mdb-ripple-init type='button' class='btn  btn-primary text-white  btn-link px-3 me-2  '>
            Logout
           </a>

           <a   href='login.php' data-mdb-ripple-init type='button' class='btn  btn-primary text-white  btn-link px-3 me-2  '>
            Account
           </a>
           
           ";
            
           }else{
               echo"<a href='login.php' data-mdb-ripple-init type='button' class='btn text-white btn-link px-3 me-2'>
               Login
             </a>
             <a href='sign-up.php' data-mdb-ripple-init type='button' class='btn btn-primary me-3'>
               Sign up
             </a>";
           }
      ?>

      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->