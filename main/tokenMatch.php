<?php include 'controllers/authController.php' ?>
<?php
if(isset($_POST['requestId']) && isset($_POST['token'])){
    tokenMatch($_POST['requestId'], $_POST['token']);
}else{
    header('location: requestedBook.php');
    $_SESSION['message'] = 'Input Error !';
    $_SESSION['type'] = 'alert-danger';
}
?>