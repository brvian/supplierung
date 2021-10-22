<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">
        <title>
            Klasse hinzufügen
        </title>
        <link rel = "icon" href = "https://i2.wp.com/htl-shkoder.com/wp-content/uploads/2018/10/cropped-logo-3-1.png?fit=512%2C512&ssl=1" type = "image/x-icon">
        <link href="stylesheet.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <?PHP
                require_once "connection.php";

                if(isset($_POST["name"])&&isset($_POST["gruppe"])){
                    $stunde=$_POST["name"];
                    $stunde=$_POST["gruppe"];


                    $stmt = $con->prepare("CALL sp_addKlasse(:name, :gruppe );");

                    $stmt->bindParam('name', $name);
                    $stmt->bindParam('gruppe', $gruppe);

                    $stmt->execute();
                    $con=null;
                }
        ?>
        <div class="testbox">
            
            <div class="banner">
                <h2>
                    Klasse hinzufügen
                </h2>
            </div>
            
            
            <form action="addklasse.php" method="POST">
                <table>
                    <div class="item">
                        <p>Klasse</p>
                        <input type="name" name="name"/>
                    </div>
                    <div class="item">
                        <p>Gruppe</p>
                        <input type="name" name="name"/>
                    </div>
                    <tr>
                        <td>
                        <div class="btn-block">
                            <a href="index.php">
                                <button class="lang" key="logout">Logout</button>
                            </a>
                            <a href="index.php">
                                <button class="lang" key="anlegen" type="submit" id="submit" onclick="return confirm('Raum hinzufügen?');">
                                Anlegen</button>
                            </a>
                        </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>