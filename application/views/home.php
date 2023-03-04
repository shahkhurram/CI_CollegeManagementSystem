<?php require('inc/header.php') ?>
<div class="container">
    <h1 style="text-align:center;">Admin & CO Admin Login Page</h1>
    <?php if ($checkAdminExist > 0) {
    } else { ?>
        <div class="my-4">
            <a class="btn btn-primary" href="<?php echo site_url('Welcome/adminRegister'); ?>">Admin Register</a>
        </div>
    <?php } ?>
    <div class="my-4">
        <a class="btn btn-primary" href="<?php echo site_url('Welcome/adminLogin'); ?>">Admin Login</a>
    </div>
</div>
<?php require('inc/footer.php') ?>