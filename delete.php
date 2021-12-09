<?php
    include 'connection.php';
    if(isset($_GET['deleteid']))
    {
        
        $id  = $_GET['deleteid'];
        $sql= "delete from melodii where id=$id";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            // echo 'yes';
            header('location:ulogin.php');
        } 
    }
    else
    {
        echo 'ghe';
    }


?>