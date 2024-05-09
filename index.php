<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/x-icon" href="./Images/Favicon/favicon.ico">
    <meta name="author" content="Ode Millington">
    <meta name="author" content="Romario Bishop">
    <meta name="author" content="Darsarean Meanvielle">
    <title>Project Discovery | Login</title>

    <style>
        #error {
            font-family: 'Montserrat', sans-serif;
            color: crimson;
            font-weight: bold;
            text-align: center;
        }
    </style>

</head>

<body>

    <?php

    session_destroy();

    ?>

    <script defer>
        function showPass() {
            let pass = document.getElementById("password");
            if (pass.type === "password") {
                pass.type = "text";
            } else {
                pass.type = "password";
            }
        }
    </script>

    <style>
        /* Style for the timeout message */
        #timeoutMessage {
            background-color: #f2dede;
            color: #a94442;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
            z-index: 9999;
            /* Initially hidden */
        }
    </style>




    <div class="login-page">
        <div class="index-container">
            <?php
            if (isset($_SESSION['login_attempts'])) {
                if ($_SESSION['login_attempts'] >= 1) {
                    // Display timeout message
                    echo "<div id='timeoutMessage'>failed login attempt. Please try again in 5 seconds.</div>";
                }
            }
            ?>

            <div class="info">

                <div>
                    <p id="companyName">Project Discovery</p>
                </div>

                <div>
                    <p id="welcome">Login Here</p>
                </div>

            </div>

            <div class="form-crt">
                <form action="includes/login_validation.php" method="post">
                    <div class="items">
                        <div class="uname">
                            <label for="username">Email</label>
                            <input type="email" id="username" name="email" required autocomplete="off">
                        </div>
                        <div class="pass">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password">

                            <div class="showPasswordDiv">
                                <label id="showpass" for="showPass">Show Password</label>
                                <input type="checkbox" id="showpass" onclick="showPass()">
                            </div>

                        </div>
                        <div class="gosignup">
                            <p>Don't have an account? <a style="font-weight:bold" href="signup.php"> REGISTER HERE </a></p>

                        </div>
                    </div>

                    <div class="bottom">

                        <div class="error">
                            <?php

                            if (isset($_SESSION['error'])) {
                                echo "<p id='error'>Invalid Username/Password <p>";
                                session_unset();
                            }

                            ?>

                        </div>

                        <input type="submit" value="Login">
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
<script defer>
    // JavaScript to hide the timeout message after 10 seconds

    setTimeout(function() {
        document.getElementById('timeoutMessage').style.display = 'none';
    }, 5000);
</script>

</html>