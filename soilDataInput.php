<?php
    include 'include/top.php';
    $userID = '';
    $user_id = $_SESSION['USER_ID'];
    $user_name = $_SESSION['USER_NAME'];

    if(isset($_POST['submit'])){
        $query = "SELECT Sensor.`Sensor ID`
        FROM Sensor
        INNER JOIN Farm ON Sensor.`Farm ID` = Farm.`Farm ID`
        INNER JOIN Farmer ON Farm.`Farmer ID` = Farmer.`Farmer ID`
        WHERE Farmer.`Farmer ID` = '$user_id'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $sensorID = $row['Sensor ID'];
        $soil_id = mysqli_real_escape_string($con, $_POST['soil_id']);
        $soil_type = mysqli_real_escape_string($con, $_POST['soil_type']);
        $soil_moisture = mysqli_real_escape_string($con, $_POST['soil_moisture']);
        $ph_level = mysqli_real_escape_string($con, $_POST['ph_level']);
        $nutrition_level = mysqli_real_escape_string($con, $_POST['nutrition_level']);
        $soil_color = mysqli_real_escape_string($con, $_POST['soil_color']);
        $soil_texture = mysqli_real_escape_string($con, $_POST['soil_texture']);
        $fertility_status = mysqli_real_escape_string($con, $_POST['fertility_status']);
        $date = mysqli_real_escape_string($con, $_POST['date']);
        mysqli_query($con, "INSERT INTO `Soil`(`Soil ID`, `Soil Type`, `Soil Moisture`, `pH Level`, `Nutrition Level`, `Soil Color`, `Soil Texture`, `Fertility Status`, `Sensor ID`, `Date`)
            VALUES('$soil_id', '$soil_type', '$soil_moisture', '$ph_level', '$nutrition_level', '$soil_color', '$soil_texture', '$fertility_status', '$sensorID', '$date')");
        header('Location:farmerDashboard.php');
    }
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soil Information Form</title>
    <link rel="stylesheet" href="css/stylesTS.css">
</head>
<body> -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Soil Information Form</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styleSN.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/stylesTS.css">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="icon" href="img/ico.png">

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="farmerDashboard.php"><span class="text-warning">Agro</span>Tech</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

        <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
            
        </nav>
        <!-- Navbar Ends-->

        <!-- Sidebar -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">My Farm</div>
                                <a class="nav-link" href="farmerDashboard.php">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-seedling" style="color: #48b931;"></i></div>
                                    Overview
                                </a>
                                <a class="nav-link" href="alert.php">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-bell" style="color: #FFD43B;"></i></div>
                                    Alert
                                </a>

                            <div class="sb-sidenav-menu-heading">Data</div>

                                <a class="nav-link" href="crop.php">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-heart-pulse" style="color: #ff3d3d;"></i></div>
                                    Crop Health
                                </a>

                                <a class="nav-link" href="soil.php">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-mound" style="color: #a6662b;"></i></div>
                                    Soil Data
                                </a>

                                <a class="nav-link" href="weather.php">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-sun" style="color: #FFD43B;"></i></div>
                                    Weather
                                </a>
                            
                                <div class="sb-sidenav-menu-heading">Services</div>
                        
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOrder" aria-expanded="false" aria-controls="collapsePages">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-shopping" style="color: #74C0FC;"></i></div>
                                    Order
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
    
                                <div class="collapse" id="collapseOrder" aria-labelledby="headingFour" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="order.php">View Products</a>
                                        <a class="nav-link" href="cart.php">Cart</a>
                                        <a class="nav-link" href="past_order.php">Past Orders</a>
                                    </nav>
                                </div>



                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSupport" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book-open-reader" style="color: #ffffff;"></i></div>
                                Support
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapseSupport" aria-labelledby="headingFour" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    
                                    <a class="nav-link" href="inbox.php">Inbox</a>
                                    <a class="nav-link" href="past_issues.php">Past Issues</a>
                                    <a class="nav-link" href="contact_support.php">Contact Support</a>
                                    <a class="nav-link" href="weatherDataInput.php">Weather Data Input</a> 
                                    <a class="nav-link" href="soilDataInput.php">Soil Data Input</a> 
                                    <a class="nav-link" href="sensorDataInput.php">Sensor Data Input</a> 
                                </nav>
                            </div>
                            <a class="nav-link" href="problem_archive.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-box-archive" style="color: #B197FC;"></i></div>
                                Problem Archive
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $user_name; ?>
                    </div>
                </nav>
            </div>
        <!-- Sidebar Ends-->
<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
    <div class="container">
        <h2>Soil Information Form</h2>
        <form method = "post" class="signin-form">
            <div class="form-group">
                <label for="soil_id">Soil ID:</label>
                <input type="text" id="soil_id" name="soil_id" required>
            </div>
            <div class="form-group">
                <label for="soil_type">Soil Type:</label>
                <input type="text" id="soil_type" name="soil_type" required>
            </div>
            <div class="form-group">
                <label for="soil_moisture">Soil Moisture:</label>
                <input type="text" id="soil_moisture" name="soil_moisture" required>
            </div>
            <div class="form-group">
                <label for="ph_level">pH Level:</label>
                <input type="text" id="ph_level" name="ph_level" required>
            </div>
            <div class="form-group">
                <label for="nutrition_level">Nutrition Level:</label>
                <input type="text" id="nutrition_level" name="nutrition_level" required>
            </div>
            <div class="form-group">
                <label for="soil_color">Soil Color:</label>
                <input type="text" id="soil_color" name="soil_color" required>
            </div>
            <div class="form-group">
                <label for="soil_texture">Soil Texture:</label>
                <input type="text" id="soil_texture" name="soil_texture" required>
            </div>
            <div class="form-group">
                <label for="fertility_status">Fertility Status:</label>
                <input type="text" id="fertility_status" name="fertility_status" required>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>
            </div>
            <button type="submit" name = "submit" class="btn-submit">Submit</button>
        </form>
    </div>
</div>
</main>
</div>
</body>
</html>
