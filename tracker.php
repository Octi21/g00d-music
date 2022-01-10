<?php
    include 'connection.php';


    // $this_page = $_SERVER["PHP_SELF"];
    $ip = $_SERVER["REMOTE_ADDR"];
    //$date = time();

    $sql = "select * from tracker where IP = '$ip'";
    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result) != 0)
    {
        //echo "ghe";
        $sql = "update tracker set nr_intrari = nr_intrari + 1  where  IP = '$ip'";
        $result = mysqli_query($con,$sql);
    }
    else
    {
        $sql = "insert into tracker (IP,nr_intrari) values ('$ip',1)";
        $result = mysqli_query($con,$sql);
    }

    // $sql = "select IP,nr_intrari from tracker";
    // $result = mysqli_query($con,$sql);
    // while($row = mysqli_fetch_assoc($result))
    // {
    //     $ip = $row['IP'];
    //     $views = $row['nr_intrari'];

    //     echo "ip = $ip si numarul de intrari = $views "; 
    // }

?>