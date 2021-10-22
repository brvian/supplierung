<?php
    //Hier werden die Daten zur Verbindung gespeichert
    $server = "htl-server.com";
    $database = "2021_4ay_antonelamarku_supp";
    $user = "antmar16";
    $pwd = "1Antonela!";
    //Hier wird die Verbindung aufgebaut,...
    try{
        //...das wird ausgeführt wenn es klappt
        $con = new PDO("mysql:host=$server;dbname=$database", $user, $pwd);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        //...das wird ausgeführt wenn es einen Fehler gibt
        echo "<p>Es konnte keine Verbindung zur Datenbank hergestellt werden: " . $e->getMessage() . "</p>";
    }
?>