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

</head>
<body class="container"><br>
<h2 align="center">Books You Collected</h2>
<hr>
<table class="table table-striped table-bordered">
    <thead class="thead-dark">
    <tr>
        <th>Book Name</th>
        <th>Subject</th>
        <th>Course</th>
        <th>Conditions</th>
        <th>Book Owner</th>
        <th>Date</th>
        <th>Code</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach (booksCollected() as $key) {
        echo "<tr>".
            "<td>".$key["name"]."</td>".
            "<td>".$key["subject"]."</td>".
            "<td>".$key["course"]."</td>".
            "<td>".$key["conditions"]."</td>".
            "<td><b>".$key["first_name"]." ". $key["last_name"]."</b><br>".$key["upazila"].", ".$key["district"]."</td>".
            "<td>".date("d-m-Y",strtotime($key["created"]))."</td>";
            echo "<td><input class='btn btn-success' style='margin-top:10px;width:87px' type='text' value='".$key["code"]."' disabled/></b></td>";
        echo "</tr>";
    } ?>
    </tbody>
</table>
<a href="dashboard.php"><button class="btn btn-success">Homepage</button></a>
</body>
</html>