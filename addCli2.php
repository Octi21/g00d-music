<?php
    echo "am intrat";

    //echo $_GET['idmel'];
    $idmel = $_GET['idmel'];
    echo $idmel;
    session_start();
    $idpl =  $_SESSION['idpl'];
    echo $idpl;

    include 'connection.php';


    $sql = "insert into adds (IDplaylist,IDmelodie) values ($idpl,$idmel)";
    $result = mysqli_query($con,$sql);
        if($result)
        {
            //echo 'great succes';
            header("location:ulogin.php?grad=client");
        }
?>