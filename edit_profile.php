<?php
require_once("globals.php");
require_once("models/User.php");
require_once("dao/UserDAO.php");
require_once("templates/head.php");
require_once("templates/header.php");

$user = new User();
$userDAO = new UserDAO($conn, $BASE_URL);
$userData = $userDAO->verifyToken(true);
$fullName = $user->getFullName($userData);

if ($userData->image == "") {
    $userData->image = "user.png";
}
?>

<body onload="loadPage()">
    <div id="main-container" class="container-fluid edit-profile-page">
        <div class="col-md-12">
            <form action="<?= $BASE_URL ?>user_process.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="type" value="update">
                <div class="row">
                    <div class="col-md-4">
                        <h1>Hi, <?= $fullName ?></h1>
                        <p class="page-description">Change your info.</p>
                        <div class="form-group">
                            <label for="name" class="label-edit-profile">
                                <p class="p-edit-profile">Name:</p>
                            </label>
                            <input type="text" class="form-control input-edit-profile" id="name" name="name" placeholder="Type your name..." value="<?= $userData->name ?>">
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="label-edit-profile">
                                <p class="p-edit-profile">Lastname:</p>
                            </label>
                            <input type="text" class="form-control input-edit-profile" id="lastname" name="lastname" placeholder="Type your lastname..." value="<?= $userData->lastname ?>">
                        </div>
                        <div class="form-group">
                            <label for="email" class="label-edit-profile">
                                <p class="p-edit-profile">E-mail:</p>
                            </label>
                            <input type="text" readonly class="form-control input-edit-profile disabled" id="email" name="email" placeholder="Type your email..." value="<?= $userData->email ?>">
                        </div>
                        <input type="submit" class="btn card-btn" value="Change Name">
                    </div>
                    <div class="col-md-4">
                        <div id="profile-image-container" style="background-image: url('<?= $BASE_URL ?>img/users/<?= $userData->image ?>');"></div>
                        <div class="form-group">
                            <label for="image" class="label-edit-profile">
                                <p class="p-edit-profile">Image:</p>
                            </label>
                            <input type="file" class="form-control input-edit-profile-file" id="name" name="image">
                        </div>
                        <div class="form-group">
                            <label for="bio" class="label-edit-profile">
                                <p class="p-edit-profile">About You:</p>
                            </label>
                            <textarea class="form-control input-edit-profile" name="bio" id="bio" rows="5" placeholder="Tell me about you, about your job, what you like to do..."><?= $userData->bio ?></textarea>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row" id="change-password-container">
                <div class="col-md-4">
                    <h2>Change Password</h2>
                    <p class="page-description">Create your new password</p>
                    <form action="<?= $BASE_URL ?>user_process.php" method="POST">
                        <input type="hidden" name="type" value="changepassword">
                        <div class="form-group">
                            <label for="password" class="label-edit-profile">
                                <p class="p-edit-profile">Password:</p>
                            </label>
                            <input type="password" class="form-control input-edit-profile" id="password" name="password" placeholder="Type your password">
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword" class="label-edit-profile">
                                <p class="p-edit-profile">Confirm Password:</p>
                            </label>
                            <input type="password" class="form-control input-edit-profile" id="confirmpassword" name="confirmpassword" placeholder="Type your confirmpassword">
                        </div>
                        <input type="submit" class="btn card-btn" value="Change Password">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("templates/footer.php"); ?>
</body>