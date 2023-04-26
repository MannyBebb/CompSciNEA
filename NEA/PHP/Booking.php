<?php
    session_start();

    $studentidinput = $_SESSION['studentidinput'];

    if (!$studentidinput) {
        header("Location: /HTML/Login.html");
    }

    if(isset($_POST['enterbutton']))
    {
        $dateinput = $_POST['dateinput'];
        $timeinput = $_POST['timeinput'];
        $teachername = $_POST['teachername'];
    }
    $host = "localhost";
    $username = "manny";
    $password = "8102004";
    $dbname = "cs_project";

    $con = mysqli_connect($host, $username, $password, $dbname, 3306);

    if (!$con)
    {
        die("Connection failed" . mysqli_connect_error());
    }

    $datetime = $dateinput . " " . $timeinput . ":00";
    $sql = "UPDATE Student_data SET Date = '$datetime' WHERE Student_ID = $studentidinput";
    mysqli_query($con, $sql);


    header("Location: /HTML/BookingSuccess.html");
?>