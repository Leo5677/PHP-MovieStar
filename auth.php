<?php
require_once("templates/head.php");
require_once("templates/header.php");
?>

<body onload="loadPage()">
    <div id="main-container" class="container-fluid">
        <div class="col-md-12">
            <div class="row" id="auth-row">
                <div class="col-md-4" id="login-container">
                    <h2>Sign In</h2>
                    <form action="<?= $BASE_URL ?>auth_process.php" method="POST">
                        <input type="hidden" name="type" value="login">
                        <div class="form-group">
                            <label for="email" class="label-login">
                                <p class="p-login">E-mail:</p>
                            </label>
                            <input type=" email" class="form-control input-login" id="email" name="email" placeholder="Type your e-mail here...">
                        </div>
                        <div class="form-group">
                            <label for="password" class="label-login">
                                <p class="p-login">Password:</p>
                            </label>
                            <input type="password" class="form-control input-login" id="password" name="password" placeholder="Type your password here...">
                        </div>
                        <input type="submit" class="btn card-btn" value="Login">
                    </form>
                </div>
                <div class="col-md-4" id="register-container">
                    <h2>Sign Up</h2>
                    <form action="<?= $BASE_URL ?>auth_process.php" method="POST">
                        <input type="hidden" name="type" value="register">
                        <div class="form-group">
                            <label for="email" class="label-register">
                                <p class="p-register">E-mail:</p>
                            </label>
                            <input type="email" class="form-control input-register" id="email" name="email" placeholder="Type your e-mail here...">
                        </div>
                        <div class="form-group">
                            <label for="name" class="label-register">
                                <p class="p-register">Name:</p>
                            </label>
                            <input type="name" class="form-control input-register" id="name" name="name" placeholder="Type your name here...">
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="label-register">
                                <p class="p-register">Last Name:</p>
                            </label>
                            <input type="lastname" class="form-control input-register" id="lastname" name="lastname" placeholder="Type your last name here...">
                        </div>
                        <div class="form-group">
                            <label for="password" class="label-register">
                                <p class="p-register">Password:</p>
                            </label>
                            <input type="password" class="form-control input-register" id="password" name="password" placeholder="Type your password here...">
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword" class="label-register">
                                <p class="p-register">Confirm Password:</p>
                            </label>
                            <input type="password" class="form-control input-register" id="confirmpassword" name="confirmpassword" placeholder="Confirm your password...">
                        </div>
                        <input type="submit" class="btn card-btn" value="Create Account">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require_once("templates/footer.php"); ?>