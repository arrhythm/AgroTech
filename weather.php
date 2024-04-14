<?php
    include 'include/navigation_bar.php';
    $userID = '';
    $user_id = $_SESSION['USER_ID'];
    $user_name = $_SESSION['USER_NAME'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>My Farm - Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styleSN.css" rel="stylesheet" />
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
                <!-- Breadcrumb-->
                <div class="container-fluid px-4">
                    <h1 class="mt-4">My Farm</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Weather</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-body">
                            On this page, you can view available information regarding the local weather.
                        </div>
                    </div>
                    <!--Latest Soil Data and Soil Details-->
                    <div class="pb-4">
                        <h4>Latest Weather</h4>
                        <hr>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"><div><i class="fa-solid fa-temperature-three-quarters"></i> Air Temperature</div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <span class="small text-white">
                                        <?php
                                                $query = "SELECT `Weather Data`.`Temperature`
                                                FROM `Weather Data`
                                                INNER JOIN (
                                                    SELECT MAX(`Weather Data Date`) AS max_date, `Postal Code`
                                                    FROM   `Weather Data`
                                                    GROUP BY `Postal Code`
                                                ) AS max_dates ON `Weather Data`.`Weather Data Date` = max_dates.max_date AND `Weather Data`.`Postal Code` = max_dates.`Postal Code`
                                                INNER JOIN Farm ON `Weather Data`.`Postal Code` = Farm.`Postal Code`
                                                INNER JOIN Farmer ON Farm.`Farmer ID` = Farmer.`Farmer ID`
                                                WHERE Farmer.`Farmer ID` = '$user_id'";
                                                $result = mysqli_query($con, $query);
                                                $row = mysqli_fetch_assoc($result);
                                                $temperature = $row ? $row['Temperature'] : "0";
                                                echo $temperature;
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><div><i class="fa-solid fa-droplet"></i> Humidity</div>
                                         </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <span class="small text-white">
                                        <?php
                                                $query = "SELECT `Weather Data`.`Humidity`
                                                FROM `Weather Data`
                                                INNER JOIN (
                                                    SELECT MAX(`Weather Data Date`) AS max_date, `Postal Code`
                                                    FROM   `Weather Data`
                                                    GROUP BY `Postal Code`
                                                ) AS max_dates ON `Weather Data`.`Weather Data Date` = max_dates.max_date AND `Weather Data`.`Postal Code` = max_dates.`Postal Code`
                                                INNER JOIN Farm ON `Weather Data`.`Postal Code` = Farm.`Postal Code`
                                                INNER JOIN Farmer ON Farm.`Farmer ID` = Farmer.`Farmer ID`
                                                WHERE Farmer.`Farmer ID` = '$user_id'";
                                                $result = mysqli_query($con, $query);
                                                $row = mysqli_fetch_assoc($result);
                                                $humidity = $row ? $row['Humidity'] : "0";
                                                echo $humidity;
                                            ?>%
                                        </span>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"><div><i class="fa-solid fa-wind"></i> Wind Speed</div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <span class="small text-white">
                                        <?php
                                                $query = "SELECT `Weather Data`.`Wind Speed`
                                                FROM `Weather Data`
                                                INNER JOIN (
                                                    SELECT MAX(`Weather Data Date`) AS max_date, `Postal Code`
                                                    FROM   `Weather Data`
                                                    GROUP BY `Postal Code`
                                                ) AS max_dates ON `Weather Data`.`Weather Data Date` = max_dates.max_date AND `Weather Data`.`Postal Code` = max_dates.`Postal Code`
                                                INNER JOIN Farm ON `Weather Data`.`Postal Code` = Farm.`Postal Code`
                                                INNER JOIN Farmer ON Farm.`Farmer ID` = Farmer.`Farmer ID`
                                                WHERE Farmer.`Farmer ID` = '$user_id'";
                                                $result = mysqli_query($con, $query);
                                                $row = mysqli_fetch_assoc($result);
                                                $windSpeed = $row ? $row['Wind Speed'] : "0";
                                                echo $windSpeed;
                                            ?> km/h</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    
                                    <div class="card-body"><div><i class="fa-solid fa-gauge"></i> Atmospheric Pressure</div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <span class="small text-white">
                                        <?php
                                                $query = "SELECT `Weather Data`.`Atmospheric Pressure`
                                                FROM `Weather Data`
                                                INNER JOIN (
                                                    SELECT MAX(`Weather Data Date`) AS max_date, `Postal Code`
                                                    FROM   `Weather Data`
                                                    GROUP BY `Postal Code`
                                                ) AS max_dates ON `Weather Data`.`Weather Data Date` = max_dates.max_date AND `Weather Data`.`Postal Code` = max_dates.`Postal Code`
                                                INNER JOIN Farm ON `Weather Data`.`Postal Code` = Farm.`Postal Code`
                                                INNER JOIN Farmer ON Farm.`Farmer ID` = Farmer.`Farmer ID`
                                                WHERE Farmer.`Farmer ID` = '$user_id'";
                                                $result = mysqli_query($con, $query);
                                                $row = mysqli_fetch_assoc($result);
                                                $atmosphericPressure = $row ? $row['Atmospheric Pressure'] : "0";
                                                echo $atmosphericPressure;
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    </div>

                    <h4>Weather Trends</h4>
                    <hr>
                    <div class="row pt-2 g-3">
                        <!--Temperature Graph-->    
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Temperature Trend
                                </div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                <div class="card-footer"> 
                                    Everything looks good!
                                </div>
                            </div>
                        </div>

                        <!--Humidity Graph-->   
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Humidity Trend
                                </div>
                                <div class="card-body"><canvas id="myAreaChart2" width="100%" height="40"></canvas></div>
                                <div class="card-footer"> 
                                    Everything looks good!</div>
                            </div>
                        </div>
                        <!--Wind Speed Graph-->   
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Wind Speed Trend
                                </div>
                                <div class="card-body"><canvas id="myAreaChart3" width="100%" height="40"></canvas></div>
                                <div class="card-footer"> Parameters are within normal range.</div>
                            </div>
                        </div>

                        <!--Atmospheric Pressure Graph-->   
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Atmospheric Pressure Trend
                                </div>
                                <div class="card-body"><canvas id="myAreaChart4" width="100%" height="40"></canvas></div>
                                <div class="card-footer"> 
                                    Everything looks good!
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Nutrition Level Graph-->    
                    <div></div>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-area-demo-2.js"></script>
        <script src="assets/demo/chart-area-demo-3.js"></script>
        <script src="assets/demo/chart-area-demo-4.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="js/form.js"></script>
    </body>
</html>
