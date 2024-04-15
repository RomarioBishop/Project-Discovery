<?php
//start session
session_start();

?>

<?php
$conn = mysqli_connect("localhost", "root", "", "pd_membersystem");



if (!isset($_SESSION['loggedIn'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $credentials_result = mysqli_query($conn, "SELECT * FROM credentials WHERE email = '$email'");
    if (mysqli_num_rows($credentials_result) != 1) {

        $_SESSION['error'] = ".";
        echo "<script> window.location.href= '../index.php'; </script>";
        die();
    } else {
        $credentials_row = $credentials_result->fetch_assoc();
        $database_password = $credentials_row['passwords'];
        if (password_verify($password, $database_password)) {
            $_SESSION['loggedIn'] = true;
            $user_id = $credentials_row["user_id"];
            $_SESSION['user_id'] = $user_id;
            $members_result = mysqli_query($conn, "SELECT * FROM members WHERE user_id= $user_id");
            $members_row = $members_result->fetch_assoc();
            $_SESSION['userRole'] = $members_row["roles"];
            $_SESSION['firstName'] = $members_row["first_name"];
            $_SESSION['lastName'] = $members_row["last_name"];

            if ($_SESSION['userRole'] == "Admin") {
                echo "<script> window.location.href= '../admin.php'; </script>";
            } else {
                echo "<script> window.location.href= '../member.php'; </script>";
            }
        } else {
            $_SESSION['error'] = ".";
            echo "<script> window.location.href= '../index.php'; </script>";
            die();
        }
    }
}
