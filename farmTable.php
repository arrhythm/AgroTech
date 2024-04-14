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

        <div class="card mb-4">
            <div class="card-header" id="crop-header">
            <div class="sb-nav-link-icon"><img src="images/fm.png" alt="" style="max-width: 100%; max-height: 100%;"></div>
            Farm
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Farm ID</th>
                            <th scope="col">Farm Address</th>
                            <th scope="col">Farmer ID</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                                $query = "SELECT * FROM `Farm`
                                INNER JOIN `Field Officer`
                                ON `Field Officer`.`Postal Code` = Farm.`Postal Code`
                                WHERE `Field Officer ID` = '$user_id'";
                                $result = mysqli_query($con, $query);
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row["Farm ID"] . "</td>";
                                        echo "<td>" . $row["Farm Address"] . "</td>";
                                        echo "<td>" . $row["Farmer ID"] . "</td>";
                                        echo "</tr>";
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
        </main>
        </div>
</body>
</html>