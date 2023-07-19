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
                <?php echo form_open_multipart('admin/save-old-marksheet'); ?>
           
                <div class="form-group ">
                    <label>Student Name<span class="required">*</span></label>
                    <input type="text" name="stu_name" class="form-control" required value="<?php echo $marksheet->stu_name ?>">
                </div>
                <div class="form-group ">
                    <label>Father's Name<span class="required">*</span></label>
                    <input type="text" name="f_name" class="form-control" required value="<?php echo $marksheet->f_name ?>">
                </div>
                <div class="form-group ">
                    <label>DOB<span class="required">*</span></label>
                    <input type="date" name="dob" class="form-control" required value="<?php echo $marksheet->dob ?>">
                </div>
                <div class="form-group ">
                    <label>Roll No<span class="required">*</span></label>
                    <input type="text" name="roll_no" class="form-control" required value="<?php echo $marksheet->roll_no ?>">
                </div>
                <div class="form-group ">
                    <label>Registration No<span class="required">*</span></label>
                    <input type="text" name="reg_no" class="form-control" required value="<?php echo $marksheet->reg_no ?>">
                </div>
                <div class="form-group ">
                    <label>Course<span class="required">*</span></label>
                    <input type="text" name="course_name" class="form-control" required value="<?php echo $marksheet->course_name ?>">
                </div>
                <div class="form-group ">
                    <label>Session <span class="required">*</span></label>
                    <input type="text" name="session_name" class="form-control" required value="<?php echo $marksheet->session_name ?>">
                </div>
                <div class="form-group ">
                    <label>Photo (192 X 192 px)<span class="required">*</span></label>
                    <?php if($marksheet->avatar):?>
                    <div style="width:200px;margin-bottom: 5px;">
                        <img src="<?php echo base_url().'uploads/old_student_images/'.$marksheet->avatar ?>" class="img-thumbnail">
                    </div>
                    <?php endif;?>
                    <input type="file" name="avatar" class="form-control" >
                </div>
               
                
            </div>
            <div class="right-fifth sub-btn2">
                <input type="hidden" name="id" value="<?php echo $marksheet->id ?>">
                <input type="hidden" name="old_img" value="<?php echo $marksheet->avatar ?>">
                <button type="submit" class="">Add Marksheet</button>
            </div>
            <?php form_close(); ?>
            </div>

    </div>
</div>