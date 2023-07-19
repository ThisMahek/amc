<div class="col-sm-12">
    <?php $this->load->view('franchise/includes/_messages'); ?>
</div>

<div class="wrapper2">
    <div class="mblog">
        <?php echo form_open('franchisestudent_controller/reject_student_app_post'); ?>
        <div class="form-group">
            <label>Student Name</label>
            <input type="text" class="form-control" value="<?php echo $student->stu_name ?>" disabled>
        </div>
        <div class="form-group">
            <label>Course applied for </label>
            <input type="text" class="form-control" value="<?php echo html_escape(getCourseNameByID($student->course_id)); ?>" disabled>
        </div>
        <div class="form-group">
            <label>Roll No </label>
            <input type="text" name="" class="form-control" value="<?php echo $student->roll_no  ?>" disabled>
        </div>
        <div class="form-group">
            <label>Enrollment No </label>
            <input type="text" name="" class="form-control" value="<?php echo $student->enroll_no ?>" disabled>
        </div>
        <div class="form-group">
            <label>Registration No </label>
            <input type="text" name="" class="form-control" value="<?php echo $student->reg_no ?>" disabled>
        </div>
        <div class="form-group">
            <label>Rejection Cause</label>
            <textarea name="rejection_cause" class="form-control ckeditor" placeholder="Cause" required></textarea>
        </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $student->id ?>">
    <div class="sav-btn">
        <button type="submit">Reject</button>
    </div>
    <?php echo form_close(); ?>
</div>