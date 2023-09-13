<?php 
session_start();
    if($_SESSION['status_login']!=true){
        header('location: login.php');
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/navbar.css">
<body>
    <!-- Vertical Navbar -->
<nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
                <img src="./assets/logo.png" alt="...">
            </a>
            <!-- User menu (mobile) -->
            <div class="navbar-user d-lg-none">
                <!-- Dropdown -->
                <div class="dropdown">
                    <!-- Toggle -->
                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-parent-child">
                            <img alt="Image Placeholder" src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar- rounded-circle">
                            <span class="avatar-child avatar-badge bg-success"></span>
                        </div>
                    </a>
                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <a href="#" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Billing</a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                            <button class="dropdown-btn"><i class="bi bi-people"></i>Costumer</button>
                            <!-- </br> -->
                            <div class="dropdown-container">
                                <a href="view_costumer.php">View Costumer</a>
                                <br>
                                <a href="add_costumer.php">Add Customer</a>
                            </div>
                    </li>

                    <li class="nav-item">
                            <button class="dropdown-btn"><i class="fa fa-inr"></i>Order</button>
                            <!-- </br> -->
                            <div class="dropdown-container">
                                <a href="view_order.php">View Order</a>
                                <br>
                                <a href="add_order.php">Add Order</a>
                            </div>
                    </li>
                
                    <li class="nav-item">
                            <button class="dropdown-btn"><i class="fa-solid fa-jug-detergent"></i>Servicee</button>
                            <!-- </br> -->
                            <div class="dropdown-container">
                                <a href="view_service.php">View Service</a>
                                <br>
                                <a href="add_service.php">Add Service</a>
                            </div>
                    </li>

                    <li class="nav-item">
                            <button class="dropdown-btn"><i class="fa-solid fa-user-tie"></i>Employee</button>
                            <!-- </br> -->
                            <div class="dropdown-container">
                                <a href="view_employee.php">View Employee</a>
                                <br>
                                <?php 
                                if($_SESSION["role"]=='admin' or $_SESSION["role"]=='owner'){
                                ?>
                                <a href="add_employee.php">Add Employee</a>
                                <?php 
                                }else {

                                }
                                ?>
                            </div>
                    </li>
                    

                    <li class="nav-item">
                            <button class="dropdown-btn"><i class="bi bi-shop"></i>Outlet</button>
                            <!-- </br> -->
                            <div class="dropdown-container">
                                <a href="view_outlet.php">View Outlet</a>
                                <br>
                                <?php 
                                    if($_SESSION["role"]=='admin'){
                                ?>
                                <a href="add_Outlet.php">Add Outlet</a>
                                <?php 
                                    }else{
                                        
                                    }
                                ?>
                            </div>
                    </li>                   

                </ul>

                <!-- Push content down -->
                <div class="mt-auto"></div>
                <!-- User (md) -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">
                            <i class="bi bi-person-square"></i> Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>
</body>
</html>