<?php
    include("session.php");
    include("database.php");
    

    if(isset($_POST['submit'])){
        $owner_id = NULL;
        $name = $_POST['name'];
        $car_id = $_POST['car_id'];
        $query="INSERT INTO Owners VALUES ('$owner_id','$name','$car_id')";
        $result=mysqli_query($connect,$query);
        header("Location: main.php");    
    }

    $carBrandQuery="SELECT * FROM Cars;";
    $carBrandResult=mysqli_query($connect,$carBrandQuery);
    $carBrands = mysqli_fetch_all($carBrandResult, MYSQLI_ASSOC);
 ?>
 <html>
    <head>
        <title>Vida Zoltán János A9PXI3 Int Alk II.</title>
        <style>
            table, th, td {
                border: none;
            }
        </style>
    </head>
    <body>
        <div style="text-align:right">
            <button type=button onclick="window.location.href='main.php'">Vissza a listához</button>
            <button type=button onclick="window.location.href='logout.php'">Kilépés</button>
        </div>
        <?php
            if(isset($_SESSION['user'])){

            } else{
                header("Location: index.php");
            }
        ?>
        <h2>Új rekord hozzáadása:</h2>
        <br>
        <form method="post">
            <table >
                <tr>
                    <td>Név:</td>
                    <td><input type="text" name="name"></td>
                    <td>
                        <label for="car_id">Autó típus:</label>
                        <select id="car_id" name="car_id">>
                        <?php
                            foreach($carBrands as $carBrand) {
                            echo "<option value='" . $carBrand["car_id"] . "' >" . $carBrand["brandname"] . "</option>";
                            }
                        ?>
                        </select>
                    </td>
                    <td><input type="submit" name="submit" value="Hozzáad"></td>
                </tr>
            </table>
        </form>