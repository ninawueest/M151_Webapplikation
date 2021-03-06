<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

            <!--registration form-->
            <form class="login100-form validate-form" method="post" action="../php/registration.php">
					<span class="login100-form-title p-b-49">
						Registration
					</span>

                <!--username form-->
                <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is required">
                    <span class="label-input100">Username</span>
                    <input class="input100" type="text" name="perBenutzername" placeholder="Username" required>
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <!--first name form-->
                <div class="wrap-input100 validate-input m-b-23" data-validate = "First name is required">
                    <span class="label-input100">First name</span>
                    <input class="input100" type="text" name="perVorname" placeholder="First name" required>
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <!--last name form-->
                <div class="wrap-input100 validate-input m-b-23" data-validate = "Last name is required">
                    <span class="label-input100">Last name</span>
                    <input class="input100" type="text" name="perNachname" placeholder="Last name" required>
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <!--adress form-->
                <div class="wrap-input100 validate-input m-b-23" data-validate = "Address is required">
                    <span class="label-input100">Address</span>
                    <input class="input100" type="text" name="adrStrassenname" placeholder="Address" required>
                    <span class="focus-input100" data-symbol="&#xf015;"></span>
                </div>

                <!--number form-->
                <div class="wrap-input100 validate-input m-b-23" data-validate = "Number is required">
                    <span class="label-input100">Number</span>
                    <input class="input100" type="text" name="adrHausnummer" placeholder="Number" required>
                    <span class="focus-input100" data-symbol="&#xf015;"></span>
                </div>

                <!--postal code form-->
                <div class="wrap-input100 validate-input m-b-23" data-validate = "Postal code is required">
                    <span class="label-input100">Postal code</span>
                    <input class="input100" type="number" name="ortPostleitzahl" placeholder="Postal code" required>
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <!--city form-->
                <div class="wrap-input100 validate-input m-b-23" data-validate = "City is required">
                    <span class="label-input100">City</span>
                    <input class="input100" type="text" name="ortOrtsbezeichnung" placeholder="City" required>
                    <span class="focus-input100" data-symbol="&#xf64f;"></span>
                </div>

                <!--email form-->
                <div class="wrap-input100 validate-input m-b-23" data-validate = "Email is required">
                    <span class="label-input100">E-Mail</span>
                    <input class="input100" type="email" name="konEmail" placeholder="E-Mail" required>
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <!--password form-->
                <div class="wrap-input100 validate-input m-b-23" data-validate="Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="perPasswort" placeholder="Password" required>
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>

                <!--confirm password form-->
                <div class="wrap-input100 validate-input m-b-40" data-validate="Confirm password">
                    <span class="label-input100">Confirm password</span>
                    <input class="input100" type="password" name="perPasswort2" placeholder="Confirm password" required>
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>


                <!--registration button-->
                <div class="container-login100-form-btn p-b-31">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            Register
                        </button>
                    </div>
                </div>

                <div class="flex-col-c p-t-10">
						<span class="txt1 p-b-17">
							Do you already have an account?
						</span>

                    <!--link to sign in-->
                    <a href="login-view.php" class="txt2">
                        Sign In
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>