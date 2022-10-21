<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col col-login">
                <h2 class="text-center">***Welcome To Our Quiz Game***</h2>
                <h4 class="text-light bg-dark login-text text-center">Login Yourself From Here</h4>
                <form action="validation.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username<span class="text-danger">*</span></label>
                        <input type="text" name="user" class="form-control" placeholder="Your Name" required />
                    </div>
                    <div class="form-group">
                        <label for="username">Password<span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control" required />
                    </div>
                    <button type="submit" class="btn-login btn text-white bg-success">Login</button>
                </form>
            </div>
            <hr>
            <h2 class="text-center">OR</h2>
            <hr>
            <div class="col col-registration">
                <h2 class="text-light bg-dark login-text text-center" >Welcome if New User, Register Yourself From Here</h2>
                <form action="registration.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username<span class="text-danger">*</span></label>
                        <input type="text" name="user" class="form-control" placeholder="Your Name" required />
                    </div>
                    <div class="form-group">
                        <label for="username">Password<span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control" />
                    </div>
                    <button type="submit" class="btn text-white bg-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
    <script src="" async defer></script>
</body>

</html>