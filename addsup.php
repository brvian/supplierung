<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Braian Plaku">
        <link rel="stylesheet" href="stylesheet.css">
        <link rel = "icon" href = "https://i2.wp.com/htl-shkoder.com/wp-content/uploads/2018/10/cropped-logo-3-1.png?fit=512%2C512&ssl=1" type = "image/x-icon">
        <title>
            Supplierung hinzufügen
        </title>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="popup.js"></script>
    </head>
    <body>
        <?PHP
            require_once "validateSession.php";
            require_once "connection.php";
            $fehler=0;
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_POST["stunde"]) || empty($_POST["datum"]) || empty($_POST["klasse"]) || empty($_POST["vertretung"]) || empty($_POST["abwesend"]) || empty($_POST["raum"]) || empty($_POST["status"])){
                    $fehler=1;
                }
                if($fehler==0){
                    require_once "validierung.php";

                    if(isset($_POST["stunde"])){
                        $stunde=validierung(utf8_decode($_POST["stunde"]));
                    }
    
                    if(isset($_POST["klasse"])){
                        $klasse=(utf8_decode($_POST["klasse"]));
                    }
    
                    if(isset($_POST["vertretung"])){
                        $vertretung=validierung(utf8_decode($_POST["vertretung"]));
                    }
    
                    if(isset($_POST["abwesend"])){
                        $abwesend=validierung(utf8_decode($_POST["abwesend"]));
                    }
    
                    if(isset($_POST["raum"])){
                        $raum=validierung(utf8_decode($_POST["raum"]));
                    }

                    if(isset($_POST["datum"])){
                        $datum=validierung(utf8_decode($_POST["datum"]));
                    }
        
                    $stmt = $con->prepare("CALL sp_addSup(:stunde, :datum, :klasse, :vertretung, :abwesend, :raum, :status, :check);");
    
                    $query = $con->query("SELECT id FROM status WHERE anmeldung=\"" . utf8_decode($_POST["status"]) . "\"");
                    $row = $query->fetch(PDO::FETCH_ASSOC);
                    $status = $row['id'];

                    $query = $con->query("SELECT id FROM datum WHERE datum=\"" .  utf8_decode($_POST["datum"]) . "\"");
                    $row = $query->fetch(PDO::FETCH_ASSOC);
                    $datum = $row['id'];
            
                    $check = "1";
    
                    $stmt->bindParam('stunde', $stunde);
                    $stmt->bindParam('datum', $datum);
                    $stmt->bindParam('klasse', $klasse);
                    $stmt->bindParam('vertretung', $vertretung);
                    $stmt->bindParam('abwesend', $abwesend);
                    $stmt->bindParam('raum', $raum);
                    $stmt->bindParam('status', $status);
                    $stmt->bindParam('check', $check);

                    $stmt->execute();
                    $con=null;
                    
                    echo"<script type=\"text/javascript\"> successData(); </script>";
                }else{
                    echo"<script type=\"text/javascript\"> missingData(); </script>";
                }
            }
        ?>
        <?PHP include 'navbar.php';?>
        <div class="testbox">
            <form action="addsup.php" method="POST">
                <h2><a href="https://brapla16.htl-server.com/supplierung/index.php"> <img class="logo" src="images/school_logo_white_go1.png"></a></h2>
                <div class="banner">
                    <h2 class="lang" key="addsup">Supplierung hinzufügen</h2>
                </div>
                <div class="item">
                    <p class="lang" key="stunde">Stunde:</p>
                    <?PHP
                        echo '<select name="stunde">';
                        $row = 1;
                        while ($row<=10) {
                            echo '<option>'.utf8_encode($row).'</option>';
                            $row = $row + 1;
                        }
                        echo '</select>';
                    ?>
                </div>
                <div class="item">
                    <p class="lang" key="datum">Datum:</p>
                    <?PHP
                        echo '<input type="date" name="datum" value=' . date("Y-m-d") . ' min="2021-01-01" max="2023-01-01">';
                    ?>
                </div>
                <div class="item">
                    <p class="lang" key="klasse">Klasse:</p>
                    <?PHP
                        $con = new PDO("mysql:host=$server;dbname=$database", $user, $pwd);
                        $query = $con->query("SELECT id FROM klasse");
                        
                        echo '<select name="klasse">';
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option>'.utf8_encode($row['id']).'</option>';
                        }
                        echo '</select>';
                    ?>
                </div>
                <div class="item">
                    <p class="lang" key="vertretung">Vertretung:</p>
                    <?PHP
                        $con = new PDO("mysql:host=$server;dbname=$database", $user, $pwd);
                        $query = $con->query("SELECT kuerzung FROM lehrer");

                        echo '<select name="vertretung">';
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option>'.utf8_encode($row['kuerzung']).'</option>';
                        }
                        echo '</select>';
                    ?>
                </div>
                <div class="item">
                    <p class="lang" key="abwesend">Abwesend:</p>
                    <?PHP
                        $con = new PDO("mysql:host=$server;dbname=$database", $user, $pwd);
                        $query = $con->query("SELECT kuerzung FROM lehrer");
                        
                        echo '<select name="abwesend">';
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option>'.utf8_encode($row['kuerzung']).'</option>';
                        }
                        echo '</select>';
                    ?>
                </div>
                <div class="item">
                    <p class="lang" key="raum">Raum:</p>
                    <?PHP
                        $con = new PDO("mysql:host=$server;dbname=$database", $user, $pwd);
                        $query = $con->query("SELECT name FROM raum");

                        echo '<select name="raum">';
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option>'.utf8_encode($row['name']).'</option>';
                        }
                        echo '</select>';
                    ?>
                </div>
                <div class="item">
                    <p class="lang" key="status">Art der Supplierung:</p>
                    <?PHP
                        $con = new PDO("mysql:host=$server;dbname=$database", $user, $pwd);
                        $query = $con->query("SELECT anmeldung FROM status");

                        echo '<select name="status">';
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option>'.utf8_encode($row['anmeldung']).'</option>';
                        }
                        echo '</select>';
                    ?>
                </div>
                <div class="btn-block">
                    <a href="index.php"><button class="lang" key="logout" type="button">Logout</button></a>
                    <a href="index.php"><button class="lang" key="anlegen" type="submit" id="submit" onclick="return confirm('Supplierung hinzufügen?');"><span></span><span></span><span></span><span></span>Anlegen</button></a>
                </div>
            </form>
        </div>
        <script src="translate.js"></script>
    </body>
</html>