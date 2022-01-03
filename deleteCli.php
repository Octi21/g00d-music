<?php
    echo "am intrat";
    include 'connection.php';
    $deleteid = $_GET['deleteid'];
    echo $deleteid;
    if(isset($_GET['deleteid']))
    {
        echo "tre sa sterg";
        $sql= "delete from adds where IDadd=$deleteid";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            echo 'yes';
            header("location:ulogin.php?grad=client");
        }
        else 
        {
            echo "nup";
        } 
    }
    else 
    {
        echo "nah";
    }

?>