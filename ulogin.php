<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Good Music</title>
    <link rel="shortcut icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/en/3/30/G.O.O.D._Music_logo.png"/>
    <link rel="stylesheet" href="about.css">
</head>

<body>
    <div class="cont1">
        <nav>
            <ul class="show-desktop hide-mobile" id="nav">
                
                <li><a href="about.html">ABOUT</a></li>
                <li ><a href="#">ARTISTS</a></li>
                <li>
                    <!-- <a href="login.php">LOG OUT</a> -->
                    <form action="ulogin.php" method="post">
                        <input type="submit" name = "logout" value="Log Out" class= "logoutbtn">
                    </form>
                </li>
                <li><a href="#">MUSIC</a></li>
 
                <?php
                    if(isset($_POST['logout']))
                    {
                        session_destroy();
                        header('location:login.php');
                    }
                ?> 
             
            </ul>

            <!-- <form action="ulogin.php" method="post">
                        <input type="submit" name = "logout" value="Log Out" class= "logoutbtn">
            </form> -->

            <?php
                    // if(isset($_POST['logout']))
                    // {
                    //     session_destroy();
                    //     header('location:login.php');
                    // }
                ?> 
        </nav>

        <a href="index.html"><img src="https://pbs.twimg.com/profile_images/963574378796593153/cjaTilaP_400x400.jpg" alt="site-logo"></a>>

    </div>
    <div class="about">
            <h2>Despre proiect </h2>
            <p>Situ-ul ofera informatii despre membrii casei de discuri si despre discografia acestora</p>
            <p>Utilizatorii vor avea posibilitatea de a accesa albumele/melodiile artistilor si de a le cumpara vinilurile</p>
            <p>Tipuri de utilizatori care pot acceesa site-ul</p>

            <h2>Info utilizatori</h2>
            <dl>
                <dt>Guest</dt>
                <dd>posibilitatea de a-si creea cont / de a se loga cu contrul existent</dd>
                <dd>posibilitatea de a vizualiza artistii si discografia acestora</dd>
                <dt>Utilizator cu cont</dt>
                <dd>posibilitatea de a realiza comnezi</dd>
                <dd>posibilitatea de a da un review unui album / melodie</dd>
                <dd>posibilitatea de a creea playlisturi pe care le poate folosi deoar el</dd>
                <dt>Administrator</dt>
                <dd>Nu stiu daca voi implementa administrator</dd>
                <dd>posibilitatea de a creea playlist-uri pe care sa le vada utilizatorii</dd>
                <dd>posibilitatea de a adauga muzica/albume pe pagina</dd>
            </dl>

            <h2>Diagrama ghe</h2>
            <img src="https://i.imgur.com/CE9Nbg0.png" alt="diagrama" class="diagrama">

    </div>
</body>

</html>    
