<?php include 'controllers/authController.php' ?>
<?php
if (isset($_GET['request_id'])) {
    acceptBookRequested($_GET['request_id']);
}
?>