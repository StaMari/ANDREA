<?php
    $con = mysqli_connect ("localhost","root","","crud_operations");

    if ($con)
    {
       // echo "Conneted";
    } else {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>