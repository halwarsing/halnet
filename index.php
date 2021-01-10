<html>
    <head>
        <title>halnet:MAIN</title>
    </head>
    <body>
<?php
$login = $_COOKIE["login"];
if ($login != "") {
    echo "<h1>Welcome ".$login."</h1>";
} else {
    echo "<a href='login.php'>Log in</a>";
}
?>
    </body>
</html>