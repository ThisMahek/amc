<div class="col-sm-12">
    <?php $this->load->view('franchise/includes/_messages'); ?>
</div>

<div class="wrapper2">
    <div class="mblog">
        <?php echo form_open('franchisestudent_controller/application_approve_post'); ?>
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
            <label>Session / Batch</label>
            <select class="form-control drop-arrow" name="session_id" required>
                <option value="">Select One</option>
                <?php foreach ($sessions as $session) : ?>
                    <option value="<?php echo $session->id ?>" ><?php echo $session->session_name." [ ".$session->start_date." ]" ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $student->id ?>">
    <div class="sav-btn">
        <button type="submit">Admission Granted </button>
    </div>
    <?php echo form_close(); ?>
</div>