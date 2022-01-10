<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Good Music</title>
    <link rel="shortcut icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/en/3/30/G.O.O.D._Music_logo.png"/>
    <link rel="stylesheet" href="register.css">
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

        <a href="index.php"><img src="https://pbs.twimg.com/profile_images/963574378796593153/cjaTilaP_400x400.jpg" alt="site-logo"></a>>

    </div>
    <div class="fundal">
        <div class="register">
                <img src="https://i.imgur.com/4TQAOw9.png" >
                <form action="process.php" method="post">
                    <input type="text" name="title" class="hidden">                                     <!-- bot detector -->
                    <input type="text" placeholder = "Username" class = "txt" name="UserName">
                    <input type="email" placeholder = "Email" class = "txt" name="Email">
                    <input type="password" placeholder = "Password" class = "txt" name="Password">
                    <input type="password" placeholder = "ConfirmPassword" class = "txt" name="Cpassword">                   
                    <input type="submit" value = "Create Account" class = "btn" name="btn-save">
                    <a href="login.php">Already have an Acc</a>
                </form>
        </div>
    </div>  
</body>

</html>    
