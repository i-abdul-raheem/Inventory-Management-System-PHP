<?php
$active = "settings";
$titleButton = false;
$titleIcon = "";
$titleText = "";
require("./components/titlebar.php");
require("./components/card.php");
require("./components/header.php");
require("./components/sidebar.php");
?>
<div class="container-fluid">
    <?php titleBar("Settings"); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update username</h6>
        </div>
        <div class="card-body">
            <form class="custom-row" id="update-username">
                <div class="mb-3 input-label">
                    <label for="username" class="form-label">Username<super style="color:red;">*</super></label>
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo $_SESSION['username']; ?>" required />
                </div>
                <div class="mb-3 label-button">
                    <input class="btn btn-primary" type="submit" value="Update">
                </div>
                <p id="username-status"></p>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update email</h6>
        </div>
        <div class="card-body">
            <form class="custom-row" id="update-email">
                <div class="mb-3 input-label">
                    <label for="email" class="form-label">Email Address<super style="color:red;">*</super></label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $_SESSION['user_email']; ?>" required />
                </div>
                <div class="mb-3 label-button">
                    <input class="btn btn-primary" type="submit" value="Update">
                </div>
                <p id="email-status"></p>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update password</h6>
        </div>
        <form class="card-body" id="update-password">
            <div class="mb-3 input-label">
                <label for="password0" class="form-label">Old password<super style="color:red;">*</super></label>
                <input type="password" class="form-control" name="oldPassword" id="password0" required />
            </div>
            <div class="mb-3 input-label">
                <label for="password1" class="form-label">New password<super style="color:red;">*</super></label>
                <input type="password" class="form-control" name="newPassword" id="password1" required />
            </div>
            <div class="mb-3 input-label">
                <label for="password2" class="form-label">Confirm password<super style="color:red;">*</super></label>
                <input type="password" class="form-control" name="confirmPassword" id="password2" required />
            </div>
            <input class="btn btn-primary" type="submit" value="Update">
            <p id="password-status"></p>
        </form>
    </div>
</div>
</div>
</div>
<?php
require("./components/footer.php");
?>

<script src="js/main.js"></script>