<?php
$mysqli = mysqli_connect("localhost","u1065577_user","yourpassword","u1065577_halnet");
$login = $_POST["login"];
$passw = $_POST["passw"];

function loginFree($login, $mysqli) {
    $req = mysqli_fetch_assoc(mysqli_query($mysqli,"SELECT * FROM users WHERE login='$login'"));
    if ($req == "") {
        return True;
    }
    return False;
}

if (loginFree($login, $mysqli)) {
    mysqli_query($mysqli, "INSERT INTO users (login, password) VALUES ('$login', '$passw')");
    echo "t";
} else {
    echo "f";
}
?>