<?php include 'controllers/authController.php' ?>
<?php
if(isset($_GET['book_id'])){
    requestBook($_GET['book_id']);
}
?>