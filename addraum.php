<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Raum hinzufügen
        </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="script.js"></script>
        <link href="stylesheet.css" rel="stylesheet" type="text/css">
        <link rel = "icon" href = "https://i2.wp.com/htl-shkoder.com/wp-content/uploads/2018/10/cropped-logo-3-1.png?fit=512%2C512&ssl=1" type = "image/x-icon">
        
    </head>
    <body>
        <?PHP include 'navbar.php';?>
        <?PHP
            require_once "connection.php";
            
            
            
            $fehler = 0;
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_POST["name"]) || empty($_POST["location"]||empty($_POST["number"]))){
                    $fehler=1;
                }
                $kot = "";

                if($fehler==0){
                    require_once "validierung.php";

                    if(isset($_POST["name"])){
                        $name=validierung($_POST["name"]);
                    }
                    if(isset($_POST["number"])){
                        $number=validierung($_POST["number"]);
                    }
                    if(isset($_POST["stock"])){
                        $stock=validierung($_POST["stock"]);
                    }
                    $stmt = $con->prepare("CALL sp_addraum(:name, :stock,:number);");
                    $stmt->bindParam('name', $name);
                    $stmt->bindParam('stock', $stock);
                    $stmt->bindValue('number', $number);
                    $stmt->execute();
                    $con=null;
                }
            }
        ?>
        <div class="testbox">
            
            <form name = "myForm" onsubmit="validateRaum()" method="POST">
                <h2><a href="https://brapla16.htl-server.com/supplierung/index.php"> <img class="logo" src="images/school_logo_white_go1.png"></a></h2>

                <div class="banner">
                    <h2>
                        Raum hinzufügen
                    </h2>
                </div>
                <div class="item">
                    <p>Raumname: </p>
                    <input type="text" name="name" id = "nameID">
                
                </div>
                <div class="item">
                    <p>Raumnummer: </p>
                    <input type="number" name="number" id = "number">
                
                </div>
                <div class="item">
                    <p >Stock: </p>
                    <?PHP
                        $con = new PDO("mysql:host=$server;dbname=$database", $user, $pwd);
                        $query = $con->query("SELECT id AS stock FROM stock");
                        
                        echo '<select name="stock">';
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option>'.$row['stock'].'</option>';
                        }
                        echo '</select>';
                    ?>
                </div>
                <div class="btn-block">
                    <a href="index.php">
                        <button class="lang" key="logout">Logout</button>
                    </a>
                    <a href="index.php">
                        <button class="lang" key="anlegen" type="submit" id="submit" onclick="return confirm('Raum hinzufügen?');">
                        Anlegen</button>
                    </a>
                </div>
            </form>
        </div>
        
    </body>
    
</html>