<?php
    session_start();

    if(empty($_SESSION['key']))
    {
        $_SESSION['key'] = bin2hex(random_bytes(32));
    }
    $csrf = hash_hmac('sha256','this = login.php', $_SESSION['key']);
    $_SESSION['fail'] =0;
    if(isset($_POST['btn-save']))
    {
        if(!hash_equals($csrf, $_POST['csrf']))                                // csrf attack
        {
            $_SESSION['fail'] = 1;
            echo "CSRF Token Failed";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Good Music</title>
    <link rel="shortcut icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/en/3/30/G.O.O.D._Music_logo.png"/>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="cont1">
        <nav>
            <ul class="show-desktop hide-mobile" id="nav">
                
                <li><a href="about.html">ABOUT</a></li>
                <li ><a href="#">ARTISTS</a></li>
                <li><a href="register.php">CREATE ACCOUNT</a></li>
                <li><a href="#">MUSIC</a></li>
            
            </ul>
        </nav>

        <a href="index.html"><img src="https://pbs.twimg.com/profile_images/963574378796593153/cjaTilaP_400x400.jpg" alt="site-logo"></a>>

    </div>
    <div class="fundal">
        <div class="register">
                <img src="https://i.imgur.com/4TQAOw9.png" >
                <form action="process2.php" method="post">
                    <input type="hidden" name="csrf" value="<?php echo $csrf  ?>">
                    <input type="text" placeholder = "Username or Email" class = "txt" name="UserName">
                    <input type="password" placeholder = "Password" class = "txt" name="Password">            
                    <input type="submit" value = "Login" class = "btn" name="btn-save">
                    <a href="register.php">Don t have acc</a>
                </form>
        </div>
    </div>  
</body>

</html>    
