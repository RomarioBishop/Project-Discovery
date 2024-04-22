<?php
//start session
session_start();

?>

<?php
$conn = mysqli_connect("localhost", "root", "", "pd_membersystem");




if (!isset($_SESSION['loggedIn']) || $_SESSION['userRole'] !== "Admin") {
    $_SESSION['error'] = ".";
    echo "<script> window.location.href= 'index.php'; </script>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/x-icon" href="./Images/Favicon/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <meta name="author" content="Ode Millington">
    <meta name="author" content="Romario Bishop">
    <title>WeWaffle | Messaging</title>
    <script src="https://kit.fontawesome.com/10a23fabac.js" crossorigin="anonymous"></script>
</head>

<body class="main-body">



    <?php
    if (!isset($_SESSION['animation-played'])) :
    ?>

        <div id="loader">
            <svg id="logo" width="789" height="113" viewBox="0 0 789 113" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M782.528 7.79067L784.442 4.13199H780.313H765.769H764.206L763.522 5.53693L741.001 51.7565L718.481 5.53694L717.796 4.13199H716.233H701.689H697.552L699.476 7.79467L732.021 69.7447V107V109.5H734.521H747.625H750.125V107V69.7423L782.528 7.79067Z" stroke="white" stroke-width="5" />
                <path d="M673.12 108.258L673.843 109.5H675.28H690.976H695.389L693.12 105.715L669.642 66.5401C676.456 64.5063 681.848 61.0103 685.627 55.9458C690.001 50.2141 692.18 43.5836 692.18 36.152C692.18 30.0916 690.788 24.606 687.948 19.7665C685.074 14.8701 680.742 11.0544 675.094 8.27982C669.474 5.47197 662.685 4.13199 654.832 4.13199H622.432H619.932V6.63199V107V109.5H622.432H635.536H638.036V107V68.46H649.939L673.12 108.258ZM669.099 24.1455L669.112 24.1573L669.124 24.1688C672.044 26.8522 673.644 30.7238 673.644 36.152C673.644 41.4565 672.058 45.48 669.06 48.4841C666.144 51.3137 661.558 52.948 654.832 52.948H638.036V19.932H654.832C661.714 19.932 666.297 21.4992 669.099 24.1455Z" stroke="white" stroke-width="5" />
                <path d="M600.784 50.84V48.34H598.284H564.208V19.788H602.604H605.104V17.288V6.48801V3.98801H602.604H548.604H546.104V6.48801V107V109.5H548.604H602.604H605.104V107V96.2V93.7H602.604H564.208V64.14H598.284H600.784V61.64V50.84Z" stroke="white" stroke-width="5" />
                <path d="M536.574 7.51458L537.85 4.13199H534.235H520.411H518.661L518.062 5.77606L488.875 85.874L459.688 5.77606L459.089 4.13199H457.339H443.371H439.756L441.032 7.51458L478.904 107.883L479.514 109.5H481.243H496.363H498.092L498.702 107.883L536.574 7.51458Z" stroke="white" stroke-width="5" />
                <path d="M356.858 103.695L356.868 103.701L356.878 103.707C364.954 108.249 373.876 110.508 383.592 110.508C393.399 110.508 402.37 108.252 410.45 103.707L410.46 103.701L410.47 103.695C418.541 99.0546 424.908 92.6349 429.542 84.4746C434.194 76.2834 436.492 67.0179 436.492 56.744C436.492 46.47 434.194 37.2045 429.542 29.0134C424.907 20.8519 418.537 14.4767 410.46 9.93081C402.38 5.28717 393.405 2.97998 383.592 2.97998C373.87 2.97998 364.944 5.28946 356.868 9.93084C348.788 14.4784 342.374 20.9012 337.647 29.1488L337.647 29.1488L337.642 29.1574C332.992 37.3449 330.692 46.5614 330.692 56.744C330.692 66.927 332.993 76.1862 337.636 84.4631L337.645 84.479L337.654 84.4947C342.382 92.6441 348.792 99.0573 356.858 103.695ZM401.208 89.5699L401.2 89.5745L401.192 89.5792C396.04 92.5994 390.195 94.132 383.592 94.132C376.993 94.132 371.095 92.6009 365.84 89.5745C360.701 86.5597 356.602 82.2571 353.543 76.5943C350.597 70.9626 349.084 64.3693 349.084 56.744C349.084 49.0127 350.601 42.4255 353.54 36.901C356.6 31.2316 360.703 26.9251 365.848 23.9087C370.995 20.8917 376.886 19.356 383.592 19.356C390.298 19.356 396.189 20.8917 401.336 23.9087C406.476 26.9221 410.526 31.2216 413.489 36.88L413.501 36.9011L413.512 36.9221C416.539 42.4421 418.1 49.0212 418.1 56.744C418.1 64.3639 416.542 70.9518 413.504 76.5807L413.497 76.5943L413.489 76.608C410.531 82.2553 406.442 86.5536 401.208 89.5699Z" stroke="white" stroke-width="5" />
                <path d="M245.335 9.79273L245.335 9.7927L245.324 9.79956C237.345 14.4456 231.032 20.9164 226.404 29.1632C221.757 37.3492 219.458 46.5638 219.458 56.744C219.458 66.9266 221.758 76.1431 226.408 84.3306C231.038 92.483 237.35 98.9018 245.324 103.544L245.34 103.554L245.356 103.563C253.432 108.105 262.354 110.364 272.07 110.364C283.424 110.364 293.454 107.669 302.066 102.198L302.075 102.193L302.084 102.187C310.712 96.6041 316.988 88.7341 320.911 78.6764L322.24 75.268H318.582H302.886H301.284L300.615 76.7226C298.022 82.356 294.309 86.6199 289.48 89.6062C284.762 92.4879 278.996 93.988 272.07 93.988C265.467 93.988 259.622 92.4554 254.47 89.4352C249.321 86.4172 245.273 82.16 242.312 76.6008C239.363 70.9677 237.85 64.3723 237.85 56.744C237.85 49.0097 239.367 42.4205 242.309 36.8946L242.312 36.8873L242.316 36.88C245.28 31.2216 249.33 26.9221 254.47 23.9087C259.622 20.8886 265.467 19.356 272.07 19.356C278.985 19.356 284.743 20.8992 289.458 23.8676L289.466 23.8731L289.475 23.8785C294.306 26.865 298.021 31.1299 300.615 36.7654L301.284 38.22H302.886H318.582H322.227L320.914 34.8195C316.994 24.6674 310.718 16.7441 302.084 11.1571C293.47 5.58322 283.433 2.836 272.07 2.836C262.344 2.836 253.414 5.14743 245.335 9.79273Z" stroke="white" stroke-width="5" />
                <path d="M155.256 106.821L155.281 106.832L155.306 106.843C160.945 109.304 167.245 110.508 174.162 110.508C181.4 110.508 187.816 109.099 193.33 106.186C198.763 103.316 202.967 99.5148 205.826 94.7502C208.644 90.0535 210.07 85.0027 210.07 79.64C210.07 72.951 208.551 67.3516 205.222 63.1276C202.109 59.0847 198.33 56.076 193.89 54.1681C189.698 52.2737 184.242 50.4134 177.568 48.5754C172.153 47.0554 167.976 45.7398 165.005 44.6283C162.38 43.5204 160.159 41.9639 158.313 39.9566C156.781 38.1948 155.926 35.8478 155.926 32.696C155.926 28.2398 157.402 25.0712 160.178 22.8349L160.195 22.8218L160.21 22.8085C163.126 20.3792 166.984 19.068 172.002 19.068C177.43 19.068 181.515 20.4401 184.508 22.9483L184.524 22.9612L184.539 22.9739C187.687 25.5263 189.296 28.337 189.681 31.4221L189.955 33.612H192.162H206.562H209.321L209.05 30.8663C208.216 22.4266 204.477 15.5581 197.88 10.4245C191.391 5.29875 183.126 2.836 173.298 2.836C166.474 2.836 160.305 4.04118 154.843 6.51461L154.835 6.51832L154.826 6.5221C149.449 9.00381 145.185 12.5615 142.123 17.2082C139.047 21.8741 137.534 27.2087 137.534 33.128C137.534 39.7257 139.006 45.2957 142.204 49.5958L142.225 49.6248L142.248 49.6531C145.36 53.5957 149.088 56.5514 153.429 58.4571L153.439 58.4615L153.449 58.4659C157.639 60.2616 163.097 62.0255 169.779 63.769C175.109 65.1969 179.277 66.5121 182.318 67.71C185.141 68.8223 187.444 70.4247 189.277 72.5076C190.91 74.3632 191.822 76.8556 191.822 80.216C191.822 84.398 190.304 87.737 187.213 90.4226C184.247 92.9872 180 94.42 174.162 94.42C168.032 94.42 163.743 92.9383 160.902 90.3491C157.984 87.5039 156.333 84.0751 155.913 79.9622L155.684 77.716H153.426H139.458H136.914L136.958 80.2599C137.063 86.2011 138.741 91.5419 142.022 96.1999L142.03 96.211L142.038 96.222C145.295 100.739 149.731 104.263 155.256 106.821Z" stroke="white" stroke-width="5" />
                <path d="M122.505 6.63199V4.13199H120.005H106.901H104.401V6.63199V107V109.5H106.901H120.005H122.505V107V6.63199Z" stroke="white" stroke-width="5" />
                <path d="M65.8112 103.337L65.822 103.332C74.3071 99.0895 80.8298 92.9905 85.3108 85.049C89.8791 77.0271 92.116 67.6588 92.116 57.032C92.116 46.4081 89.8803 37.0419 85.3145 29.0215C80.8389 20.9905 74.3221 14.8416 65.8381 10.5959C57.4484 6.25325 47.5864 4.13199 36.336 4.13199H5.08801H2.58801V6.63199V107V109.5H5.08801H36.336C47.5769 109.5 57.4285 107.478 65.8112 103.337ZM64.0639 29.543L64.07 29.5493L64.0761 29.5555C70.4115 35.9789 73.724 45.0244 73.724 57.032C73.724 68.9447 70.4589 77.8901 64.2262 84.2143C58.0227 90.4139 48.8642 93.7 36.336 93.7H20.692V19.788H36.336C48.7472 19.788 57.8538 23.158 64.0639 29.543Z" stroke="white" stroke-width="5" />
            </svg>

        </div>

        <script>
            //finding the size of the svg letters 
            const logo = document.querySelectorAll("#logo path");

            for (let i = 0; i < logo.length; i++) {
                console.log(`Letter ${i} is ${logo[i].getTotalLength()}`);

            }

            //removes page loader animation div after a set amount of miliseconds
            const loader = document.getElementById("loader");

            loader.addEventListener("animationend", () => {
                setTimeout(() => {
                    loader.remove();
                }, 1500);
            });
        </script>

    <?php
        $_SESSION['animation-played'] = '.';
    endif;
    ?>


    <div class="container">

        <aside class="sidebar">
            <nav>
                <div class="logo-name">
                    <img src="images/logo.png" alt="company logo">
                    <p>Project<span style="color:#567de8;;">Discovery </span></p>
                </div>
                <div class="userProfile">
                    <div class="ProfileBox">
                        <?php echo strtoupper(substr($_SESSION['firstName'], 0, 2))  ?>
                    </div>

                    <div class="username">
                        <p id="displayName">
                            <?php echo $_SESSION['firstName'] ?>
                        </p>
                        <p id="displayRole">
                            <?php echo $_SESSION['userRole'] ?>
                        </p>
                    </div>
                </div>
                <div class="menu-items">
                    <ul class="top-items">
                        <li><a href="enter_payments.php">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <span class="link-name active-page">Enter Payments</span>
                            </a>
                        </li>
                        <li><a href="enter_service.php">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <span class="link-name">Enter Hours</span>
                            </a>
                        </li>
                        <li><a href="changes_logs.php">
                                <i class="fa-solid fa-gear"></i>
                                <span class="link-name">Changes Logs</span>
                            </a>
                        </li>
                        <li><a href="subscriptions_logs.php">
                                <i class="fa-solid fa-gear"></i>
                                <span class="link-name">Subscriptions Logs</span>
                            </a>
                        </li>
                        <li><a href="service_logs.php">
                                <i class="fa-solid fa-gear"></i>
                                <span class="link-name">Service Logs</span>
                            </a>
                        </li>
                    </ul>

                    <ul class="logout-mode">
                        <li><a href="logout.php">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span class="link-name"> Logout</span>
                            </a>
                        </li>
                        <li class="mode">
                            <i class="fa-solid fa-cloud-moon"></i>
                            <span class="link-name"> Light Mode</span>

                            <div class="mode-toggle">
                                <span class="switch"></span>
                            </div>
                        </li>


                    </ul>
                </div>
            </nav>
            <script defer>
                const body = document.querySelector("body"),
                    modeToggle = document.querySelector(".mode-toggle");

                modeToggle.addEventListener("click", () => {
                    body.classList.toggle("dark");

                });
            </script>
        </aside>
        <main class="page-main">

            <div class="page-heading">
                <p>Enter Member Payments</p>
                <p class="sub-heading">Update member subscription status</p>
            </div>


            <div class="page-formCrt">
                <form id="payment-form" action="enter-payments.php" method="post" onsubmit="event.preventDefault(); showPaymentConfirmation();">
                    <div class="payment-page-settings-formCrt-top">
                        <h2 class="payment-page-heading">Payment Form</h2>
                    </div>
                    <div class="payment-page-uneditable">
                        <div class="payment-page-member-name-form">
                            <label for="payment-page-first-name" class="payment-page-name-title">First Name</label>
                            <input type="text" id="payment-page-first-name" name="first_name" required class="payment-page-input-text" placeholder="Enter Member's First Name Correctly">
                        </div>
                        <div class="payment-page-member-name-form">
                            <label for="payment-page-last-name" class="payment-page-name-title">Last Name</label>
                            <input type="text" id="payment-page-last-name" name="last_name" required class="payment-page-input-text" placeholder="Enter Member's Last Name Correctly" style="margin-right: 50px;">
                        </div>
                        <div class="payment-page-member-name-form">
                            <label for="payment-page-payment-amount" class="payment-page-name-title">Select Payment Amount</label>
                            <select name="payment_amount" id="payment-page-payment-amount" required class="payment-page-select" style="padding-right: 10px;">
                                <option value="" disabled selected>Select an amount</option>
                                <?php
                                // Generate dropdown options for payment amounts in increments of $5 up to $100
                                for ($i = 5; $i <= 100; $i += 5) {
                                    echo "<option value='$i'>$ $i</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="payment-page-member-name-form">
                            <label for="payment-page-payment-date" class="payment-page-name-title">Select Payment Date</label>
                            <input type="month" id="payment-page-payment-date" name="payment_date" required class="payment-page-input-month">
                        </div>
                        <div class="payment-page-bottom">
                            <input type="submit" value="Enter" class="payment-page-input-submit">
                            <input type="button" value="Go Back" onclick="history.back()" class="payment-page-input-button">
                        </div>
                    </div>
                    <div id="confirmation-box" class="confirmation-box">
                        <div class="confirmation-content">
                            <h3>Confirm Payment</h3>
                            <p>First Name: <span id="confirm-first-name"></span></p>
                            <p>Last Name: <span id="confirm-last-name"></span></p>
                            <p>Payment Amount: <span id="confirm-amount"></span></p>
                            <p>Payment Date: <span id="confirm-date"></span></p>
                            <br />
                            <div class="confirmation-buttons">
                                <button class="turn-red" type="button" onclick="submitPayment()">Confirm</button>
                                <button type="button" onclick="cancelPayment()">Cancel</button>
                            </div>
                        </div>
                    </div>



                </form>
                <script defer>
                    function showPaymentConfirmation() {
                        let firstName = document.getElementById("payment-page-first-name").value;
                        let lastName = document.getElementById("payment-page-last-name").value;
                        let amount = document.getElementById("payment-page-payment-amount").value;
                        let date = document.getElementById("payment-page-payment-date").value;

                        document.getElementById("confirm-first-name").textContent = firstName;
                        document.getElementById("confirm-last-name").textContent = lastName;
                        document.getElementById("confirm-amount").textContent = amount;
                        document.getElementById("confirm-date").textContent = date;

                        document.getElementById("confirmation-box").style.display = "block";
                    }

                    function submitPayment() {
                        document.getElementById("payment-form").submit();
                    }

                    function cancelPayment() {
                        document.getElementById("confirmation-box").style.display = "none";
                    }
                </script>
            </div>

        </main>

    </div>

</body>

</html>