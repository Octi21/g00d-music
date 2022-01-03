<?php
    include 'connection.php';
    $id  = $_GET['updateid'];
    $gr = $_GET['grad'];
    //echo $_GET['grad'];
    //echo $_GET['updateid'];
    $sql = "select * from melodii where ID = $id";
    $results = mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($results);
    $name = $row['Name'];
    $artist = $row['Nartist'];
    $album = $row['Nalbum'];
    

    

        $sql0 = "select * from albume where Name = 'Graduation' ";
        $result0 = mysqli_query($con,$sql0);
        $row=mysqli_fetch_assoc($result0);
        $ghe = $row['IDalbum'];
        echo $ghe;

    if(isset($_POST['btn-update']))
    {
        $name = $_POST['Name'];
        $artist = $_POST['Nartist'];
        $album  = $_POST['Nalbum'];

        $sql = "update melodii set Name = '$name', Nartist = '$artist', Nalbum = '$album', IDalbum = '$ghe' where ID = $id";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            // echo 'great succes';
            header("location:ulogin.php?grad=$gr");
        }
        else
        {
            echo 'error';
        }
        
    }
    else
    {
        //echo 'ghe2';
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
    <link rel="stylesheet" href="add.css">
</head>

<body>
    <div class="fundal">
        <div class="register">
                <img src="https://i.imgur.com/4TQAOw9.png" >
                <h2>Update song:</h2>
                <form  method="post">
                    <input type="text"  value = <?php echo $name; ?> class = "txt" name="Name">
                    <input type="text" value = <?php echo $artist; ?> class = "txt" name="Nartist">
                    <input type="text" value = <?php echo $album; ?> class = "txt" name="Nalbum">            
                    <input type="submit" value = "Update" class = "btn" name="btn-update">
                    <a href="ulogin.php?grad=<?php echo $_GET['grad'] ?>">Return</a>
                </form>
        </div>
    </div>  
</body>

</html>    