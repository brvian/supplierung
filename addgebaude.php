<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Neue Gebaude?
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
                    $stmt = $con->prepare("CALL sp_addGebaude(:name);");
                    $stmt->bindParam('name', $name);
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
                        Neue Gebaude?
                    </h2>
                </div>
                <div class="item">
                    <p>Gebaude </p>
                    <input type="text" name="name" id = "nameID">
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