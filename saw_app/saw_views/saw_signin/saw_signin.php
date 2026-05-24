<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $getSAWData['saw_title']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= BASEURL; ?>/saw_assets/css/app.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/saw_assets/css/app-dark.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/saw_assets/css/auth.css">
</head>
<body>
<script src="<?= BASEURL; ?>/saw_assets/js/initTheme.js"></script>
<div id="auth">
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="<?= BASEURL; ?>"><img src="<?= BASEURL; ?>/saw_assets/img/nwarsyh_logo%20_blue.svg" alt="Logo"></a>
                </div>
                <h5 class="auth-title">Sign In SPK SAW</h5>
                <form action="<?= BASEURL; ?>/SAW_SignIn/SAW_doSignIn" method="post">
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl" placeholder="admin" name="saw_username" required>
                        <div class="form-control-icon">
                            <i class="fa fa-user-alt"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl" placeholder="admin" name="saw_password" required>
                        <div class="form-control-icon">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Sign In</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <a href="<?= BASEURL; ?>/saw_signin/saw_register" class="btn btn-success btn-block btn-lg shadow-lg mt-1">Belum Punya Akun? Register</a>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right"></div>
        </div>
    </div>
</div>
</body>
</html>