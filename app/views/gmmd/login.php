<?php $this->view('/partials/header', $data); ?>
<!doctype html>
<html lang="en">

<body>
<div class="container" align="center">
    <main style="width: 50%; text-align: center">
        <h2 class="title">Log into your Account</h2>
        <?php
        show_error();
        ?>
        <div class="account-detail">
            <div class="billing-detail">
                <form class="checkout-form" method="post">
                    <div class="form-group">
                        <label for="username" align="left">User Name (case-sensitive)</label>
                        <input type="text" id="username" name="username" value="<?= $_POST['username']??''?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password" align="left">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <a href="<?= ROOT?>forgot-password" align="left" class="form-group">Forgot Password</a>
                    <div class="form-group">
                        <label></label>
                        <input type="submit" id="login" value="LOGIN">
                    </div>
                    <div style="padding-top: 20px;">
                        Are you a new user? <a href="<?=ROOT ?>register"> Register</a>
                    </div>
                </form>
            </div>
        </div>
    </main> <!-- Main Area -->
</div>

</body>

</html>

<?php $this->view('/partials/footer', $data); ?>

