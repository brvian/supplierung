<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">

        <title>
            Email hinzufügen
        </title>

    </head>
    <body>

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

        <h2>
            Display Methoden hinzufügen
        </h2>

        <p>Fülle den Formular aus, um eine Email hinzufügen. </p>

        <form action="addemail.php" method="POST">
            <table>
                <tr>
                    <td class="titel">Email: </td>
                    <td>
                    <?PHP
                        echo '<input type="email" id="email" name="email" required size="10">'
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="index.php">Zurück</a>
                    </td>
                    <td>
                        <button type="submit" id="but" class="btn btn-primary btn-block">Anlegen/Löschen</button></td>
                    </td>
                </tr>
            </table>
        </form>
</html>