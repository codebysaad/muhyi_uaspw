<?php
    $hostname   = "localhost";
    //$username   = "anaq3791_admin";
    //$password   = "8k3TqBhiIcZA";
    //$database   = "anaq3791_muhyi";
    $username   = "root";
    $password   = "";
    $database   = "skripsi_library";

    $con = mysqli_connect($hostname, $username, $password, $database) or die (mysqli_error($con));
?>