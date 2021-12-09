<?php
    include 'connection.php';
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
    <link rel="stylesheet" href="ulogin.css">
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
                        <input type="submit" name = "logout" value="Log Out" id= "logoutbtn">
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

           
        </nav>

        <a href="index.html"><img src="https://pbs.twimg.com/profile_images/963574378796593153/cjaTilaP_400x400.jpg" alt="site-logo"></a>>

    </div>

    <div class="crud">
        <button class="btn">  
            <a href="add.php">Add song</a> 
        </button>
        
        <table>
            <tr>
                <th>Song</th>
                <th>Artist</th>
                <th>Album</th>
                <th>Operation</th>
            </tr>
            <!-- <tr>
                <td>Peter</td>
                <td>Griffin</td>
                <td>$100</td>
            </tr> -->
            <?php
                $sql = "select * from melodii";
                $results = mysqli_query($con,$sql);
                while($row=mysqli_fetch_assoc($results))
                {
                    $id = $row['ID'];
                    $name = $row['Name'];
                    $artist = $row['Nartist'];
                    $album = $row['Nalbum'];
                    echo '<tr>
                            <td>'.$name. '</td>
                            <td>'.$artist.'</td>
                            <td>'.$album.'</td>
                            <td>
                            <button class="btn2">
                                <a href="update.php? updateid='.$id.'" >Update </a>
                            </button>
                            <button class="btn2">
                                <a href="delete.php? deleteid='.$id.'" >Delete </a>
                            </button>
                            </td>
                        </tr>';
                }

            ?>

        </table>

    </div>

</body>

</html>    
