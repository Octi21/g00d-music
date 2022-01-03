<?php

    require_once('connection.php');
    session_start(); 
       $fail =  $_SESSION['fail'];
       //echo $fail;
    if($fail == 0)                       // attack csrf
    {

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
                    $rol = $row['Grad'];
                    $id = $row['ID'];

                    session_start();
                    $_SESSION['idUtil'] = $id;
                

                    //echo $rol;
                    if($foundPass == md5($Password))
                    {
                        // corect
                        // echo ' corect ai intrat';
                        // $_SESSION['username'] = $UserName;
                        header("location:ulogin.php? grad=$rol");

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
    }

?>