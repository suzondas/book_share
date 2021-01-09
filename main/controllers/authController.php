<?php
require_once 'sendEmails.php';
session_start();
$username = "";
$email = "";
$mobile = "";
$first_name = "";
$last_name = "";
$errors = [];

$conn = new mysqli('localhost', 'root', '', 'book_share');

/*Service - subject*/
function getSubjects()
{
    $query = "SELECT * FROM subject";
    $conn = new mysqli('localhost', 'root', '', 'book_share');
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $arr = [];
        while ($row = mysqli_fetch_array($result)) {
            $arr[] = $row['name'];
        }
        return $arr;
    }
}

/*Service - getDistricts*/
function getDistricts()
{
    $query = "SELECT * FROM districts";
    $conn = new mysqli('localhost', 'root', '', 'book_share');
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $arr = [];
        while ($row = mysqli_fetch_array($result)) {
            $arr[] = $row['name'];
        }
        return $arr;
    }
}

/*Service - getUpazilas*/
function getUpazilas()
{
    $query = "SELECT * FROM upazilas";
    $conn = new mysqli('localhost', 'root', '', 'book_share');
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $arr = [];
        while ($row = mysqli_fetch_array($result)) {
            $arr[] = $row['name'];
        }
        return $arr;
    }
}

/*Service - getPublishedBook */
function getPublishedBook()
{
    $query = "SELECT i.id, i.name, (select name from subject where id=i.subject) as subject, i.course, i.conditions, i.created FROM book i where i.user_id=? and i.available=1";
    $conn = new mysqli('localhost', 'root', '', 'book_share');
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $_SESSION['id']);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $arr = [];
        while ($row = mysqli_fetch_array($result)) {
            $arr[] = $row;
        }
        return $arr;
    }
}

/*Service - toakenMatch */
function tokenMatch($request_id, $token)
{
    $query = "SELECT * FROM token where request_id=? and code=?";
    $conn = new mysqli('localhost', 'root', '', 'book_share');
    $stmt = $conn->prepare($query);
    $stmt->bind_param('is', $request_id, $token);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows) {
            $query1 = "UPDATE token set accepted=1 where request_id=?";
            $stmt1 = $conn->prepare($query1);
            $stmt1->bind_param('i', $request_id);
            if ($stmt1->execute()) {
                $query2 = "update book set available=0, collector_id=? where id=(select book_id from request where id=?)";
                $stmt2 = $conn->prepare($query2);
                $stmt2->bind_param('ii', $_SESSION['id'], $request_id);
                if ($stmt2->execute()) {
                    header('location: requestedBook.php');
                    $_SESSION['message'] = 'Thanks For Collecting Book!';
                    $_SESSION['type'] = 'alert-success';
                }
            }
        } else {
            header('location: requestedBook.php');
            $_SESSION['message'] = 'Token did not match';
            $_SESSION['type'] = 'alert-danger';
        }
    }
}

/*Service - requestedBook */
function getRequestedBook()
{
    $query = "SELECT h.mobile, l.id, i.name, (select name from subject where id = i.subject) as subject, i.course, i.conditions, i.created, j.first_name, j.last_name, k.name as subject_name, l.accept, (select name from districts where id=h.district) as district, (select name from upazilas where id=h.upazila) as upazila FROM users h, book i, user_academic_info j, subject k, request l where i.user_id=j.user_id and h.id = j.user_id and i.available=true and l.requester_id =? and l.book_id = i.id and i.subject = k.id";
    $conn = new mysqli('localhost', 'root', '', 'book_share');
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $_SESSION['id']);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $arr = [];
        while ($row = mysqli_fetch_array($result)) {
            $arr[] = $row;
        }
        return $arr;
    }
}

/*token function*/
function token($request_id)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 5; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $request_id . $randomString;
}

/*Service - requestedBook */
function acceptBookRequested($request_id)
{
    $query = "update request set accept=1 where id = ?";
    $conn = new mysqli('localhost', 'root', '', 'book_share');
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $request_id);
    if ($stmt->execute()) {
        $query1 = "insert into token set code=?, request_id=?, accepted=0, created=now()";
        $stmt1 = $conn->prepare($query1);
        $stmt1->bind_param('si', token($request_id), $request_id);
        if ($stmt1->execute()) {
            header('location: bookRequested.php');
            $_SESSION['message'] = 'Request  Accepted!';
            $_SESSION['type'] = 'alert-success';
        } else {
            header('location: bookRequested.php');
            $_SESSION['message'] = 'Database Error!';
            $_SESSION['type'] = 'alert-danger';
        }
    } else {
        header('location: bookRequested.php');
        $_SESSION['message'] = 'Database Error!';
        $_SESSION['type'] = 'alert-danger';
    }
}

