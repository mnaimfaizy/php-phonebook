<!DOCTYPE html>
<html>
<head>
    <?php include('inc/style.php'); ?>
    <link href="assets/css/signin.css" rel="stylesheet" />
</head>
<body class="text-center bg-info text-white">

<?php
session_start();
$error = false;
if (isset($_POST['login'])) {
    $username = preg_replace('/[^A-Za-z]/', '', $_POST['username']);
    $password = md5($_POST['password']);

    if (file_exists('users/' . $username . '.xml')) {
        $xml = new SimpleXMLElement('users/' . $username . '.xml', 0, true);

        if ($password == $xml->password) {

            $_SESSION['username'] = $username;
            header("Location: index.php");
            die;
        }
    }
    $error = true;
}
?>

<!-- container -->
<div class="container">

    <?php if ($error) { ?>
        <div class="alert alert-danger" role="alert">
            Invalid Username and/or password, please try again!
        </div>
    <?php } ?>

    <form class="form-signin" action="login.php" method="post">
        <img class="mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-5 font-weight-normal">Please sign in</h1>
        <label for="username" class="sr-only">Username</label>
        <input type="text" id="username" name="username" class="form-control mb-2" placeholder="Username" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <input type="submit" name="login" id="login" class="btn btn-lg btn-primary btn-block" value="Sign in" />
    </form>
</div>
</div>
<!-- //container -->

<?php include('inc/footer.php'); ?>