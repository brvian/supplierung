<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Braian Plaku">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="stylesheet.css">
        <link rel = "icon" href = "https://i2.wp.com/htl-shkoder.com/wp-content/uploads/2018/10/cropped-logo-3-1.png?fit=512%2C512&ssl=1" type = "image/x-icon">
        <title>
            Lehrer hinzufügen
        </title>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    </head>
    <body>
    <?PHP
            require_once "validateSession.php";
            require_once "connection.php"; 
            $fehler=0;
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_POST["kuerzel"]) || empty($_POST["vorname"]) || empty($_POST["nachname"]) || empty($_POST["rolle"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["sprache"])){
                    $fehler=1;
                }
                if($fehler==0){
                    require_once "validierung.php";

                    if(isset($_POST["kuerzel"])){
                        $kuerzel=validierung($_POST["kuerzel"]);
                    }
    
                    if(isset($_POST["vorname"])){
                        $vorname=validierung($_POST["vorname"]);
                    }
    
                    if(isset($_POST["nachname"])){
                        $nachname=validierung($_POST["nachname"]);
                    }
    
                    if(isset($_POST["rolle"])){
                        $rolle=validierung($_POST["rolle"]);
                    }
    
                    if(isset($_POST["email"])){
                        $email=validierung($_POST["email"]);
                    }

                    if(isset($_POST["password"])){
                        $password=($_POST["password"]);
                    }

                    if(isset($_POST["sprache"])){
                        $sprache=validierung($_POST["sprache"]);
                    }
        
                    $stmt = $con->prepare("CALL sp_addLehrer(:kuerzel, :vorname, :nachname, :rolle, :email, :password, :isActive, :sprache);");

                    $isActive = "true";
    
                    $stmt->bindParam('kuerzel', $kuerzel);
                    $stmt->bindParam('vorname', $vorname);
                    $stmt->bindParam('nachname', $nachname);
                    $stmt->bindParam('rolle', $rolle);
                    $stmt->bindParam('email', $email);
                    $stmt->bindParam('password', $password);
                    $stmt->bindParam('sprache', $sprache);
                    $stmt->bindParam('isActive', $isActive);

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
            <form action="addlehrer.php" method="POST">
                <h2><a href="https://brapla16.htl-server.com/supplierung/index.php"> <img class="logo" src="images/school_logo_white_go1.png"></a></h2>
                <div class="banner">
                    <h2 class="lang" key="addlehrer">Lehrer hinzufügen</h2>
                </div>
                <div class="item">
                    <p class="lang" key="kuerzel">Kuerzel:</p>
                    <input type="text" name="kuerzel">
                </div>
                <div class="item">
                    <p class="lang" key="vorname">Vorname:</p>
                    <input type="text" name="vorname">
                </div>
                <div class="item">
                    <p class="lang" key="nachname">Nachname:</p>
                    <input type="text" name="nachname">
                </div>
                <div class="item">
                    <p class="lang" key="rolle">Rolle:</p>
                    <select name="rolle">
                        <option>Admin</option>
                        <option>User</option>
                    </select>
                </div>
                <div class="item">
                    <p class="lang" key="email">E-Mail:</p>
                    <input type="text" name="email">
                </div>
                <div class="item">
                    <p class="lang" key="password">Passwort:</p>
                    <input type="password" name="password">
                </div>
                <div class="item">
                    <p class="lang" key="sprache">Sprache:</p>
                    <select name="sprache">
                        <option >Deutsch</option>
                        <option >Albanisch</option>
                    </select>
                </div>
                <div class="btn-block">
                    <a href="index.php"><button class="lang" key="logout" type="logout">Logout</button></a>
                    <a href="index.php"><button class="lang" key="anlegen" type="submit" id="submit" onclick="return confirm('Lehrer hinzufügen?');"><span></span><span></span><span></span><span></span>Anlegen</button></a>
                </div>
            </form>
        </div>
        <script src="translate.js"></script>
    </body>
</html>