/*Service - getBookRequested */
function getBookRequested()
{
    $query = "select i.id, i.name, (select name from subject where id = i.subject) as subject, i.course, i.conditions, j.first_name, j.last_name, m.mobile, k.accept, k.id as request_id, k.created,(select name from districts where id=m.district) as district, (select name from upazilas where id=m.upazila) as upazila, (select code from token where request_id=k.id) as code from users m, book i, user_academic_info j, request k where m.id=j.user_id and k.user_id=? and k.book_id=i.id and k.requester_id=j.user_id and i.available=1";
    $conn = new mysqli('localhost', 'root', '', 'book_share');
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $_SESSION['id']);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $arr = [];
        while ($row = mysqli_fetch_array($result)) {
            $arr[] = $row;
        }
        return $arr;
    }
}


/*Service - booksCollected */
function booksCollected()
{
    $query = "select i.id, i.name, (select name from subject where id = i.subject) as subject, i.course, i.conditions, j.first_name, j.last_name,  (select name from districts where id=h.district) as district, (select name from upazilas where id=h.upazila) as upazila, k.accept, k.id as request_id, k.created, l.code from users h, book i, user_academic_info j, request k, token l where h.id = i.user_id and i.collector_id=? and i.user_id=j.user_id and k.book_id=i.id and l.request_id=k.id and i.available=0";
    $conn = new mysqli('localhost', 'root', '', 'book_share');
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $_SESSION['id']);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $arr = [];
        while ($row = mysqli_fetch_array($result)) {
            $arr[] = $row;
        }
        return $arr;
    }
}

/*Service - booksGiven */
function booksGiven()
{
    $query = "select i.id, i.name, (select name from subject where id = i.subject) as subject, i.course, i.conditions, j.first_name, j.last_name,  (select name from districts where id=h.district) as district, (select name from upazilas where id=h.upazila) as upazila, k.accept, k.id as request_id, k.created, l.code from users h, book i, user_academic_info j, request k, token l where h.id = i.collector_id and i.user_id=? and i.collector_id=j.user_id and k.book_id=i.id and l.request_id=k.id and i.available=0";
    $conn = new mysqli('localhost', 'root', '', 'book_share');
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $_SESSION['id']);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $arr = [];
        while ($row = mysqli_fetch_array($result)) {
            $arr[] = $row;
        }
        return $arr;
    }
}

/*Service - getAvailable */
function getAvailableBook()
{
    $query = "SELECT i.id, i.name, i.subject, i.course, i.conditions, i.created, j.first_name, j.last_name, k.name as subject_name, if ((select requester_id from request where requester_id=? and book_id=i.id) is null ,0,1) as requested FROM book i, user_academic_info j, subject k where i.user_id=j.user_id and i.available=true and i.user_id !=? and i.subject = k.id";
    $conn = new mysqli('localhost', 'root', '', 'book_share');
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ii', $_SESSION['id'], $_SESSION['id']);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $arr = [];
        while ($row = mysqli_fetch_array($result)) {
            $arr[] = $row;
        }
        return $arr;
    }
}

/*Service - getProfileDetails*/

function getProfileDetails()
{
    $conn = new mysqli('localhost', 'root', '', 'book_share');
    $query = "SELECT * FROM users i, user_academic_info j WHERE i.id=? and j.user_id=? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ii', $_SESSION['id'], $_SESSION['id']);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['district'] = $user['district'];
        $_SESSION['upazila'] = $user['upazila'];
        $_SESSION['mobile'] = $user['mobile'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
//        $_SESSION['university'] = $user['university'];
//        $_SESSION['subject'] = $user['subject'];
        $_SESSION['verified'] = $user['verified'];
        $_SESSION['message'] = 'You are logged in!';
        $_SESSION['type'] = 'alert-success';
    }
}

/*Remove Published Book*/

function removePublishedBook($id)
{
    $conn = new mysqli('localhost', 'root', '', 'book_share');
    $query = "delete from book where id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        header('location: publishedBook.php');
        $_SESSION['message'] = 'Item  removed!';
        $_SESSION['type'] = 'alert-success';
    }
}

/*Remove Published Book*/

function cancelRequestedBook($id)
{
    $conn = new mysqli('localhost', 'root', '', 'book_share');
    $query = "delete from request where id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        header('location: requestedBook.php');
        $_SESSION['message'] = 'Request  Cancelled!';
        $_SESSION['type'] = 'alert-success';
    }
}

/*Request Book*/

