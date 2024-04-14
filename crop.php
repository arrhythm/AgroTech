<?php
    include 'include/navigation_bar.php';
    $userID = '';
    $user_id = $_SESSION['USER_ID'];
    $user_name = $_SESSION['USER_NAME'];
    if(isset($_POST['addCrop'])){
        $farmID = "";
        $query = "SELECT `Farm ID` FROM `Farm` Where Farm.`Farmer ID` = '$user_id'";
        $result = mysqli_query($con, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $farmID = $row['Farm ID'];
            $cropName = mysqli_real_escape_string($con, $_POST['cropName']);
            $plantingDate = date('Y-m-d', strtotime($_POST['plantingDate']));
            $harvestingDate = date('Y-m-d', strtotime($_POST['harvestingDate']));
            $fertilizer = mysqli_real_escape_string($con, $_POST['fertilizer']);
            $cropWeight = mysqli_real_escape_string($con, $_POST['cropWeight']);
            $harvestedArea = mysqli_real_escape_string($con, $_POST['harvestedArea']);
            $damegedCropWeight = mysqli_real_escape_string($con, $_POST['damegedCropWeight']);
            mysqli_query($con, "INSERT INTO `Crop`(`Farm ID`, `Crop Name`, `Planting Date`, `Harvesting Date`, `Fertilizer`, `Crop Weight`, `Harvested Area`, `Damaged Crop Weight`)
            VALUES('$farmID', '$cropName', '$plantingDate', '$harvestingDate', '$fertilizer', '$cropWeight', '$harvestedArea', '$damegedCropWeight')");
            header('Location:crop.php');
        } else {
            echo "Error: " . mysqli_error($con);
        } 
    }
    if(isset($_POST['edit'])){
        $query = "SELECT `Farm ID` FROM `Farm` Where Farm.`Farmer ID` = '$user_id'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $farmID = $row['Farm ID'];
        $ecropName = mysqli_real_escape_string($con, $_POST['ecropName']);
        $eplantingDate = date('Y-m-d', strtotime($_POST['eplantingDate']));
        $eharvestingDate = date('Y-m-d', strtotime($_POST['eharvestingDate']));
        $efertilizer = mysqli_real_escape_string($con, $_POST['efertilizer']);
        $ecropWeight = mysqli_real_escape_string($con, $_POST['ecropWeight']);
        $eharvestedArea = mysqli_real_escape_string($con, $_POST['eharvestedArea']);
        $edamegedCropWeight = mysqli_real_escape_string($con, $_POST['edamegedCropWeight']);
        $query = "UPDATE `Crop`
        SET
        `Planting Date` = '$eplantingDate',
        `Harvesting Date` = '$eharvestingDate',
        `Fertilizer` = '$efertilizer',
        `Crop Weight` = '$ecropWeight',
        `Harvested Area` = '$ecropWeight',
        `Damaged Crop Weight` = '$edamegedCropWeight'
        WHERE `Farm ID` = '$farmID' AND `Crop Name` = '$ecropName'";
        $result = mysqli_query($con, $query);
        if ($result) {
            header('Location:crop.php');
        } else {
            echo "Error: " . mysqli_error($con);
        } 
    }
    if(isset($_POST['delete'])){
        $delCropName = mysqli_real_escape_string($con, $_POST['delCropName']);
        $query = "DELETE FROM `Crop`
        WHERE `Farm ID` IN ( SELECT `Farm ID` FROM `Farm`
            WHERE `Farmer ID` = (SELECT `Farmer ID` FROM `Farmer` WHERE `Farmer ID` = '$user_id')
        ) AND `Crop Name` = '$delCropName'";
        $result = mysqli_query($con, $query);
        if ($result) {
            header('Location:crop.php');
        } else {
            echo "Error: " . mysqli_error($con);
        } 
    }
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
        <!-- Breadcrumb-->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">My Farm</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Crop Health Overview</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                On this page, you can view all available information regarding your crops.
                            </div>
                        </div>

                        <div class="row  row-cols-1 row-cols-md-2 g-3">
                            <div class="col-lg-6">
                                <div class="card text-bg-primary mb-4">
                                    <div class="card-body">
                                        <h5 class="p-2">Select any Crop to view details</h5>
                                        <hr>
                                        <select name = "selectCrop" id = "selectCrop" class="custom-select container-fluid">
                                            <option value="" disabled selected>Select Crop</option>
                                                            <?php
                                                                $query = "SELECT `Crop`.`Crop Name` FROM `Farmer`
                                                                JOIN `Farm` ON `Farmer`.`Farmer ID` = `Farm`.`Farmer ID`
                                                                JOIN `Crop` ON `Crop`.`Farm ID` = `Farm`.`Farm ID`";
                                                                $result = mysqli_query($con, $query);
                                                                if ($result) {
                                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                                        $cropName = $row['Crop Name'];
                                                                        echo "<option value=\"$cropName\">$cropName</option>";
                                                                    }
                                                                } else {
                                                                    echo "Error: " . mysqli_error($con);
                                                                }
                                                            ?>
                                        </select>
                                        
                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#add_crop" id="add_crop_modal">Add a new crop</button>
                                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#d_crop" id="delete_crop_modal">Delete a crop</button>
                                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#edit_crop" id="edit_crop_modal">Edit crop Details</button>
                                    </div>
                                </div>

                                <!--Modal for Editing Crop Details-->
                                <div class="modal fade" id="edit_crop" tabindex="-1" aria-labelledby="edit_crop_label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="edit_crop_label">Edit Crop Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" class="signup-form">
                                                <div class="mb-3">
                                                    <label for="crop-name" class="col-form-label">Crop Name:</label>
                                                    <select name = "ecropName" class="form-select-small" id="crop_name_edit" aria-label="crop-name">
                                                        <option value="" disabled selected>Select Crop</option>
                                                            <?php
                                                                $query = "SELECT `Crop`.`Crop Name` FROM `Farmer`
                                                                JOIN `Farm` ON `Farmer`.`Farmer ID` = `Farm`.`Farmer ID`
                                                                JOIN `Crop` ON `Crop`.`Farm ID` = `Farm`.`Farm ID`";
                                                                $result = mysqli_query($con, $query);
                                                                if ($result) {
                                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                                        $cropName = $row['Crop Name'];
                                                                        echo "<option value=\"$cropName\">$cropName</option>";
                                                                    }
                                                                } else {
                                                                    echo "Error: " . mysqli_error($con);
                                                                }
                                                            ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="planting-date-input" class="col-form-label">Planting Date:</label>
                                                    <input name = "eplantingDate"type="text" class="form-control" value="" id="planting-date-input">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="harvesting-date-input" class="col-form-label">Harvesting Date:</label>
                                                    <input name = "eharvestingDate"type="text" class="form-control" value="" id="harvesting-date-input">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="fertilizer-input" class="col-form-label">Fertilizer:</label>
                                                    <input name = "efertilizer" type="text" class="form-control" value="" id="fertilizer-input">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="crop-weight-input" class="col-form-label">Crop Weight</label>
                                                    <input name = "ecropWeight" type="text" class="form-control" value="" id="crop-weight-input">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="harvested-area-input" class="col-form-label">Harvested Area</label>
                                                    <input name = "eharvestedArea" type="text" class="form-control" value="" id="harvested-area-input">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="damaged-crop-area-input" class="col-form-label">Damaged Crop Area</label>
                                                    <input name = "edamegedCropWeight" type="text" class="form-control" value="" id="damaged-crop-area-input">
                                                </div>                                       
                                          </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name = "edit" class="btn btn-primary">Edit</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                                
                                <!--Modal for Deleting Crop Details-->
                                <div class="modal fade" id="d_crop" tabindex="-1" aria-labelledby="d_crop_label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="d_crop_label">Delete Crop</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" class="signup-form">
                                                    <div class="mb-3">
                                                        <label for="crop-name" class="col-form-label">Crop Name:</label>
                                                        <select name = "delCropName" class="form-select-small" id="crop_name_d" aria-label="crop-name">
                                                            <option value="" disabled selected>Select Crop</option>
                                                            <?php
                                                                $query = "SELECT `Crop`.`Crop Name` FROM `Farmer`
                                                                JOIN `Farm` ON `Farmer`.`Farmer ID` = `Farm`.`Farmer ID`
                                                                JOIN `Crop` ON `Crop`.`Farm ID` = `Farm`.`Farm ID`";
                                                                $result = mysqli_query($con, $query);
                                                                if ($result) {
                                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                                        $cropName = $row['Crop Name'];
                                                                        echo "<option value=\"$cropName\">$cropName</option>";
                                                                    }
                                                                } else {
                                                                    echo "Error: " . mysqli_error($con);
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>                                      
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name = "delete" class="btn btn-primary">Delete</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                
                                <!--Modal for Adding a new Crop-->
                                <div class="modal fade" id="add_crop" tabindex="-1" aria-labelledby="add_crop_label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="add_crop_label">Add a new crop</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" class="signup-form">
                                                    <div class="mb-3">
                                                        <label for="a-crop-name" class="col-form-label">Crop Name:</label>
                                                        <input type="text" name = "cropName"class="form-control" value="" id="a-crop-name">

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="planting-date-a" class="col-form-label">Planting Date:</label>
                                                        <input type="date" name = "plantingDate" class="form-control" value="" id="planting-date-a">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="harvesting-date-a" class="col-form-label">Harvesting Date:</label>
                                                        <input type="date" name = "harvestingDate" class="form-control" value="" id="harvesting-date-a">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="fertilizer-a" class="col-form-label">Fertilizer:</label>
                                                        <input type="text" name = "fertilizer" class="form-control" value="" id="fertilizer-a">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="crop-weight-a" class="col-form-label">Crop Weight</label>
                                                        <input type="text" name = "cropWeight" class="form-control" value="" id="crop-weight-a">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="harvested-area-a" class="col-form-label">Harvested Area</label>
                                                        <input type="text" name = "harvestedArea" class="form-control" value="" id="harvested-area-a">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="damaged-crop-area-a" class="col-form-label">Damaged Crop Area</label>
                                                        <input type="text" name = "damegedCropWeight" class="form-control" value="" id="damaged-crop-area-a">
                                                    </div>    
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name = "addCrop" class="btn btn-primary">Add</button>
                                            </div>
                                            </form>                                   
                                        </div>
                                    </div>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Total Crops by Area
                                    </div>
                                    <div class="card-body"><canvas id="cropPieChart" width="300" height="300"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header" id="crop-header">
                                <i class="fa-brands fa-pagelines"></i> Crop
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Planting Date</th>
                                            <th scope="col">Harvesting Date</th>
                                            <th scope="col">Fertilizer</th>
                                            <th scope="col">Crop Weight</th>
                                            <th scope="col">Harvested Area</th>
                                            <th scope="col">Damaged Crop Weight</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>    
                </main>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="assets/demo/chart-pie-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
<script src="js/form.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    var cropSelect = document.querySelector('.custom-select');
    var cardHeader = document.querySelector('.card-header');
    cropSelect.addEventListener('change', function() {
        var selectedCrop = cropSelect.value;
        var cardHeader = document.getElementById('crop-header');
        cardHeader.innerHTML = '<i class="fa-brands fa-pagelines"></i> ' + selectedCrop;
        var cropDatasets = {};
        <?php
            $query = "SELECT `Farm ID` FROM `Farm` Where Farm.`Farmer ID` = '$user_id'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);
            $farmID = $row['Farm ID'];
            $query = "SELECT * FROM `Crop` WHERE `Farm ID` = '$farmID'";
            $result = mysqli_query($con, $query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $cropName = $row['Crop Name'];
                    $dataset = array(
                        'plantingDate' => $row['Planting Date'],
                        'harvestingDate' => $row['Harvesting Date'],
                        'fertilizer' => $row['Fertilizer'],
                        'cropWeight' => $row['Crop Weight'],
                        'harvestedArea' => $row['Harvested Area'],
                        'damagedCropWeight' => $row['Damaged Crop Weight']
                    );
                    echo "cropDatasets['$cropName'] = " . json_encode($dataset) . ";\n";
                }
            } else {
                echo "// Error: " . mysqli_error($con) . "\n";
            }
        ?>
        populateTable(cropDatasets[selectedCrop]);
    });
    function populateTable(cropData) {
        var tableBody = document.querySelector('.table tbody');
        tableBody.innerHTML = '';
        var newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${cropData.plantingDate}</td>
            <td>${cropData.harvestingDate}</td>
            <td>${cropData.fertilizer}</td>
            <td>${cropData.cropWeight}</td>
            <td>${cropData.harvestedArea}</td>
            <td>${cropData.damagedCropWeight}</td>
        `;
        tableBody.appendChild(newRow);
    }
});
</script>

<script>
    <?php
        $cropNames = [];
        $areas = [];
        $query = "SELECT * FROM `Farmer`
        JOIN `Farm` ON `Farmer`.`Farmer ID` = `Farm`.`Farmer ID`
        JOIN `Crop` ON `Crop`.`Farm ID` = `Farm`.`Farm ID`";
        $result = mysqli_query($con, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $cropNames[] = $row["Crop Name"];
                $areas[] = $row["Harvested Area"];
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
    ?>
    var ctx = document.getElementById('cropPieChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($cropNames); ?>,
            datasets: [{
                label: 'Crop Area',
                data: <?php echo json_encode($areas); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
    </script>
    </body>
</html>
