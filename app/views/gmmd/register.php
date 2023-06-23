<!doctype html>
<html lang="en">
<?php
$this->view('/partials/header', $data);
?>
<body>
<div class="container">
    <main style="width: 80%;">
        <div class="account-detail">
            <div class="billing-detail">
                <form class="checkout-form" method="post" name="form1">
                    <h2 class="title" align="center">Create New Account</h2>
                    <?php
                    show_error();
                    ?>
                    <div class="form-inline">
                        <div class="form-group">
                            <label for="username">User Name (Required)</label>
                            <input type="text" id="username" name="username" value="<?=  $_POST['username'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="age">Age (Required)</label>
                            <input type="number" id="age" name="age" min="18" value="<?=  $_POST['age'] ?? '' ?>"></div>
                    </div>
                    <div class="form-inline">
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" id="fname" name="f_name" placeholder="E.g. Bisrat" value="<?=  $_POST['fname'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" id="lname" name="l_name" placeholder="E.g. Kebere" value="<?=  $_POST['lname'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="E.g dev@bisrat.tech" value="<?=  $_POST['email'] ?? '' ?>">
                        </div>
                    </div>

                    <div class="form-inline">
                        <div class="form-group">
                            <label>Password ()</label>
                            <input type="password" id="password" name="password"
                                   placeholder="+8 characters lower, UPPER, Speci@l and Number ">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password (Required)</label>
                            <input type="password" id="confirm_password" name="confirm_password"
                                   placeholder="Repeat your Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="register"></label>
                        <input type="submit" id="register" value="REGISTER">
                    </div>
                </form>
                <div style="padding-top: 20px;">
                    Already Have an Account? <a href="<?= ROOT ?>login">login</a>
                </div>
            </div>
        </div>
    </main> <!-- Main Area -->
</div>

</body>
<?php $this->view('/partials/footer', $data); ?>


</html>

