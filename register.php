<?php
include_once "core/db.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=trim($_POST['username']);
    $email=trim($_POST['email']);
    $password=password_hash($_POST['password'], PASSWORD_BCRYPT);

    $query = mysqli_query($conn, "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')");
    if($query) {
        header("Location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Flashcard App</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto my-5">
                <h3 class="text-center">Register to Flashcard App</h3>
                <div class="card bg-light">
                    <div class="card card-body">
                        <form action="register.php" method="post" autocomplete="off">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="username">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" id="submit" class="btn btn-success btn-sm text-center" value="Register Now!">
                            </div>
                        </form>
                        <p class="text-center">Have an account? <a href="login.php">Login!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>