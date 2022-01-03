<?php
    include 'connection.php';
    $gr = $_GET['grad'];
    echo $gr;

    if(isset($_POST['btn-add']))
    {
        
        $name = $_POST['Name'];
        $artist = $_POST['Nartist'];
        $album  = $_POST['Nalbum'];

        $sql = "insert into melodii (Name,Nartist,Nalbum) values ('$name','$artist','$album')";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            // echo 'great succes';
            header("location:ulogin.php?grad=admin");
        }
        else
        {
            echo 'error';
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
    <link rel="stylesheet" href="add.css">
</head>

<body>
    <div class="fundal">
        <div class="register">
                <img src="https://i.imgur.com/4TQAOw9.png" >
                <h2>Add song:</h2>
                <form action="add.php" method="post">
                    <input type="text" placeholder = "Name" class = "txt" name="Name">
                    <input type="text" placeholder = "Artist" class = "txt" name="Nartist">
                    <input type="text" placeholder = "Album" class = "txt" name="Nalbum">            
                    <input type="submit" value = "ADD" class = "btn" name="btn-add">
                    <a href="ulogin.php?grad=<?php echo $_GET['grad'] ?>">Return</a>
                </form>
        </div>
    </div>  
</body>

</html>    
