<?php require('inc/header.php') ?>
<div class="container">
    <h1 style="text-align:center">Edit Student</h1>
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
    <?php echo form_open("admin/modifyStudent/{$studentData->id}", ['name' => 'userregistration', 'autocomplete' => 'off']); ?>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo form_input(['name' => 'student_name', 'class' => 'form-control', 'value' => set_value('name', $studentData->student_name), 'placeholder' => 'Enter student Name']); ?>
            <?php echo form_error('student_name', "<div style='color:red'>", "</div>"); ?>
        </div>
        <div class="form-group">
            <!-- <label  for="gender">Gender</label> -->
            <select class="form-select" name="college_id" id="colllege">
                <option value=<?php echo $studentData->college_id ?>><?php echo $studentData->college_name; ?></option>
                <?php if (count($colleges)): ?>
                    <?php foreach ($colleges as $college): ?>
                        <option value="<?php echo $college->college_id ?>"><?php echo $college->college_name ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <?php echo form_error('college_id', "<div style='color:red'>", "</div>"); ?>
        </div>
        <div class="form-group">
            <!-- <label  for="gender">Gender</label> -->
            <select class="form-select" name="gender" id="gender">
                <option value="<?php echo $studentData->gender ?>"><?php echo $studentData->gender ?></option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
            </select>
            <?php echo form_error('gender', "<div style='color:red'>", "</div>"); ?>
        </div>
        <div class="form-group">
            <?php echo form_input(['name' => 'email', 'class' => 'form-control', 'value' => set_value('email', $studentData->email), 'placeholder' => 'Enter your Email ']); ?>
            <?php echo form_error('email', "<div style='color:red'>", "</div>"); ?>
        </div>
        <div class="form-group">
            <?php echo form_input(['name' => 'course', 'class' => 'form-control', 'value' => set_value('course', $studentData->course), 'placeholder' => 'Enter Student course ']); ?>
            <?php echo form_error('course', "<div style='color:red'>", "</div>"); ?>
        </div>
        <?php echo form_submit(['value' => 'Save Changes', 'class' => 'btn btn-primary']); ?>
        <a class="btn btn-info" href="<?php echo site_url("Admin/viewStudents/{$studentData->college_id}"); ?>">
            Back</a>
    </div>
    <?php echo form_close(); ?>
</div>
<?php require('inc/footer.php') ?>