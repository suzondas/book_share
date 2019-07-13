<!--auth controller-->
<?php include 'controllers/authController.php' ?>
<!-- Error Flashing -->
<?php if (count($errors) > 0): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <li>
                <?php echo $error; ?>
            </li>
        <?php endforeach;?>
    </div>
<?php endif;?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../src/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../src/css/main.css">
    <title>Registration</title>
    <style>
        .site-logo{height: 50px;
            background: green;
            border-radius: 30%;
            padding: 5px;}
    </style>
</head>
<body style="background-image: url(../src/images/hero_1.jpg); background-position: 50% -25px; background-size: cover;">
<h2 align="center" style="background: teal;color:white; padding: 5px;"><img class="site-logo" src="../src/images/logo.png"> Book Share</h2>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 form-wrapper auth"  style="background:beige">
            <h3 class="text-center form-title">Registration</h3>
            <form action="signup.php" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control form-control-lg" value="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control form-control-lg" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="number" min="11" name="mobile" class="form-control form-control-lg" value="<?php echo $mobile; ?>">
                </div>
                <hr>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control form-control-lg" value="<?php echo $first_name; ?>">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control form-control-lg" value="<?php echo $last_name ?>">
                </div>
                <hr>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control form-control-lg">
                </div>
                <div class="form-group">
                    <label>Password Confirm</label>
                    <input type="password" name="passwordConf" class="form-control form-control-lg">
                </div>
                <div class="form-group">
                    <button type="submit" name="signup-btn" class="btn btn-lg btn-block">Sign Up</button>
                </div>
            </form>
            <p>Already have an account? <a href="login.php">Login</a><br>
                <a href="../index.php" style="color:dodgerblue"><- Homepage</a></p>
        </div>
    </div>
</div>
</body>
</html>