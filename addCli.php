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

    <table>
        <tr>
            <th>Song</th>
            <th>Artist</th>
            <th>Album</th>
            <th>Operation</th>
        </tr>

    <?php
        //echo "am intrat";
        include 'connection.php';

        session_start();
        $idc =  $_SESSION['idUtil'];
        //echo "id client  = $idc";

        $sql = "select * from melodii";
        $results = mysqli_query($con,$sql);

        while($row=mysqli_fetch_assoc($results))
        {
            $id = $row['ID'];
            echo $id;
            $name = $row['Name'];
            $artist = $row['Nartist'];
            $album = $row['Nalbum'];
            echo '<tr>
                    <td>'.htmlspecialchars($name). '</td>
                    <td>'.htmlspecialchars($artist).'</td>
                    <td>'.htmlspecialchars($album).'</td>
                    <td>
                    <button class="btn2">
                        <a href="addCli2.php?idmel= '.$id.'" >Adauga </a>
                    </button>
                    </td>
                </tr>';                                                     /// pt attack xss
        
        }
    ?>

</table>

</body>

</html>  