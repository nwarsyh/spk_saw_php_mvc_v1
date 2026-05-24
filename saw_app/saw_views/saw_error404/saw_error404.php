<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $getSAWData['saw_title']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= BASEURL; ?>/saw_assets/css/app.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/saw_assets/css/error.css">
</head>
<body>
<script src="<?= BASEURL; ?>/saw_assets/js/initTheme.js"></script>
<div id="error">
    <div class="error-page container">
        <div class="col-md-8 col-12 offset-md-2">
            <div class="text-center">
                <img class="img-error" src="<?= BASEURL; ?>/saw_assets/img/404-page-not-found.svg" alt="Page Not Found">
                <h1 class="error-title">Page Not Found</h1>
                <p class='fs-5 text-gray-600'>Halaman yang anda cari tidak ditemukan</p>
                <a href="<?= BASEURL; ?>/saw_dashboard" class="btn btn-lg btn-outline-primary mt-3">Kembali</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>