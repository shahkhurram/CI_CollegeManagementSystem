<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
  <script> scr = "<?php echo base_url('assets/js/bootstrap.min.js') ?>"</script>
  <script> scr = "<?php echo base_url('assets/js/bootstrap.js') ?>"</script>
  <title>College Management System </title>
</head>
<body style="background-color:#e0f5f4">
  <nav class="navbar navbar-expand-lg"style="background-color: #72ecc0;">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php base_url('home.php') ?>">College Management System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>
        <form class="d-flex">
          <div class="dropdown">
            <button class="btn btn-group dropdown-toggle"style="background-color: #4e73df; color:#fff"  type="button" id="dropdownMenuButton" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Settings
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <?php  $id=$this->session->userData('id');?>
              <?php if($id=='1'): ?>
                <a class="dropdown-item" href="<?php echo site_url('admin/dashboard'); ?>"style="background-color: #0dcaf0; color:#fff">Dashboard</a>
                <a class="dropdown-item" href="<?php echo site_url('admin/coadmins'); ?>"style="background-color: #72ecc0;">View Co Admins</a>
                <a class="dropdown-item" href="<?php echo site_url('Welcome/logout'); ?>"style="background-color: #dc3545; color:#fff">Logout</a>
                <?php else :?>
                  <a class="dropdown-item" href="<?php echo site_url('Welcome/logout'); ?>">Logout</a>
                  <?php endif; ?>
                </div>
              </div>
              <input class="form-control me-2" style="margin-left:10px;" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>