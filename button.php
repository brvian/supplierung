<?php
    
    session_start();
    if((isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 'admin')){
        //continue
    } else {
        header("Location: http://brapla16.htl-server.com/supplierung/login.php");
        exit(); //Stop running the script
        // go to form page again.
    }
?>
<?php
    require_once "connection.php";
    $stmt = $con->query("SELECT * FROM button LIMIT 1");
    $button = $stmt->fetch();
    //echo $button["statusButton"];
    //echo "</br>".$button["print_ongoing"]; 

    //The script checks if printing is ongoing. If not, the value of the button will change from false to true and than the python script will get the signal
    //via crons that it should start printing.

    if($button["statusButton"]==1 || $button["print_ongoing"]==1){
        echo '<script> window.alert("Ausdrucks Anfrage wurde geschickt. Bitte warten Sie und probieren es spaeter ausprobieren!"); window.location.href = "https://brapla16.htl-server.com/supplierung/addsup.php";</script>';
    }else{
        $sth = $con->prepare("UPDATE button SET statusButton = 1 WHERE id = 2");
        //Run SQL statement.
        $sth->execute();
        echo '<script> window.alert("Ausdrucks Anfrage wurde geschickt. Bitte holen Sie das gedruckte Blatt!"); window.location.href = "https://brapla16.htl-server.com/supplierung/addsup.php"; </script>';
    }
?>