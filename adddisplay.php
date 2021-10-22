<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">

        <title>
            Display Methoden hinzufügen
        </title>
        <link href="stylesheet.css" rel="stylesheet" type="text/css">
        <link rel = "icon" href = "https://i2.wp.com/htl-shkoder.com/wp-content/uploads/2018/10/cropped-logo-3-1.png?fit=512%2C512&ssl=1" type = "image/x-icon">
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <?PHP
            require_once "connection.php";

            if(isset($_POST["location"])&&isset($_POST["showAll"])&&isset($_POST["mac"])&&isset($_POST["text"])){
                $location=$_POST["location"];
                $showAll=$_POST["showAll"]=="True"?1:0;
                $mac=$_POST["mac"];
                $text=$_POST["text"];

                $stmt = $con->prepare("CALL sp_addDisplay(:location, :showAll, :mac, :text);");

                $stmt->bindParam('location', $location);
                $stmt->bindParam('showAll', $showAll);
                $stmt->bindParam('mac', $mac);
                $stmt->bindParam('text', $text);

                $stmt->execute();
                $con=null;
            }

            
        ?>
        <div class="testbox">
            <form action="adddisplay.php" method="POST">
                 <h2><a href="https://brapla16.htl-server.com/supplierung/index.php"> <img class="logo" src="images/school_logo_white_go1.png"></a></h2>

                <div class="banner">
                    <h2>
                        Display Methoden hinzufügen
                    </h2>
                </div>
                <div class="item">
                    <p>Location: </p>
                    <?PHP
                            $con = new PDO("mysql:host=$server;dbname=$database", $user, $pwd);
                            $query = $con->query("SELECT id FROM stock");

                            echo '<select name="location">';
                            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option>'.$row['location'].'</option>';
                            }
                            echo '</select>';
                        ?>
                </div>
                <div class="item">
                    <p>Show All: </p>
                        <select name="showAll">
                            <option>True</option>
                            <option>False</option>
                        </select>
                </div>
                <div class="btn-block">
                    <a href="index.php"><button class="lang" key="logout" type="logout">Logout</button></a>
                    <a href="index.php"><button class="lang" key="anlegen" type="submit" id="submit" onclick="return confirm('Lehrer hinzufügen?');"><span></span><span></span><span></span><span></span>Anlegen</button></a>
                </div>
            </form>
        </div>
    </body>
</html>