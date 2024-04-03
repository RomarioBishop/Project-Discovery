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

        /*for transition for signup form*/
        .step {
            transition: opacity 0.5s ease-in-out;
            position: absolute;
            left: 0;
            right: 0;
            margin: auto;
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

        function showPass2() {
            let pass = document.getElementById("password2");
            if (pass.type === "password") {
                pass.type = "text";
            } else {
                pass.type = "password";
            }
        }

        function nextStep() {
            document.getElementById('step1').style.opacity = '0';
            setTimeout(function() {
                document.getElementById('step1').style.display = 'none';
                document.getElementById('step2').style.opacity = '1';
                document.getElementById('step2').style.display = 'block';
            }, 500);
        }
    </script>

    <div class="login-page">
        <div class="container">
            <div class="info">

                <div>
                    <p id="companyName">Project Discovery</p>
                </div>

                <div>
                    <p id="welcome">Sign Up Here!</p>
                </div>

            </div>

            <div class="form-crt">
                <form action="includes/signup_validation.php" method="post">
                    <div class="items">
                        <div class="uname">
                            <label for="username">Email</label>
                            <input type="text" id="username" name="email" required autocomplete="off">
                        </div>
                        <div class="pass">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password">

                            <div class="showPasswordDiv">
                                <label id="showpass" for="showPass">Show Password</label>
                                <input type="checkbox" id="showpass" onclick="showPass()">
                            </div>

                        </div>

                        <div class="pass">
                            <label for="password">Re-Type password</label>
                            <input type="password" id="password2" name="password2">

                            <div class="showPasswordDiv">
                                <label id="showpass" for="showPass">Show Password</label>
                                <input type="checkbox" id="showpass" onclick="showPass2()">
                            </div>

                        </div>

                    </div>

                    <div class="bottom">

                        <div class="error">
                            <?php

                            if (isset($_SESSION['error'])) {
                                echo "<p id='error'>Passwords do not match!<p>";
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

</html>