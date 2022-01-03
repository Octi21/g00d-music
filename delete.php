<?php
    include 'connection.php';
    $gr = $_GET['grad'];
    if(isset($_GET['deleteid']))
    {
        
        $id  = $_GET['deleteid'];
        $sql= "delete from melodii where id=$id";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            // echo 'yes';
            header("location:ulogin.php?grad=$gr");
        } 
    }
    else
    {
        echo 'ghe';
    }


?>