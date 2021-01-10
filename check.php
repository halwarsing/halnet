<?php
$mysqli = mysqli_connect("localhost","u1065577_user","yourpassword","u1065577_halnet");
$login = $_POST["login"];
$passw = $_POST["passw"];

$req = mysqli_fetch_assoc(mysqli_query($mysqli,"SELECT * FROM users WHERE login='$login' AND password='$passw'"));
if ($req != "") {
    echo "t";
} else {
    echo "f";
}
?>