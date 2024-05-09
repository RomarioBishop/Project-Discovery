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

        function validateStep1() {
            const firstName = document.getElementById('username1').value.trim();
            const lastName = document.getElementById('username2').value.trim();

            if (firstName === '' || lastName === '') {
                alert('Please fill in both first name and last name.');
            } else if (!/^[A-Za-z]+$/.test(firstName) || !/^[A-Za-z]+$/.test(lastName)) {
                alert("Name should contain only letters");
                return;
            } else {
                document.getElementById('step1').style.opacity = '0';
                setTimeout(function() {
                    document.getElementById('step1').style.display = 'none';
                    document.getElementById('step2').style.opacity = '1';
                    document.getElementById('step2').style.display = 'block';
                }, 500);
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

        function previousStep() {
            document.getElementById('step2').style.opacity = '0';
            setTimeout(function() {
                document.getElementById('step2').style.display = 'none';
                document.getElementById('step1').style.opacity = '1';
                document.getElementById('step1').style.display = 'block';
            }, 500);
        }
    </script>

    <div class="signup-page">
        <div class="index-container">
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
                    <div id="step1" class="step" style="opacity: 1; display: block;">
                        <div class="items">
                            <div class="uname">
                                <label for="username">First Name</label>
                                <input type="text" id="username1" name="firstname" required autocomplete="off" ">
                            </div>

                            <div class=" uname">
                                <label for="username">Last Name</label>
                                <input type="text" id="username2" name="lastname" required autocomplete="off" ">
                            </div>


                        </div>


                        <div class=" error">
                                <?php

                                if (isset($_SESSION['error'])) {
                                    echo "<p id='error'>Passwords do not match!<p>";
                                    session_unset();
                                }

                                ?>

                            </div>



                            <div class="bottom">

                                <button type="button" onclick="validateStep1()" class="set-pointer"> Next </button>
                                <input type="button" value="Go Back to Login" onclick="history.back()" class="signup-page-input-button">
                            </div>

                        </div>
                        <div id="step2" class="step" style="opacity: 0; display: none;">
                            <div class="items">
                                <div class="uname">
                                    <label for="username">Email</label>
                                    <input type="email" id="username" name="email" required autocomplete="off">
                                </div>

                                <div class="pass">
                                    <label for="password">Password - maximum 16 characters</label>
                                    <input type="password" id="password" name="password" maxlength="16" required>

                                    <div class="showPasswordDiv">
                                        <label id="showpass" for="showPass">Show Password</label>
                                        <input type="checkbox" id="showpass" onclick="showPass()">
                                    </div>

                                </div>

                                <div class="pass">
                                    <label for="password">Re-Type password</label>
                                    <input type="password" id="password2" name="password2" maxlength="16" required>

                                    <div class="showPasswordDiv">
                                        <label id="showpass" for="showPass">Show Password</label>
                                        <input type="checkbox" id="showpass" onclick="showPass2()">
                                    </div>

                                </div>

                            </div>

                            <div class="bottom">
                                <input type="submit" value="Sign Up">
                                <button type="button" onclick="previousStep()"> Go back </button>

                            </div>

                        </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>