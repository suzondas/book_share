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
    <title>My Requests</title>
    <link rel="stylesheet" href="../src/css/bootstrap.min.css"/>
    <script type="text/javascript" src="../src/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../src/js/popper.min.js"></script>
    <script type="text/javascript" src="../src/js/bootstrap.min.js"></script>

</head>
<body class="container"><br>
<h2 align="center">My Requests</h2>
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
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach (getRequestedBook() as $key) {
        echo "<tr>".
            "<td>".$key["name"]."</td>".
            "<td>".$key["subject"]."</td>".
            "<td>".$key["course"]."</td>".
            "<td>".$key["conditions"]."</td>".
            "<td><b>".$key["first_name"]." ". $key["last_name"]."</b><br>Address: <br>".$key["upazila"].", ".$key["district"]."<br>Mobile: ".$key["mobile"]."</td>".
            "<td>".date("d-m-Y",strtotime($key["created"]))."</td>";
            if($key["accept"] ==1){
                echo "<td>Request was Accepted"."<br>
                <button onclick='collectBook(".$key["id"].")' type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModal\"> Collect Book </button>
                </td>";
            }else{
                echo "<td><button onclick='cancelRequestedBook(".$key["id"].")' class='btn btn-success'>Cancel Request</button></td>";
            }
            echo "</tr>";
    } ?>
    </tbody>
</table>
<a href="dashboard.php"><button class="btn btn-success">Homepage</button></a>
<script>
    function cancelRequestedBook(id) {
        var ask = window.confirm("Are you sure you want to cancel this request?");
        if (ask) {
            window.location.href = "cancelRequestedBook.php?id="+id;
        }

    }
    function collectBook(id) {
        document.getElementById("requestId").value=id;
    }
</script>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="tokenMatch.php" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Collect Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="requestId" name="requestId" value=""/>
                    <b>Token Code:</b> <input type="tex" name="token" class="form-control"/>
                    (Insert Token Code You Got From Book Owner)
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    </div>
</div>
</body>
</html>