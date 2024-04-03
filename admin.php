<?php
//start session
session_start();

?>

<?php
$conn = mysqli_connect("localhost", "root", "", "pd_membersystem");




if (!isset($_SESSION['loggedIn'])) {

    $_SESSION['error'] = true;
    echo "<script> window.location.href= 'index.php'; </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>