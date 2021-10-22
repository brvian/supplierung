<?PHP
    session_start();
    $_SESSION["isAdmin"] = 'user';
    header("Location: login.php");
?>