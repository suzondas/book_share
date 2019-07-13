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
    <title>Login</title>
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
        <div class="col-md-4 offset-md-4 form-wrapper auth login" style="background:beige">
            <h3 class="text-center form-title">Login</h3>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label>Username or Email</label>
                    <input type="text" name="username" class="form-control form-control-lg" value="<?php echo $username; ?>">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control form-control-lg">
                </div>
                <div class="form-group">
                    <button type="submit" name="login-btn" class="btn btn-lg btn-block">Login</button>
                </div>
            </form>
            <p>Don't yet have an account? <a href="signup.php">Sign up</a><br>
                <a href="../index.php" style="color:dodgerblue"><- Homepage</a></p>

        </div>
    </div>
</div>
</body>
</html>