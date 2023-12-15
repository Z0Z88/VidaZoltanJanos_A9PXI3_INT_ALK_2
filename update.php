<?php
    include("session.php");
    include("database.php");
    $id = $_GET["id"];
    

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $car_id = $_POST['car_id'];
        $query="UPDATE Owners SET name=('$name'),car_id=('$car_id') WHERE owner_id=$id";
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
            
            $getquery="SELECT * FROM Owners WHERE owner_id = $id";
            $getresult=mysqli_query($connect,$getquery);
            $row=mysqli_fetch_assoc($getresult);
        ?>
        <h2>Rekord módosítása:</h2>
        <br>
        <form method="post">
          <label for="owner_id">owner_id:</label>
          <input id="owner_id" name="owner_id" value=<?php echo $row['owner_id']?> disabled />
          <label for="name">Név:</label>
          <input id="name" name="name" type="text" value=<?php echo $row['name']?>></td>
          <label for="car_id">Autó típus:</label>
          <select id="car_id" name="car_id">>
            <?php
              foreach($carBrands as $carBrand) {
                $selected = ($row["car_id"] == $carBrand["car_id"]) ? "selected" : "";
                echo "<option value='" . $carBrand["car_id"] . "' " . $selected . ">" . $carBrand["brandname"] . "</option>";
              }
            ?>
          </select>
          <input type="submit" name="submit" value="Módosít">
        </form>
    </body>
</html>