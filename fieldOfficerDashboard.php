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
        <title>Field Officer Dashboard</title>
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
                            <div class="sb-sidenav-menu-heading">Field Overview</div>
                                <a class="nav-link" href="farmerTable.php">
                                    <div class="sb-nav-link-icon"><img src="images/f1.jpg" alt="" style="max-width: 100%; max-height: 100%;"></div>
                                    Farmers
                                </a>
                                <a class="nav-link" href="farmTable.php">
                                    <div class="sb-nav-link-icon"><img src="images/fm.png" alt="" style="max-width: 100%; max-height: 100%;"></div>
                                    Farms
                                </a>
                                <a class="nav-link" href="agronomistTable.php">
                                    <div class="sb-nav-link-icon"><img src="images/a.png" alt="" style="max-width: 100%; max-height: 100%;"></div>
                                    Agronomists
                                </a>
                                <a class="nav-link" href="technicianTable.php">
                                    <div class="sb-nav-link-icon"><img src="images/t.jpg" alt="" style="max-width: 100%; max-height: 100%;"></div>
                                    Technicians
                                </a>
                                <div class="sb-sidenav-menu-heading">Correspondence</div>
                            <a class="nav-link" href="fieldOfficerInbox.php">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-inbox" style="color: white;"></i></div>
                                    Inbox
                                </a>

                                <a class="nav-link" href="fieldOfficerArchive.php">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-box-archive" style="color: #74C0FC;"></i></div>
                                    Message Archive
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
<!-- Breadcrumb-->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">My Farm</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Overview</li>
                        </ol>
        <!-- Breadcrumb Ends-->
        <div class="card mb-4">
            <div class="card-body">
                Welcome to your dashboard!
            </div>
        </div>
                <!--Cards-->
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body"><div> Total Farmers </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <span class="small text-white">
                                <?php
                                    $query = "SELECT COUNT(`Farmer ID`) AS totalFarmer
                                    FROM Farm
                                    JOIN `Field Officer` ON `Field Officer`.`Postal Code` = `Farm`.`Postal Code`";
                                    $result = mysqli_query($con, $query);
                                    if ($result) {
                                        $row = mysqli_fetch_assoc($result);
                                        $totalFarmer  = $row['totalFarmer'];
                                        echo "$totalFarmer ";
                                    } else {
                                        echo "Error executing query: " . mysqli_error($conn);
                                    }
                                ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"><div> Total Farms</div>
                                    </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <span class="small text-white">
                                <?php
                                    $query = "SELECT COUNT(`Farm ID`) AS totalFarm
                                    FROM Farm
                                    JOIN `Field Officer` ON `Field Officer`.`Postal Code` = `Farm`.`Postal Code`";
                                    $result = mysqli_query($con, $query);
                                    if ($result) {
                                        $row = mysqli_fetch_assoc($result);
                                        $totalFarm  = $row['totalFarm'];
                                        echo "$totalFarm ";
                                    } else {
                                        echo "Error executing query: " . mysqli_error($conn);
                                    }
                                ?>
                                </span>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body"><div> Total Agronomist</div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <span class="small text-white">
                                <?php
                                    $query = "SELECT COUNT(`Agronomist ID`) AS totalAgronomist
                                    FROM Agronomist
                                    JOIN `Field Officer` ON `Field Officer`.`Postal Code` = `Agronomist`.`Postal Code`";
                                    $result = mysqli_query($con, $query);
                                    if ($result) {
                                        $row = mysqli_fetch_assoc($result);
                                        $totalAgronomist  = $row['totalAgronomist'];
                                        echo "$totalAgronomist ";
                                    } else {
                                        echo "Error executing query: " . mysqli_error($conn);
                                    }
                                ?>
                                </span>
                            </div>
                        </div>
                    </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body"><div>Total Technician</div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <span class="small text-white">
                                <?php
                                    $query = "SELECT COUNT(`Technician ID`) AS totalTechnician
                                    FROM Technician
                                    JOIN `Field Officer` ON `Field Officer`.`Postal Code` = `Technician`.`Postal Code`";
                                    $result = mysqli_query($con, $query);
                                    if ($result) {
                                        $row = mysqli_fetch_assoc($result);
                                        $totalTechnician  = $row['totalTechnician'];
                                        echo "$totalTechnician ";
                                    } else {
                                        echo "Error executing query: " . mysqli_error($conn);
                                    }
                                ?>
                                </span>
                            </div>
                        </div>
                                </div>
                                </div>
                        <div class="card mb-4">
            <div class="card-header">
                Farmer's Problems Overview
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Farm ID</th>
                            <th scope="col">Farmer Name</th>
                            <th scope="col">Problem Description</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                                $query = "SELECT * FROM `Participant`
                                JOIN `Farm` ON Farm.`Farmer ID` = Participant.`User ID`
                                JOIN Problem ON Problem.`Farm ID` = Farm.`Farm ID`
                                JOIN `Field Officer` ON Farm.`Postal Code` = `Field Officer`.`Postal Code`";
                                $result = mysqli_query($con, $query);
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>" .
                                        "<td>" . $row["Farm ID"] . "</td>" .
                                        "<td>" . $row["First Name"] . " " . $row["Last Name"] . "</td>" .
                                        "<td>" . $row["Description"] . "</td>" .
                                        "<td>" . $row["Status"] . "</td>" .
                                        "</tr>";
                                    }
                                } else {
                                    echo "Error: " . mysqli_error($con);
                                }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
                    </div>
                </div>
                
        </div>
        </div>
        </main>

        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="js/form.js"></script>
    </body>
</html>
