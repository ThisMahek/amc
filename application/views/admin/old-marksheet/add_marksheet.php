<div class="post-b">
    <div class="post-h">
        <h5>Add Marksheet</h5>
        <a class="btn btn-primary" href="<?php echo admin_url() . 'postdated-marksheet' ?>">All Marksheet</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="post-d">
                <h5>Student Details</h5>
                <?php $this->load->view('admin/includes/_messages'); ?>
                <?php echo form_open_multipart('admin/save-postdated-marksheet'); ?>
           
                <div class="form-group ">
                    <label>Student Name<span class="required">*</span></label>
                    <input type="text" name="stu_name" class="form-control" required>
                </div>
                <div class="form-group ">
                    <label>Father's Name<span class="required">*</span></label>
                    <input type="text" name="f_name" class="form-control" required>
                </div>
                <div class="form-group ">
                    <label>DOB<span class="required">*</span></label>
                    <input type="date" name="dob" class="form-control" required>
                </div>
                <div class="form-group ">
                    <label>Roll No<span class="required">*</span></label>
                    <input type="text" name="roll_no" class="form-control" required>
                </div>
                <div class="form-group ">
                    <label>Registration No<span class="required">*</span></label>
                    <input type="text" name="reg_no" class="form-control" required>
                </div>
                <div class="form-group ">
                    <label>Course<span class="required">*</span></label>
                    <input type="text" name="course_name" class="form-control" required>
                </div>
                <div class="form-group ">
                    <label>Session <span class="required">*</span></label>
                    <input type="text" name="session_name" class="form-control" required>
                </div>
                <div class="form-group ">
                    <label>Photo (192 X 192 px)<span class="required">*</span></label>
                    <input type="file" name="avatar" class="form-control" >
                </div>
               
                
            </div>
            <div class="right-fifth sub-btn2">
                <button type="submit" class="">Add Marksheet</button>
            </div>
            <?php form_close(); ?>
            </div>

    </div>
</div>