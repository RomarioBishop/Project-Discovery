<?php
//start session
session_start();

?>

<?php
$conn = mysqli_connect("localhost", "root", "", "pd_membersystem");



if (!isset($_SESSION['loggedIn'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
} else {

    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
}


$credentials_result = mysqli_query($conn, "SELECT * FROM credentials WHERE email = '$email' AND passwords = '$password'");

?>

<?php


if (!isset($_SESSION['loggedIn'])) {
    if (mysqli_num_rows($credentials_result) != 1) {

        $_SESSION['error'] = ".";
        echo "<script> window.location.href= '../index.php'; </script>";
    } else {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['loggedIn'] = true;
    }
}

$user_id = $credentials_result->fetch_assoc()["user_id"];
$_SESSION['user_id'] = $user_id;
$members_result = mysqli_query($conn, "SELECT * FROM members WHERE user_id= $user_id");
$members_row = $members_result->fetch_assoc();
$_SESSION['userRole'] = $members_row["roles"];
$_SESSION['firstName'] = $members_row["first_name"];
$_SESSION['lastName'] = $members_row["last_name"];

if ($_SESSION['userRole'] == "admin") {
    echo "<script> window.location.href= '../admin.php'; </script>";
} else {
    echo "<script> window.location.href= '../message.php'; </script>";
}
?>