function requestBook($book_id)
{
    $conn = new mysqli('localhost', 'root', '', 'book_share');
    $query = "insert into request set book_id=?, requester_id=?, user_id=(select user_id from book where id=? ), created=now()";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('iii', $book_id, $_SESSION['id'], $book_id);
    if ($stmt->execute()) {
        header('location: collectBook.php');
        $_SESSION['message'] = 'Item  successfully requested!';
        $_SESSION['type'] = 'alert-success';
    }
}

// SIGN UP USER
if (isset($_POST['signup-btn'])) {
    if (empty($_POST['username'])) {
        $errors['username'] = 'Username required';
    }
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email required';
    }
    if (empty($_POST['mobile'])) {
        $errors['mobile'] = 'Phone Number required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    if (empty($_POST['first_name'])) {
        $errors['first_name'] = 'first name required';
    }
    if (empty($_POST['last_name'])) {
        $errors['last_name'] = 'last name required';
    }
    if (isset($_POST['password']) && $_POST['password'] !== $_POST['passwordConf']) {
        $errors['passwordConf'] = 'The two passwords do not match';
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $token = bin2hex(mt_rand(50, 1000)); // generate unique token
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $errors['email'] = "Email already exists";
    }

    if (count($errors) === 0) {
        $query = "INSERT INTO users SET username=?, email=?, token=?, password=?, mobile=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssss', $username, $email, $token, $password, $mobile);
        $result = $stmt->execute();

        if ($result) {
            $user_id = $stmt->insert_id;
            $stmt->close();

            $query1 = "INSERT INTO user_academic_info SET user_id=?, first_name=?, last_name=?";
            $stmt1 = $conn->prepare($query1);
            $stmt1->bind_param('iss', $user_id, $first_name, $last_name);
            $result1 = $stmt1->execute();

            if ($result1) {
                // TO DO: send verification email to user
                sendVerificationEmail($email, $token);

                $_SESSION['id'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['verified'] = false;
                $_SESSION['message'] = 'You are logged in!';
                $_SESSION['type'] = 'alert-success';
                header('location: index.php');
            }
        } else {
            $errors['error_msg'] = "User Name Already Exists!: Could not register user";
        }
    }
}

// LOGIN
if (isset($_POST['login-btn'])) {
    if (empty($_POST['username'])) {
        $errors['username'] = 'Username or email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (count($errors) === 0) {
        $query = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $username, $username);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) { // if password matches
                $stmt->close();

                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['verified'] = $user['verified'];
                $_SESSION['message'] = 'You are logged in!';
                $_SESSION['type'] = 'alert-success';
                header('location: index.php');
                exit(0);
            } else { // if password does not match
                $errors['login_fail'] = "Wrong username / password";
            }
        } else {
            $_SESSION['message'] = "User Not Found";
            $_SESSION['type'] = "alert-danger";
        }
    }
}

//profile
// LOGIN


// submit update profile
if (isset($_POST['update_profile_btn'])) {

    if (count($errors) === 0) {
        $query = "update users set mobile=?, district=?, upazila=? where id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssii', $_POST['mobile'], $_POST['district'], $_POST['upazila'], $_SESSION['id']);

        if ($stmt->execute()) {
            $query1 = "update user_academic_info set first_name=?, last_name=? where user_id=?";
            $stmt1 = $conn->prepare($query1);
//            echo $_POST['first_name']. $_POST['last_name']. $_SESSION['id'];exit;
            $stmt1->bind_param('ssi', $_POST['first_name'], $_POST['last_name'], $_SESSION['id']);

            if ($stmt1->execute()) {
                $_SESSION['message'] = "Profile updated successfully!";
                $_SESSION['type'] = "alert-success";
                header('location: dashboard.php');
                exit(0);

            } else {
                $_SESSION['message'] = "Database error. Login failed!";
                $_SESSION['type'] = "alert-danger";
            }
        } else {
            $_SESSION['message'] = "Database error. Login failed!";
            $_SESSION['type'] = "alert-danger";
        }
    }
}
?>

<?php
// Publish Book
if (isset($_POST['publishBook'])) {

    if (count($errors) === 0) {
        $query = "insert into book set name=?, subject=?, course=?, conditions=?, available=1, user_id=?, created=now()";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssi', $_POST['name'], $_POST['subject'], $_POST['course'], $_POST['conditions'], $_SESSION['id']);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Book published successfully!";
            $_SESSION['type'] = "alert-success";
            header('location: dashboard.php');
            exit(0);
        } else {
//            printf("Error: %s.\n", $stmt->error);
            $_SESSION['message'] = "Database error. Login failed!";
            $_SESSION['type'] = "alert-danger";
        }
    }
}
?>