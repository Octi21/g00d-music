<?php

    require_once('connection.php');

    if(isset($_POST['btn-save']))
    {
        // echo ' work ';
        $UserName = mysqli_real_escape_string($con , $_POST['UserName']);
        $Email = mysqli_real_escape_string($con , $_POST['Email']);
        $Password = mysqli_real_escape_string($con , $_POST['Password']);
        $Cpassword = mysqli_real_escape_string($con , $_POST['Cpassword']);

         echo  $UserName, $Email, $Password, $Cpassword;

        if(empty($UserName) || empty($Email) || empty($Password) || empty($Cpassword) )
        {
            echo ' error2';
        }
        else
        {
        
            if($Cpassword != $Password)
            {
                echo ' wrong pass';
            }
            else
            {
                $pass = md5($Password);
                $sql = "insert into utilizatori (Uname,Email,Password,Grad) values ('$UserName','$Email','$pass','client')";

                $result = mysqli_query($con,$sql);

                if($result)
                {
                    
                    header('location:login.php');
                    // echo '<script type="text/javascript"> alert("User registered ... Go to login ") </script>';
                }
                else
                {
                    echo 'error3';
                }
            }
        }
    }

?>