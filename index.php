<!DOCTYPE html>
<html>
  <head>
    <title>Supplierungen</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="refresh" content="10" > 
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel = "icon" href = "https://i2.wp.com/htl-shkoder.com/wp-content/uploads/2018/10/cropped-logo-3-1.png?fit=512%2C512&ssl=1" type = "image/x-icon">
    
</head>
  <body>
  <a href="https://brapla16.htl-server.com/supplierung/login.php"> <img class="center" src="images/school_logo.png"></a>
	 
    <h1>Supplierung</h1>
    
    <?PHP
		echo "<h4>".date("d/m/Y")."</h4>";
        function showOnlyOne($stunde){
        	$server = "htl-server.com";
            $database = "2021_4ay_antonelamarku_supp";
            $user = "antmar16";
            $pwd = "1Antonela!";
            try{
                $con = new PDO("mysql:host=$server;dbname=$database", $user, $pwd);
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                echo "<p>Es konnte keine Verbindung zur Datenbank hergestellt werden: " . $e->getMessage() . "</p>";
            }
        	$p_stunde = $stunde;
        	$sql = "CALL sp_showDataByHour(:p_stunde);";
              
            $sth = $con->prepare($sql);
            $sth->bindParam(':p_stunde',$p_stunde);
            $sth->execute();
              
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($result)){
     	    echo "<table class=\"styled-table\">";
 		    echo "<thead> ";
  		    echo "<tr>";
    	    echo  "<th scope=\"col\">Stunde/Ora</th>";
    	    echo  "<th scope=\"col\">Klasse/Klasa</th>";
    	    echo  "<th scope=\"col\">Abwesendheit/Mungon</th>";
            echo  "<th scope=\"col\">Vertretung/Zëvendëson</th>";
		    echo  "<th scope=\"col\">Raum/Dhoma</th>";
		    echo  "<th scope=\"col\"></th>";
            echo "</tr>";
      	    echo "</thead>";
     	    echo "<tbody>";
          	foreach($result as $row) {
	            echo "<tr>";
	            echo "<td>" . $row["stunde"] . "</td>";
	            echo "<td>" . $row["klasse"] . "</td>";
	            echo "<td>" . $row["abwesend"] . "</td>";
	            echo "<td>" . $row["vertretung"] . "</td>";
				echo "<td>" . $row["raum"] . "</td>";
				echo "<td> <div class=\"blob\"></div></td>";
	            echo "</tr>";
	        }
            echo "</tbody>";
		    echo "</table>";
		    echo "<br>";echo "<br>";echo "<br>";
		}
		    $con=null;
        }
        function showNextOnes($stunde){
        	$server = "htl-server.com";
            $database = "2021_4ay_antonelamarku_supp";
            $user = "antmar16";
            $pwd = "1Antonela!";
            try{
                $con = new PDO("mysql:host=$server;dbname=$database", $user, $pwd);
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                echo "<p>Es konnte keine Verbindung zur Datenbank hergestellt werden: " . $e->getMessage() . "</p>";
            }
        	$p_stunde = $stunde;
        	$sql = "CALL sp_showDataAfterHour(:p_stunde);";
              
            $sth = $con->prepare($sql);
            $sth->bindParam(':p_stunde',$p_stunde);
            $sth->execute();
              
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($result)){
            	echo "<table class=\"styled-table\">";
	 		    echo "<thead>";
	  		    echo "<tr>";
			    echo  "<th scope=\"col\">Stunde/Ora</th>";
			    echo  "<th scope=\"col\">Klasse/Klasa</th>";
			    echo  "<th scope=\"col\">Abwesendheit/Mungon</th>";
			    echo  "<th scope=\"col\">Vertretung/Zëvendëson</th>";
			    echo  "<th scope=\"col\">Raum/Dhoma</th>";
			    echo  "<th scope=\"col\"></th>";
	            echo "</tr>";
	      	    echo "</thead>";
	     	    echo "<tbody>";
	          	foreach($result as $row) {
		            echo "<tr>";
		            echo "<td>" . $row["stunde"] . "</td>";
		            echo "<td>" . $row["klasse"] . "</td>";
		            echo "<td>" . $row["abwesend"] . "</td>";
		            echo "<td>" . $row["vertretung"] . "</td>";
					echo "<td>" . $row["raum"] . "</td>";
					echo "<td> <div class=\"blob-orange\"></div></td>";
		            echo "</tr>";
		        }
	            echo "</tbody>";
			    echo "</table>";
            }
     	    
		    $con=null;
        }
        date_default_timezone_set("Europe/Podgorica");
          
        if(date('l') != "Sunday" && date('l') != "Saturday"){

	        if("07:45"<=date("H:i") && date("H:i:s")<="08:29:59"){
	            $number = 1 ; 
	            showOnlyOne($number);
	          	showNextOnes($number);
	        }else if("08:30"<=date("H:i") && date("H:i:s")<="09:19:59"){
				$number = 2 ; 
				showOnlyOne($number);
	          	showNextOnes($number);
	        }else if("09:20"<=date("H:i") && date("H:i")<="09:34:59"){
				$number = 2 ; 
	          	showNextOnes($number);
				//to edit
	        }else if("09:35"<=date("H:i") && date("H:i:s")<="10:19:59"){
				$number = 3 ; 
	          	showOnlyOne($number);
	          	showNextOnes($number);
	        }else if("10:20"<=date("H:i") && date("H:i:s")<="10:24:59"){
				$number = 3 ; 
	          	showNextOnes($number);
				//to edit
	        }else if("10:25"<=date("H:i") && date("H:i:s")<="11:09:59"){
	          	$number = 4 ; 
	          	showOnlyOne($number);
	          	showNextOnes($number);
	        }else if("11:10"<=date("H:i") && date("H:i:s")<="11:19:59"){
				$number = 4 ; 
	          	showNextOnes($number);
				//to edit
	        }else if("11:20"<=date("H:i") && date("H:i:s")<="12:04:59"){
				$number = 5 ; 
	          	showOnlyOne($number);
	          	showNextOnes($number);
	        }else if("12:05"<=date("H:i") && date("H:i:s")<="12:09:59"){
				$number = 5 ; 
	          	showNextOnes($number);
				//to edit
	        }else if("12:10"<=date("H:i") && date("H:i:s")<="12:54:59"){
				$number = 6 ; 
	          	showOnlyOne($number);
	          	showNextOnes($number);
	        }else if("12:55"<=date("H:i") && date("H:i:s")<="13:39:59"){
				$number = 7 ; 
	          	showOnlyOne($number);
	          	showNextOnes($number);
	        }else if("13:40"<=date("H:i") && date("H:i")<="13:44:59"){
				$number = 7 ; 
	          	showNextOnes($number);
				//to edit
	        }else if("13:45"<=date("H:i") && date("H:i:s")<="14:29:59"){
	          	$number = 8 ; 
	          	showOnlyOne($number);
	          	showNextOnes($number);
	        }else if("14:30"<=date("H:i") && date("H:i:s")<="14:39:59"){
				$number = 8 ; 
	          	showNextOnes($number);
				//to edit
	        }else if("14:40"<=date("H:i") && date("H:i:s")<="15:24:59"){
	          	$number = 9 ; 
	          	showOnlyOne($number);
	          	showNextOnes($number);
	        }else if("15:25"<=date("H:i") && date("H:i")<="16:10"){
				$number = 10 ; 
	          	showOnlyOne($number);
	        }else if("16:11"<=date("H:i") && date("H:i:s")<="16:11:09"){
	       
	        }
	          	
        }  
	        
             
    ?>
      
  </body>
</html>