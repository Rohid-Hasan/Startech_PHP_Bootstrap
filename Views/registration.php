<?php include '../include/header.php'; ?>

<?php include '../Controller/registrationController.php'; ?>


<link rel="stylesheet" href="../assests/CSS/login.css">
<div class="container">
    <div class="my-content">
        <h5 class="font-weight-bold">Register Account</h5>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="d-flex" style="margin-top:1em;">
                <div class="form-group">
                    <label for="FirstName">First Name</label>
                    <input type="text" class="form-control form-control-sm" name="firstName">
                    <?php if (isset($firstNameErr)) { ?>
                        <p style="color: red;"><?php echo $firstNameErr ?></p>
                    <?php   } ?>
                </div>
                <div class="form-group" style="margin-left:2em;">
                    <label for="lastName">
                        Last Name</label>
                    <input type="text" class="form-control form-control-sm" name="lastName">
                    <?php if (isset($lastNameErr)) { ?>
                        <p style="color: red;"><?php echo $lastNameErr ?></p>
                    <?php   } ?>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Phone/Email</label>
                <input type="text" class="form-control form-control-sm" name="email">
                <?php if (isset($emailErr)) { ?>
                    <p style="color: red;"><?php echo $emailErr ?></p>
                <?php   } ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control form-control-sm" name="password">
                <?php if (isset($passErr)) { ?>
                    <p style="color: red;"><?php echo $passErr ?></p>
                <?php   } ?>
            </div>
            <button class="btn btn-primary" type="submit">Register</button>
        </form>
        <h6 class="font-weight-bold" style="color: red; text-align:center">
            <?php if (isset($exist)) {
                echo $exist;
            } ?>
        </h6>
        <p style="text-align: center;">Already Have an Account?</p>
        <button class="btn btn-success">Go To LogIn Page</button>
    </div>
</div>

<?php include '../include/footer.php'; ?>