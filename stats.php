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
            <th>User IP</th>
            <th>Views</th>
        </tr>

    <?php
        //echo "am intrat";
        include 'connection.php';


        $sql = "select IP,nr_intrari from tracker";
        $result = mysqli_query($con,$sql);

        while($row=mysqli_fetch_assoc($result))
        {
            $id = $row['IP'];
            $views = $row['nr_intrari'];
            echo '<tr>
                    <td>'.htmlspecialchars($id). '</td>
                    <td>'.htmlspecialchars($views).'</td>            
                </tr>';                                                     /// pt attack xss
        
        }
    ?>

</table>

    <button class="btn2">
         <a href="ulogin.php?grad=admin" >Return to page </a>
    </button>

</body>

</html>  