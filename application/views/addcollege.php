<?php require('inc/header.php') ?>
<div class="container" style="margin-left:334px; text-align:center;">
    <h1 style=" margin-right:540px;">Add College</h1>
    <div class="col-md-6">
        <?php if ($this->session->flashdata('message')) { ?>
            <p class="alert alert-dismissible alert-success">
                <?php echo $this->session->flashdata('message'); ?>
            </p>
        <?php } ?>
    </div>
    <?php echo form_open('admin/createCollege', ['name' => 'userregistration', 'autocomplete' => 'off']); ?>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo form_input(['name' => 'college_name', 'class' => 'form-control', 'value' => set_value('college_name'), 'placeholder' => 'Enter Your College Name ']); ?>
            <?php echo form_error('college_name', "<div style='color:red'>", "</div>"); ?>
        </div>
        <div class="form-group">
            <?php echo form_input(['type' => 'text', 'name' => 'branch', 'class' => 'form-control', 'value' => set_value('branch'), 'placeholder' => 'Enter College Branch ']); ?>
            <?php echo form_error('branch', "<div style='color:red'>", "</div>"); ?>
        </div>
        <?php echo form_submit(['value' => 'Add', 'class' => 'btn btn-primary']); ?>
    </div>
    <?php echo form_close(); ?>
</div>
<?php require('inc/footer.php') ?>