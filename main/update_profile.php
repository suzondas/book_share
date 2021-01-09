<?php include 'controllers/authController.php' ?>
<?php getProfileDetails(); ?>

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

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Profile</title>
    <link rel="stylesheet" href="../src/css/bootstrap.min.css">
</head>
<body>
<br>
<h2 align="center">Update Your Profile</h2>
<hr>
<div class="container" style="padding:20px;background-color: aliceblue;">
    <form action="update_profile.php" method="post">
        <div class="row">
            <div class="col-md-6">
                <b>First Name:</b>
                <br>
                <input class="form-control" type="text" placeholder="First Name" value="<?= $_SESSION['first_name'] ?>"
                       name="first_name">
                <br>
                <br>
                <b>Mobile Number:</b>
                <br>
                <input class="form-control" type="text" placeholder="Mobile" value="<?= $_SESSION['mobile'] ?>"
                       name="mobile">
                <br>
                <br>
                <b>Address:</b>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        District: <select name="district" style="width: 200px; height: 40px;" class="form-control">
                            <?php
                            foreach ($districts = getDistricts() as $key => $value) {
                                $key = $key + 1;
                                if ($key == $_SESSION['district']) {
                                    echo "<option value='" . $key . "' selected>" . $value . "</option>";
                                } else {
                                    echo "<option value='" . $key . "'>" . $value . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">

                        Upazila: <select name="upazila" style="width: 200px; height: 40px;" class="form-control">
                            <?php
                            foreach ($upazilas = getUpazilas() as $key => $value) {
                                $key = $key + 1;
                                if ($key == $_SESSION['upazila']) {
                                    echo "<option value='" . $key . "' selected>" . $value . "</option>";
                                } else {
                                    echo "<option value='" . $key . "'>" . $value . "</option>";
                                }
                            }
                            ?>
                        </select>

                    </div>
                </div>

            <br>
            </div>
            <div class="col-md-6">
                <b>Last Name:</b> <br>

                <input class="form-control" type="text" placeholder="Last Name" name="last_name"
                       value="<?= $_SESSION['last_name'] ?>">
                <br>
                <br>
                Email: <br>
                <input class="form-control" type="text" placeholder="Email"
                       value="<?= $_SESSION['email'] ?>" disabled>
            </div>
            <br>
            <input style="margin-left:20px;" class="submit_btn btn btn-success" type="submit" value="Update"
                   name="update_profile_btn">&nbsp;
            <a href="dashboard.php"><input class="btn btn-warning" type="button" value="Cancel"></a>
        </div>
    </form>

</div>


</body>
</html>