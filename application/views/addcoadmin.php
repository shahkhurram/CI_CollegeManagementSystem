<?php require('inc/header.php') ?>
<div class="container">
    <h1 style="text-align:center">Add CO Admin</h1>
    <div class="col-md-6">
        <!--success message -->
        <?php if ($this->session->flashdata('message')) { ?>
            <p class="alert alert-dismissible alert-success">
                <?php echo $this->session->flashdata('message'); ?>
            </p>
        <?php } ?>
        <!--error message -->
        <?php if ($this->session->flashdata('alert')) { ?>
            <p class="alert alert-dismissible alert-danger">
                <?php echo $this->session->flashdata('alert'); ?>
            </p>
        <?php } ?>
    </div>
    <?php echo form_open('admin/createcoadmin', ['name' => 'userregistration', 'autocomplete' => 'off']); ?>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo form_input(['name' => 'name', 'class' => 'form-control', 'value' => set_value('name'), 'placeholder' => 'Enter Your Name']); ?>
            <?php echo form_error('name', "<div style='color:red'>", "</div>"); ?>
        </div>
        <div class="form-group">
            <!-- <label  for="gender">Gender</label> -->
            <select class="form-select" name="college_id" id="colllege">
                <option value="">Select College</option>
                <?php if (count($colleges)): ?>
                    <?php foreach ($colleges as $college): ?>
                        <option value=<?php echo $college->college_id ?>><?php echo $college->college_name ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php echo form_error('colleges', "<div style='color:red'>", "</div>"); ?>
            </select>
        </div>
        <div class="form-group">
            <?php echo form_input(['name' => 'email', 'class' => 'form-control', 'value' => set_value('email'), 'placeholder' => 'Enter your Email ']); ?>
            <?php echo form_error('email', "<div style='color:red'>", "</div>"); ?>
        </div>
        <div class="form-group">
            <?php echo form_input(['name' => 'phone', 'class' => 'form-control', 'value' => set_value('phone'), 'placeholder' => 'Enter your phone ']); ?>
            <?php echo form_error('phone', "<div style='color:red'>", "</div>"); ?>
        </div>
        <div class="form-group">
            <!-- <label  for="gender">Gender</label> -->
            <select class="form-select" name="gender" id="gender">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
            </select>
            <?php echo form_error('phone', "<div style='color:red'>", "</div>"); ?>
        </div>
        <div class="form-group">
            <!-- <label  for="gender">Gender</label> -->
            <select class="form-select" name="role_id" id="role">
                <option value="">Select Role</option>
                <?php if (count($roles)): ?>
                    <?php foreach ($roles as $role): ?>
                        <option value=<?php echo $role->role_id ?>><?php echo $role->role_name ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php echo form_error('role', "<div style='color:red'>", "</div>"); ?>
            </select>
        </div>
        <div class="form-group">
            <?php echo form_input(['type' => 'password', 'name' => 'password', 'class' => 'form-control', 'value' => set_value('password'), 'placeholder' => 'Enter your password ']); ?>
            <?php echo form_error('password', "<div style='color:red'>", "</div>"); ?>
        </div>
        <div class="form-group">
            <?php echo form_input(['type' => 'password', 'name' => 'cpassword', 'class' => 'form-control', 'value' => set_value('cpassword'), 'placeholder' => 'Confirm password']); ?>
            <?php echo form_error('cpassword', "<div style='color:red'>", "</div>"); ?>
        </div>
        <?php echo form_submit(['value' => 'Add CO Admin', 'class' => 'btn btn-primary']); ?>
    </div>
    <?php echo form_close(); ?>
</div>
<?php require('inc/footer.php') ?>