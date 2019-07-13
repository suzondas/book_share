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
    <link rel="stylesheet" href="../src/css/bootstrap.min.css">
    <style>
        .form-control {
            height: 40px !important;
            width: 60% !important;
        }
    </style>
</head>
<body class="container">
<br>
<h2 align="center">Give Book</h2>
<hr>
<div class="form" style="background:#eef4f5;padding: 30px;">
    <form action="publishBook.php" method="post">
        <div class="row">
            <div class="col-md-6">
                Book Name <br>
                <input class="form-control" type="text" name="name" placeholder="Book Name">
                <br>
                <br>
                Condition of Book
                <br>
                <select class="form-control" style="width: 200px; height: 30px;" name="conditions">
                    <option value="good">Good</option>
                    <option value="bad">Bad</option>
                    <option value="moderate">Moderate</option>
                    <option value="verygood">Very good</option>
                </select>
                <br>
            </div>
            <div class="col-md-6">
                Subject
                <br>
                <select name="subject" style="width: 200px; height: 30px;" class="form-control">
                    <?php
                    foreach ($subjects = getSubjects() as $key => $value) {
                        $key = $key + 1;
                        if ($key == $_SESSION['subject']) {
                            echo "<option value='" . $key . "' selected>" . $value . "</option>";
                        } else {
                            echo "<option value='" . $key . "'>" . $value . "</option>";
                        }
                    }
                    ?>
                </select>
                <br>
                <br>
                Course <br>

                <input type="text" name="course" placeholder="Course" class="form-control">
                <br>
            </div>
                <input class="form-control btn btn-success" style="width: 120px !important; margin-left:20px" type="submit" name="publishBook"
                       value="Publish Book"> &nbsp;&nbsp;
                <a href="dashboard.php"><input class="btn btn-warning" type="button" value="Cancel"></a>
        </div>
    </form>


</div>

</body>
</html>