<?php
    $server = "sql101.epizy.com";
    $username = "epiz_30361150";
    $password = "W3bg63MpxX";
    $dbname = "epiz_30361150_database";

    $conn = mysqli_connect($server, $username, $password, $dbname);

    if(!$conn){
        die("Connection Failed:".mysqli_connect_error());
    }

?>