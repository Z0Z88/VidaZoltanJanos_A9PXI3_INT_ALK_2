<?php
    include("session.php");
    include("database.php");
    $query="SELECT owner_id, name, brandname FROM Owners JOIN Cars ON Cars.car_id=Owners.car_id ORDER BY owner_id DESC";
    $result=mysqli_query($connect,$query);
?>
 
 <html>
    <head>
        <title>Vida Zoltán János A9PXI3 Int Alk II.</title>
        <style>
            table, th, td {
                border: 2px solid black;
                border-collapse: collapse;
            }
            th, td{
                background-color:#c4c4d4;
            }
        </style>
    </head>
    <body>
        <div style="text-align:right">
            <button type=button onclick="window.location.href='logout.php'">Kilépés</button>
        </div>
        <?php
            if(isset($_SESSION['user'])){

            } else{
                header("Location: index.php");
            }
        ?>
        
        
        <button type=button onclick="window.location.href='insert.php'">Hozzáad</button>      
        <br>
        <br>

        <table>
            <tr>
                <th>owner_id</th>
                <th>Név</th>
                <th>Autó típus</th>
                <th>Módosítás</th>
            </tr>
            <tr>
                <?php
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                    <td><?php echo $row['owner_id']?></td>
                    <td><?php echo $row['name']?></td>    
                    <td><?php echo $row['brandname']?></td>
                    <td><button type=button onclick="window.location.href='update.php?id=<?php echo $row['owner_id']?>'">Módosít</button></td>
            </tr>
                <?php
                    } 
                    
                ?>
            
        </table>
    </body>
</html>