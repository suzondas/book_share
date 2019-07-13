<?php include 'controllers/authController.php' ?>
<?php
if(isset($_GET['id'])){
    cancelRequestedBook($_GET['id']);
}
?>