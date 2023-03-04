<?php require('inc/header.php') ?>
<div class="container">
  <div class="col-md-12" style="text-align:center; margin-bottom:15px;">
    <h1>Admin Dashboard</h1>
    <?php $name = $this->session->userData('name'); ?>
    <h6>Admin Email :
      <?php echo $email = $this->session->userData('email'); ?>
      </h>
      <h4> Welcome
        <?php echo $name; ?>
      </h4>
      <a class="btn btn-primary" href="<?php echo site_url('Admin/addcollege'); ?>">Add College</a>
      <a class="btn btn-secondary" href="<?php echo site_url('Admin/addCoadmin'); ?>">Add CO Admin</a>
      <a class="btn btn-success" href="<?php echo site_url('Admin/addstudent'); ?>">Add Student</a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Student Name</th>
        <th scope="col">College Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Gender</th>
        <th scope="col">Branch</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($users)): ?>
        <tr>
          <?php foreach ($users as $user): ?>
            <th scope="row">
              <?php echo $user->college_id; ?>
            </th>
            <td>
              <?php echo $user->name; ?>
            </td>
            <td>
              <?php echo $user->college_name; ?>
            </td>
            <td>
              <?php echo $user->email; ?>
            </td>
            <td>
              <?php echo $user->role_name; ?>
            </td>
            <td>
              <?php echo $user->gender; ?>
            </td>
            <td>
              <?php echo $user->branch; ?>
            </td>
            <td>
              <a class="btn btn-info" href="<?php echo site_url("Admin/viewStudents/{$user->college_id}"); ?>">View Info</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td>No record found</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<?php require('inc/footer.php') ?>