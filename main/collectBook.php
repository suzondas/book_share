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
<body class="container">
<br>
<div class="row">
    <div class="col-md-5"><a href="dashboard.php"><button class="btn btn-warning"><< Homepage</button></a></div>
    <div class="col-md-7" style="text-align: left;"><h2 align="left">Collect Books</h2></div>
</div>

<hr>
<table class="table table-striped table-bordered">
    <thead class="thead-dark">
    <tr>
        <th>Book Name</th>
        <th>Subject</th>
        <th>Course</th>
        <th>Conditions</th>
        <th>Published By</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach (getAvailableBook() as $key) {
        echo "<tr>".
            "<td>".$key["name"]."</td>".
            "<td>".$key["subject_name"]."</td>".
            "<td>".$key["course"]."</td>".
            "<td>".$key["conditions"]."</td>".
            "<td>".$key["first_name"]." ".$key["last_name"]."</td>".
            "<td>".date("d-m-Y",strtotime($key["created"]))."</td>";
            if($key["requested"] ==1){
                echo "<td><button class='btn btn-light' disabled>Requested</button></td>";
            }else{
               echo "<td><button onclick='requestBook(".$key["id"].")' class='btn btn-success'>Request</button></td>";
            }
            echo "</tr>";
    } ?>
    </tbody>
</table>
<script>
    function requestBook(id) {
        var ask = window.confirm("Are you sure you want to request this Book?");
        if (ask) {
            window.location.href = "requestBook.php?book_id="+id;
        }

    }
</script>

</body>
</html>