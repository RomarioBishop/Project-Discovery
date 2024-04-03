<?php
session_start();
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST['firstname']);
    $lastName = trim($_POST['lastname']);
    $email = trim($_POST["email"]);
    $password = trim($_POST['password']);
    $password2 = trim($_POST['password2']);
    if ($password == $password2) {

        $options = [
            'cost' => 12
        ];

        /* Encrypts the user password*/
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $options);

        $conn = mysqli_connect("localhost", "root", "", "pd_membersystem");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }


        $sql1 = "INSERT INTO members (first_name, last_name, roles) values ('$firstName','$lastName','Member')";
        mysqli_query($conn, $sql1);

        /*This takes the last auto generated user_Id for insterting as a foreign key */
        $last_id = mysqli_insert_id($conn);

        $sql2 = "INSERT INTO credentials (user_id, email, passwords ) values ($last_id,'$email','$password_hashed')";
        mysqli_query($conn, $sql2);
        header("location: ../google.php");
    } else {
        $_SESSION["error"] = ".";
        echo "<script> window.location.href= '../signup.php'; </script>";
    }
} else {
    header("location: ../index.php");
}
