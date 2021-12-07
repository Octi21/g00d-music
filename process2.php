<?php

    require_once('connection.php');

    if(isset($_POST['btn-save']))
    {
        // echo ' work ';
        $UserName =  $_POST['UserName'];
        $Password =  $_POST['Password'];

        // echo  $UserName, $Email, $Password, $Cpassword;

        if(empty($UserName) ||  empty($Password)  )
        {
            echo ' error2';
        }
        else
        {
            $query = " select * from utilizatori where UName = '$UserName' or Email = '$UserName' ";
            $result = mysqli_query($con,$query);

            if($row = mysqli_fetch_assoc($result))
            {
                $foundPass = $row['Password'];

                if($foundPass == md5($Password))
                {
                    // corect
                    // echo ' corect ai intrat';
                    // $_SESSION['username'] = $UserName;
                    header('location:ulogin.php');

                }
                else
                {
                    echo 'incorect pass';
                }
            }
            else
            {
                echo '<script type="text/javascript"> alert("user doen t exist ") </script>';
            }

        }
    }

?>