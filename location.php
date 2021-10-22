<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">

        <title>
            Klasse hinzufügen
        </title>

        <link href="formular.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <?PHP
            require_once "connection.php";

            if(isset($_POST["location"])){
                $location=$_POST["location"];


                $stmt = $con->prepare("CALL sp_addLocation(:location);");

                $stmt->bindParam(':location', $location);

                $stmt->execute();
                $con=null;
            }
        ?>

        <h2>
            Location hinzufügen
        </h2>

        <p>Fülle den Formular aus, um eine Location hinzufügen.</p>

        <form action="location.php" method="POST">
            <table>
                <tr>
                    <td class="titel">Location: </td>
                    <td><input type="text" id="location" name="location" required size="10"></td>
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