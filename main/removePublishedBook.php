<?php include 'controllers/authController.php' ?>
<?php
if(isset($_GET['id'])){
    removePublishedBook($_GET['id']);
}
?>