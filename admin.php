<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In | Swc Center - Admin & Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description" />
    <meta content="JasCoding" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="admin/assets/images/swc.png">

    <!-- Theme Config Js -->
    <script src="admin/assets/js/config.js"></script>

    <!-- App css -->
    <link href="admin/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg position-relative" style="height: 100vh;">
    <div class="account-pages p-sm-5  position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-9 col-lg-11">
                    <div class="card overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <div class="auth-brand p-4 text-center">
                                        <a href="index.html" class="logo-light">
                                            <img src="admin/assets/images/swc.png" alt="logo" height="75">
                                        </a>
                                        <a href="index.html" class="logo-dark">
                                            <img src="admin/assets/images/swc.png" alt="dark logo" height="75">
                                        </a>
                                    </div>
                                    <?php if (isset($_GET['error']) && $_GET['error'] == 1) { ?>
                                    <div class="alert alert-custom alert-indicator-bottom indicator-danger"
                                        role="alert">
                                        <div class="alert-content">

                                            <span class="alert-text">Invalid username or password</span>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="p-4 my-auto text-center">
                                        <h4 class="fs-20">Sign In</h4>
                                        <p class="text-muted mb-4">Enter your email address and password to <br> access
                                            account.
                                        </p>

                                        <!-- form -->
                                        <form action="validate.php" method="POST">
                                            <div class="mb-3">
                                                <label for="emailaddress" class="form-label">Email address</label>
                                                <input class="form-control" type="email" name="email" id="emailaddress" required=""
                                                    placeholder="Enter your email">
                                            </div>
                                            <div class="mb-3">

                                                <label for="password" class="form-label">Password</label>
                                                <input class="form-control" type="password" name="password" required="" id="password"
                                                    placeholder="Enter your password">
                                            </div>
                                            <div class="mb-0 text-start">
                                                <button class="btn btn-soft-primary w-100" name="submit" type="submit"><i
                                                        class="ri-login-circle-fill me-1"></i> <span class="fw-bold">Log
                                                        In</span> </button>
                                            </div>
                                        </form>
                                        <!-- end form-->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="admin/assets/images/auth.jpg" alt="" class="img-fluid rounded h-100">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>

        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt fw-medium">
        <span class="text-dark">
            <script>
            document.write(new Date().getFullYear())
            </script> © JasCoding
        </span>
    </footer>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>









    <script src="assets/vendor/lucide/umd/lucide.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>