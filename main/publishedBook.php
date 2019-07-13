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
    .btn-warning{    width: 70px;
        height: 30px;
        font-size: 12px;}
</style>
</head>
<body class="container">
<br>
<h2 align="center">Published Books</h2>
<hr>
<table class="table table-bordered table-striped">
    <thead class="thead-dark">
    <tr>
        <th>Book Name</th>
        <th>Subject</th>
        <th>Course</th>
        <th>Conditions</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach (getPublishedBook() as $key) {
        echo "<tr>".
            "<td>".$key["name"]."</td>".
            "<td>".$key["subject"]."</td>".
            "<td>".$key["course"]."</td>".
            "<td>".$key["conditions"]."</td>".
            "<td>".date("d-m-Y",strtotime($key["created"]))."</td>".
            "<td><button onclick='removePublishedBook(".$key["id"].")' class='btn btn-warning'>Remove</button></td>".
            "</tr>";
    } ?>
    </tbody>
</table>
<a href="dashboard.php"><button class="btn btn-success">Homepage</button></a>
<script>
    function removePublishedBook(id) {
        var ask = window.confirm("Are you sure you want to delete this post?");
        if (ask) {
            window.location.href = "removePublishedBook.php?id="+id;
        }

    }
</script>
</body>
</html>