<?php include 'controllers/authController.php' ?>
<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
?>

<?php if (count($errors) > 0): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <li>
                <?php echo $error; ?>
            </li>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<!-- Display messages -->
<?php if (isset($_SESSION['message'])): ?>
    <div class="alert <?php echo $_SESSION['type'] ?>">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        unset($_SESSION['type']);
        ?>
    </div>
<?php endif; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="../src/css/bootstrap.min.css"/>
    <script type="text/javascript" src="../src/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../src/js/popper.min.js"></script>
    <script type="text/javascript" src="../src/js/bootstrap.min.js"></script>
    <style>
        .site-logo {
            height: 50px;
            background: green;
            border-radius: 30%;
            padding: 5px;
        }
        .dropdown-menu li{
            padding: 5px;
            background-color: dodgerblue;
            border-bottom: 1px solid black;
            margin: 2px;
            color:white;
            font-weight: bold;
        }
        .dropdown-menu li a{
            color:white;
        }
    </style>
</head>

<body style="height: 500px !important;background: url(../src/images/bg-pattern.jpg);
">


<div id="container" style="height: 500px !important;background: white;padding: 10px;">

    <div class="row header">
        <div class="col-md-2" style="color:white; padding: 5px;font-weight: bold;font-size: 16px;">
            <img class="site-logo" src="../src/images/logo.png"> Book Share
        </div>
        <div class="col-md-10">
            <div class="row" style="text-align: right; padding-top:10px;">
                <div class="col-md-9">
                    <a href="booksGiven.php">
                        <button class="btn btn-info">Books Donated
                            <span style="background: #FFE228;" class="badge badge-light"><?= sizeof(booksGiven()) ?></span>
                        </button>
                    </a>
                    <a href="booksCollected.php">
                        <button class="btn btn-info">Books Collected
                            <span style="background: #FFE228;" class="badge badge-light"><?= sizeof(booksCollected()) ?></span>
                        </button>
                    </a>
                </div>
                <div class="col-md-3">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">
                            <?= strtoupper($_SESSION['username']);?>
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                            <li role="presentation"><a href="update_profile.php">Profile</a></li>
                            <li role="presentation"><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar">
        <br>
        <a href="publishedBook.php">
            <button type="button" class="btn btn-success">Published Books
                <span class="badge badge-light"><?= sizeof(getPublishedBook()) ?></span>
            </button>
        </a>
        <br>
        <a href="bookRequested.php">
            <button type="button" class="btn btn-success">People's Requests
                <span class="badge badge-light"><?= sizeof(getBookRequested()) ?></span>
            </button>
        </a>
        <br>
        <a href="requestedBook.php">
            <button type="button" class="btn btn-success">My Requests
                <span class="badge badge-light"><?= sizeof(getRequestedBook()) ?></span>
            </button>
        </a>
        <br>
        <div class="dual_button">
            <a href="publishBook.php">
                <button type="button" class="btn btn-success" id="give">Publish Book</button>
            </a>
            <a href="collectBook.php">
                <button type="button" class="btn btn-success" id="get">Collect Book</button>
            </a>
        </div>
    </div>

</div>



</body>
</html>