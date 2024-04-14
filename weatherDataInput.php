<?php
    include 'include/top.php';
    $userID = '';
    $user_id = $_SESSION['USER_ID'];
    $user_name = $_SESSION['USER_NAME'];

    if(isset($_POST['submit'])){
        $query = "SELECT `Farm`.`Postal Code`
        FROM farm
        INNER JOIN Farmer ON Farm.`Farmer ID` = Farmer.`Farmer ID`
        WHERE Farmer.`Farmer ID` = '$user_id'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $postalCode = $row['Postal Code'];
        $weather_data_date = date('Y-m-d', strtotime($_POST['weather_data_date']));
        $temperature = mysqli_real_escape_string($con, $_POST['temperature']);
        $wind_speed = mysqli_real_escape_string($con, $_POST['wind_speed']);
        $atmospheric_pressure = mysqli_real_escape_string($con, $_POST['atmospheric_pressure']);
        $humidity = mysqli_real_escape_string($con, $_POST['humidity']);
        $predicted_temperature = mysqli_real_escape_string($con, $_POST['predicted_temperature']);
        $predicted_wind_speed = mysqli_real_escape_string($con, $_POST['predicted_wind_speed']);
        $predicted_atmospheric_pressure = mysqli_real_escape_string($con, $_POST['predicted_atmospheric_pressure']);
        $predicted_humidity = mysqli_real_escape_string($con, $_POST['predicted_humidity']);

        mysqli_query($con, "INSERT INTO `Weather Data`(`Weather Data Date`, `Temperature`, `Wind Speed`, `Atmospheric Pressure`, `Humidity`, `Predicted Temperature`, `Predicted Wind Speed`, `Predicted Atmospheric Pressure`, `Predicted Humidity`, `Postal Code`)
            VALUES('$weather_data_date', '$temperature', '$wind_speed', '$atmospheric_pressure', '$humidity', '$predicted_temperature', '$predicted_wind_speed', '$predicted_atmospheric_pressure', '$predicted_humidity', '$postalCode')");
        header('Location:farmerDashboard.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Data Form</title>
    <link rel="stylesheet" href="css/stylesTS.css">
</head>
<body>
    <div class="container">
        <h2>Weather Data Form</h2>
        <form method = "post" class="signin-form">
            <div class="form-group">
                <label for="weather_data_date">Date:</label>
                <input type="date" id="weather_data_date" name="weather_data_date" required>
            </div>
            <div class="form-group">
                <label for="temperature">Temperature:</label>
                <input type="text" id="temperature" name="temperature" required>
            </div>
            <div class="form-group">
                <label for="wind_speed">Wind Speed:</label>
                <input type="text" id="wind_speed" name="wind_speed" required>
            </div>
            <div class="form-group">
                <label for="atmospheric_pressure">Atmospheric Pressure:</label>
                <input type="text" id="atmospheric_pressure" name="atmospheric_pressure" required>
            </div>
            <div class="form-group">
                <label for="humidity">Humidity:</label>
                <input type="text" id="humidity" name="humidity" required>
            </div>
            <div class="form-group">
                <label for="predicted_temperature">Predicted Temperature:</label>
                <input type="text" id="predicted_temperature" name="predicted_temperature" required>
            </div>
            <div class="form-group">
                <label for="predicted_wind_speed">Predicted Wind Speed:</label>
                <input type="text" id="predicted_wind_speed" name="predicted_wind_speed" required>
            </div>
            <div class="form-group">
                <label for="predicted_atmospheric_pressure">Predicted Atmospheric Pressure:</label>
                <input type="text" id="predicted_atmospheric_pressure" name="predicted_atmospheric_pressure" required>
            </div>
            <div class="form-group">
                <label for="predicted_humidity">Predicted Humidity:</label>
                <input type="text" id="predicted_humidity" name="predicted_humidity" required>
            </div>
            <button type = "submit" name = "submit" class="btn-submit">Submit</button>
        </form>
    </div>
</body>
</html>
