<?php
    use PHPMailer\PHPMailer\PHPMailer;
    require_once('connection.php');

    if(isset($_POST['title']) && !empty($_POST['title']))                                           // bot detector
    {
        echo "esti bot nnunu";
    }
    else
    {
        if(isset($_POST['btn-save']))
        {
            // echo ' work ';
            $UserName = mysqli_real_escape_string($con , $_POST['UserName']);                         // pt sql injection
            $Email = mysqli_real_escape_string($con , $_POST['Email']);
            $Password = mysqli_real_escape_string($con , $_POST['Password']);
            $Cpassword = mysqli_real_escape_string($con , $_POST['Cpassword']);

            echo  htmlspecialchars($UserName), htmlspecialchars($Email), htmlspecialchars($Password), htmlspecialchars($Cpassword);   // pt attack xss

            if(empty($UserName) || empty($Email) || empty($Password) || empty($Cpassword) )
            {
                echo ' error2';
            }
            else
            {
                $sql0 = "select * from utilizatori where UName = '$UserName' or Email = '$Email'";  
                $result0 = mysqli_query($con,$sql0);
                if($row = mysqli_fetch_assoc($result0))
                {
                    echo "error nu poti folosi acest username sau acest email";
                }

                else
                {
                    //verific parola
                    if($Cpassword != $Password)
                    {
                        echo ' wrong pass';
                    }
                    else
                    {
                        // trimite mail
                        
                        
                        require_once "PHPMailer/PHPMailer.php";
                        require_once "PHPMailer/SMTP.php";
                        require_once "PHPMailer/Exception.php";

                        $mail = new PHPMailer();

                        //SMTP Settings
                        $mail -> isSMTP();
                        $mail -> Host = "smtp.gmail.com";
                        $mail -> SMTPAuth = true;
                        $mail -> Username = "godmusic212@gmail.com";
                        $mail -> Password = "Goodmusic2121";
                        $mail ->Port = 587;
                        $mail ->SMTP = "tls";

                        //email set
                        $mail -> isHTML(isHtml:true);
                        $mail -> setFrom($Email, "good-music");
                        $mail -> addAddress(address:"$Email");
                        $mail -> Subject = "Inregistrare pe good-music";
                        $mail -> Body = "Bun venit!";

                        if($mail ->send())
                        {
                            echo "===   Email trimis    ===";
                        }
                        else
                        {
                            echo "error";
                        }

                        // creare cont
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
        }
    }

?>