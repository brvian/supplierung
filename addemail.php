<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">

        <title>
            Email hinzufügen
        </title>

        <link href="stylesheet.css" rel="stylesheet" type="text/css">
        <link rel = "icon" href = "https://i2.wp.com/htl-shkoder.com/wp-content/uploads/2018/10/cropped-logo-3-1.png?fit=512%2C512&ssl=1" type = "image/x-icon">

    </head>
    <body>
        <?php include 'navbar.php' ?>
        <?PHP
            require_once "connection.php";

            if(isset($_POST["email"])){
                $email=$_POST["email"];
                $stmt = $con->prepare("CALL sp_addEmail(:email);");
                $stmt->bindParam('email', $email);
                $stmt->execute();
                $con=null;
            }

            
        ?>
        <div class="testbox">
            

            <div class="banner">
                <h2>
                    Email hinzufügen
                </h2>
            </div>

            <form action="addemail.php" method="POST">
                <table>
                    <tr>
                        <td class="titel">Email: </td>
                        <td>
                        <?PHP
                            echo '<input type="email" id="email" name="email" required size=20>'
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <div class="btn-block">
                            <button id="but"><a href="index.php">Zurück</a></button></td>
                        </div>
                        </td>
                        <td>
                            <button type="submit" id="but" class="btn btn-primary btn-block">Anlegen</button></td>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>        
</html>