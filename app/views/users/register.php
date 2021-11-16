<?php

    require APPROOT . "/views/includes/header.php";

?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5 mb-5">
            <h2>Create an Account</h2>
            <p>Please fill out this form to register with us</p>
            <form action="<?php echo URLROOT; ?>/users/register" method="POST">
                <div class="form-group">
                    <label for="name">Name: <sup>*</sup></label>
                    <input type="text" name="name" class="form-control form-control-lg
                     <?php echo (!empty($data["name_err"])) ? "is-invalid" : ""; ?>"
                     value="<?php echo $data["name"]; ?>">
                     <span class="invalid-feedback"><?php echo $data["name_err"]; ?></span>
                </div>
                <div class="form-group">
                    <label for="name">Email: <sup>*</sup></label>
                    <input type="text" name="email" class="form-control form-control-lg
                     <?php echo (!empty($data["email_err"])) ? "is-invalid" : ""; ?>"
                     value="<?php echo $data["email"]; ?>">
                     <span class="invalid-feedback"><?php echo $data["email_err"]; ?></span>
                </div>
                <div class="form-group">
                    <label for="name">Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg
                     <?php echo (!empty($data["password_err"])) ? "is-invalid" : ""; ?>"
                     value="<?php echo $data["password"]; ?>">
                     <span class="invalid-feedback"><?php echo $data["password_err"]; ?></span>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                    <input type="password" name="confirm_password" class="form-control form-control-lg
                     <?php echo (!empty($data["confirm_password_err"])) ? "is-invalid" : ""; ?>"
                     value="<?php echo $data["confirm_password"]; ?>">
                     <span class="invalid-feedback"><?php echo $data["confirm_password_err"]; ?></span>
                </div>
                <div class="d-grid gap-2 mt-3">
                 <input type="submit" value="Register" class="btn btn-success">
                 <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-link">Have an account? Login</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

require APPROOT . '/views/includes/footer.php';

?>
