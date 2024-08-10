<!DOCTYPE html>
<html lang="en">
<?php
$setting = '';
?>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $this->renderSection('title'); ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php echo view('/admin/layouts/head', ["setting" => $setting]); ?>
</head>

<body>

<!-- ======= Header ======= -->
<?php echo view('/admin/layouts/header', ["setting" => $setting]); ?>
<!-- End Header -->

<!-- ======= Sidebar ======= -->
<?php echo view('/admin/layouts/sidebar', ["setting" => $setting]); ?>
<!-- End Sidebar-->

<main id="main" class="main">

    <?php echo $this->renderSection('body'); ?>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php echo view('/admin/layouts/footer', ["setting" => $setting]); ?>
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<?php echo view('/admin/layouts/scripts', ["setting" => $setting]); ?>

</body>

</html>