<?php
session_start();

    if(isset($_POST['loginstart']))
    {
        $studentidinput = $_POST['studentidinput'];
    }

    echo $studentidinput;

    $host = "localhost";
    $username = "manny";
    $password = "8102004";
    $dbname = "cs_project";

    $con = mysqli_connect($host, $username, $password, $dbname, 3306);

    if (!$con)
    {
        echo "Connection Failed";
    }

    $sql = "SELECT Student_ID FROM Student_data WHERE Student_ID = $studentidinput";
    $dataadd = mysqli_query($con, $sql);

    if (mysqli_num_rows($dataadd) == 1) {
        $_SESSION['studentidinput'] = $studentidinput;
        header("Location: /HTML/Booking.html");
    } else {
        header("Location: /HTML/LoginFail.html");
    }

?>