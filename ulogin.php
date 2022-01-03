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

    
    <?php 
         if($_GET['grad'] == 'admin') 
        {

    ?>  
    
        <div class="crud">
            <button class="btn">  
                <a href="add.php?grad=<?php echo $_GET['grad'] ?>">Add song</a> 
            </button>
            
            <table>
                <tr>
                    <th>Song</th>
                    <th>Artist</th>
                    <th>Album</th>
                    <th>Operation</th>
                </tr>
                
                <?php
                    $sql = "select * from melodii";
                    $results = mysqli_query($con,$sql);
                    // if(isset($_GET['grad']))
                    //     echo $_GET['grad'];
                    // else
                    //     echo 1;
                    $gr = $_GET['grad'];
                     if($_GET['grad'] == "admin")
                    {    
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
                                        <a href="update.php? updateid='.$id.'&grad='.$gr.'" >Update </a>
                                    </button>
                                    <button class="btn2">
                                        <a href="delete.php? deleteid='.$id.'&grad='.$gr.'" >Delete </a>
                                    </button>
                                    </td>
                                </tr>';
                        
                        }
                    }

                ?>

            </table>

        </div>
    <?php } ?>

    <?php 
         if($_GET['grad'] == 'client') 
        {
            //session_start();
            $id =  $_SESSION['idUtil'];                                    // id utilizator
            //echo $id;

            $sql = "select * from playlists where IDutilizator = $id";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)==0)
            {
                $sql1 = "insert into playlists (IDutilizator,Nume) values ('$id','cumetrie')";
                $result1 = mysqli_query($con,$sql1);
                
            }
            
            
        }

    ?>  

    <?php 
         if($_GET['grad'] == 'client') 
        {

    ?>  
    
        <div class="crud">
            <button class="btn">  
                <a href="addCli.php?grad=<?php echo $_GET['grad'] ?>">Add song</a> 
            </button>
            
            <table>
                <tr>
                    <th>Song</th>
                    <th>Artist</th>
                    <th>Album</th>
                    <th>Operation</th>
                </tr>
                
                <?php
                    $id =  $_SESSION['idUtil'];
                    $sql = "select m.Name , m.Nartist, m.Nalbum, a.IDadd , p.IDplaylist
                            from melodii m, adds a, playlists p 
                            where m.ID = a.IDmelodie and p.IDplaylist = a.IDplaylist and p.IDutilizator = $id";

                    // $sql = "select p.IDutilizator , m.Name , m.Nalbum
                    //         from playlists p, adds a, melodii m 
                    //         where p.IDplaylist = a.IDplaylist and m.ID = a.IDmelodie and  a.IDadd = 1 ";

                    $results = mysqli_query($con,$sql);
                    if(!$results)
                    {
                        echo 'ghe';
                    }
                    if(mysqli_num_rows($results)==0)
                    {
                        echo "ghe2";
                        $sql2 = "select p.IDplaylist
                                from utilizatori u, playlists p
                                where p.IDutilizator = u.ID and u.ID = $id";
                        $result2 = mysqli_query($con,$sql2);
                        if($row=mysqli_fetch_assoc($result2))
                        {
                        
                            $idpl = $row['IDplaylist'];  
                            $_SESSION['idpl'] = $idpl;
                            echo "id ul playlistului pe care il cauti este $idpl";
                        }

                    }
                    else
                    {
                        //echo "ghe3";
                        // $row=mysqli_fetch_assoc($results);
                        // echo $row['Nartist']; 
                        // echo $row['Name']; 
                        // echo $row['Nalbum']; 
                        // echo $row['IDadd']; 

                    }
                
                    $gr = $_GET['grad'];
                    if($_GET['grad'] == "client")
                    {    
                        while($row=mysqli_fetch_assoc($results))
                        {
                            $id = $row['IDadd'];                  // !!!! id adugare
                            // echo $id;
                            $idpl = $row['IDplaylist'];                 //// id playlist pt adugare mel in playlist;
                            $_SESSION['idpl'] = $idpl;
                            

                            $name = $row['Name'];
                            $artist = $row['Nartist'];
                            $album = $row['Nalbum'];
                            echo '<tr>
                                    <td>'.$name. '</td>
                                    <td>'.$artist.'</td>
                                    <td>'.$album.'</td>
                                    <td>
                                    <button class="btn2">
                                        <a href="deleteCli.php? deleteid='.$id.'" >Delete </a>
                                    </button>
                                    </td>
                                </tr>';
                        
                        }
                    }

                ?>

            </table>

        </div>
    <?php } ?>



</body>

</html>    
