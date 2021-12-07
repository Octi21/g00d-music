<?php

    $host = "localhost";
    $username = "root";
    $password = "lab233";
    $databasename = "good_music";

    $con  = mysqli_connect($host , $username , $password , $databasename);

    if(!$con)
    {
        echo 'error1';
    }

?>