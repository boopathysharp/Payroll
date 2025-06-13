<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$error = $_GET['error'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Login | Payroll Management System</title>
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" />
    <!-- App Css -->
    <link href="assets/css/app.min.css" rel="stylesheet" />
    <!-- Material Design Icons -->
    <link href="assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
</head>

<body>
    <div class="d-flex flex-column h-100 align-items-center justify-content-center" style="max-width: 400px; margin: auto;">
        <div class="mb-4 mb-md-5 text-center w-100">
            <br>
            <br>
            <a href="index.html" class="d-block auth-logo">
                <img src="assets/images/sharp-info.webp" alt="" height="28"> <span class="logo-txt">Sharp Info Solutions Pvt,Ltd.</span>
            </a>
        </div>
        <div class="auth-content my-auto w-100">
            <div class="text-center">
                <h5 class="mb-0">Welcome Back !</h5>
                <p class="text-muted mt-2">Sign in to continue to Yerambam.</p>
            </div>
            <?php if (!empty($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($error); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>
            <form class="custom-form mt-4 pt-2" method="POST" action="login_process.php">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required autofocus>
                </div>
                <div class="mb-3">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <label class="form-label">Password</label>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="">
                                <a href="recover-password.html" class="text-muted">Forgot password?</a>
                            </div>
                        </div>
                    </div>

                    <div class="input-group auth-pass-inputgroup">
                        <input type="password" class="form-control" name="password" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" required>
                        <button class="btn btn-light ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember-check">
                            <label class="form-check-label" for="remember-check">
                                Remember me
                            </label>
                        </div>
                    </div>

                </div>
                <div class="mb-3">
                    <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                </div>
            </form>

            <!-- <div class="mt-4 pt-2 text-center">
                <div class="signin-other-title">
                    <h5 class="font-size-14 mb-3 text-muted fw-medium">- Sign in with -</h5>
                </div>

                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <a href="javascript:void()"
                            class="social-list-item bg-primary text-white border-primary">
                            <i class="mdi mdi-facebook"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript:void()"
                            class="social-list-item bg-info text-white border-info">
                            <i class="mdi mdi-twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript:void()"
                            class="social-list-item bg-danger text-white border-danger">
                            <i class="mdi mdi-google"></i>
                        </a>
                    </li>
                </ul>
            </div> -->

            <!-- <div class="mt-5 text-center">
                <p class="text-muted mb-0">Don't have an account ? <a href="register.html"
                        class="text-primary fw-semibold"> Signup now </a> </p>
            </div> -->
        </div>
        <div class="mt-4 mt-md-5 text-center w-100">
            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Yerambam   . Crafted with <i class="mdi mdi-heart text-danger"></i> by Kolam</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <!-- Password visibility toggle -->
    <script>
    document.getElementById('password-addon').addEventListener('click', function() {
        var passwordInput = document.querySelector('input[name="password"]');
        var icon = this.querySelector('i');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('mdi-eye-outline');
            icon.classList.add('mdi-eye-off-outline');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('mdi-eye-off-outline');
            icon.classList.add('mdi-eye-outline');
        }
    });
    </script>
</body>

</html>