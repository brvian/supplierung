<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Neue Stock?
        </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="script.js"></script>
        <link href="stylesheet.css" rel="stylesheet" type="text/css">
        <link rel = "icon" href = "https://i2.wp.com/htl-shkoder.com/wp-content/uploads/2018/10/cropped-logo-3-1.png?fit=512%2C512&ssl=1" type = "image/x-icon">

    </head>
    <body>
        <?php include 'navbar.php' ?>
        <?PHP
            require_once "connection.php";
            require_once "validateSession.php";
            
            
            $fehler = 0;
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_POST["name"]) || empty($_POST["gebaude"])){
                    $fehler=1;
                }
                $kot = "";

                if($fehler==0){
                    require_once "validierung.php";

                    if(isset($_POST["name"])){
                        $name=validierung($_POST["name"]);
                    }
                    if(isset($_POST["gebaude"])){
                        $location=validierung($_POST["gebaude"]);
                    }
                    $stmt = $con->prepare("CALL sp_addStock(:name, :gebaude);");
                    $stmt->bindParam('name', $name);
                    $stmt->bindParam('gebaude', $location);
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
                        Neue Stock?
                    </h2>
                </div>
                <div class="item">
                    <p>Stock </p>
                    <input type="text" name="name" id = "nameID">
                </div>
                <div class="item">
                    <p >Gebaeude </p>
                    <?PHP
                        $con = new PDO("mysql:host=$server;dbname=$database", $user, $pwd);
                        $query = $con->query("SELECT name FROM gebaude");
                        
                        echo '<select name="gebaude">';
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option>'.$row['gebaude'].'</option>';
                        }
                        echo '</select>';
                    ?>
                </div>
                <div class="btn-block">
                    <button id="back"><a href="index.php">Zurück</a></button></td>
                </div>
                <div class="btn-block">
                    <button type="submit" id="submit" class="btn btn-primary btn-block">Anlegen</button>
                </div>
            </form>
        </div>
        
    </body>
    
</html>