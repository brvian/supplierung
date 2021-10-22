<!-- Diese PHP File sollte am Anfang jeder PHP Clausel jeder Admin-Webseite stehen.
  
    <\?php
        require_once "validateSession.php";
    ?>
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="Sead Osmanagiq">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- eigene CSS -->
    <link rel="stylesheet" href="loginstyle.css">
   
    <title>
            HTL Supplierung | Login
    </title>
    <link rel = "icon" href = "https://i2.wp.com/htl-shkoder.com/wp-content/uploads/2018/10/cropped-logo-3-1.png?fit=512%2C512&ssl=1" type = "image/x-icon">

</head>
<body>
<?PHP
    // Starting a new session to enable access priviledges on different websites on the domain depending on user roles.
    session_start();
    /*
     Status variable for kuerzung and user password
     0 = no error 
     1 = error found
     */
    $kuerzung_s = $password_s = 0;
    // Connecting to the database
    require_once "connection.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        /*
         Save kuerzung and password INPUT if not left empty
         Change variable status to 1 if left empty
         */
        if (empty($_POST["kuerzung"])) {
            $kuerzung_s = 1;
        } else {
            if (!empty($_POST["password"])){
                /*
                Getting user data from the database: kuerzung, password and role.
                Search using kuerzung character as parameter, for faster runtime.
                */
                $sth = $con->prepare("CALL sp_checkForUser(:kuerzung, :password);");
                //Set parameter to the SQL statement.
                $sth->bindValue('kuerzung', $_POST["kuerzung"]);
                $sth->bindValue('password', $_POST["password"]);
                //Run SQL statement.
                $sth->execute();
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                if($result) {
                    /*
                    Redirect to ADMIN PAGE if admin user logged in.
                    Redirect to GENERAL PAGE if normal user logged in.
                    Relative URL use, incase of domain change.
                    */
                    foreach($result as $row){
                        if(md5($row["rolle"]=='admin' && $row["isActive"]==1)){
                            $_SESSION["rolle"] = 'admin';
                            header("Location: addsup.php");
                            exit();
                        } else if(md5($row["rolle"]=='user' && $row["isActive"]==1)){
                            $_SESSION["rolle"] = 'user';
                            header("Location: index.php");
                            exit();
                        }
                    }
                }
            }else{
                $password_s=1;
            }
        }
    }
    // End connection to database.
    $con = null;
?>

                <div class="login-box">
                    
                    <h2><a href="https://brapla16.htl-server.com/supplierung/index.php"> <img class="center login-image" style="width:300px;" src="images/school_logo_white_go1.png"></a></h2>
                    <form action="login.php" method="POST">
                        <div class="user-box">
                            <!-- Benutzername INPUT-->
                            <input type="text" id="kuerzung" name="kuerzung" required>
                            <label for="kuerzung">Benutzername</label>
                            <?PHP 
                                // Dem Benutzer zeigen, dass er den Benutzernamen falsch geschrieben hat.
                                if ($kuerzung_s==1){
                                echo "<tr> <td> </td> <td>";
                                echo "<p class='false'>Bitte einen richtigen Benutzernamen eingeben!</p>";
                                echo "</td> </tr>";
                                }
                                // Reset variable status. 
                                $kuerzung_s = 0;
                            ?>
                        </div>
                        <div class="user-box">
                            <!-- Passwort INPUT-->
                            <input type="password" id="password" name="password" required>
                            <label for="password">Password</label>
                            <?PHP
                                // Dem Benutzer zeigen, dass er das Passwort falsch geschrieben hat.
                                if ($password_s==1){
                                echo "<tr> <td> </td> <td>";
                                echo "<p class='false'>Bitte ein richtige Passwort eingeben!</p>";
                                echo "</td> </tr>";
                                }
                                // Reset variable status. 
                                $password_s = 0;
                            ?>
                        </div>
                        <button type="submit">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Login
                        </button>
                    </form>
                </div>
</body>
</html>