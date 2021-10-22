<!DOCTYPE html>
    <html>
        <head>
            <title>Navbar</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
            <!--Viki Stylesheet-->

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <script src="navbar.css"></script>
        </head>
        <body>

        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Start</a>
            </div>
            <ul class="nav navbar-nav">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Supplierungen <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="addsup.php">Add</a></li>
                <li><a class="dropdown-item" href="editsup.php">Edit</a></li>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Lehrer <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="addlehrer.php">Add</a></li>
                <li><a class="dropdown-item" href="editlehrer.php">Edit</a></li>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Klasse <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="addklasse.php">Add</a></li>
                <li><a class="dropdown-item" href="editklasse.php">Edit</a></li>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Raum <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="addraum.php">Add</a></li>
                <li><a class="dropdown-item" href="editraum.php">Edit</a></li>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Display <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="adddisplay.php">Add</a></li>
                <li><a class="dropdown-item" href="editdisplay.php">Edit</a></li>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Email <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="addemail.php">Add</a></li>
                <li><a class="dropdown-item" href="editemail.php">Edit</a></li>
                </ul>
            </li>
            <li class="active"><a href="audrucken.php">Drucken</a></li>

            </ul>
            <ul class="nav navbar-nav">
                <li>
                    <a id="al" class="translate"><img src="images/Albania.png" height=20px/></a>
                </li>
                <li>
                    <a id="de" class="translate"><img src="images/Austria.png" height=20px/></a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
        </nav>
    </body>
</html>