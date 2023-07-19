<div class="post-b">
    <div class="post-h">
        <h5>Edit Notice</h5>
        <div>
            <a class="btn btn-primary" href="<?php echo admin_url() . 'subjects' ?>">All Subject</a>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="post-d">
                <h5>Notice Details</h5>
                <?php $this->load->view('admin/includes/_messages'); ?>
                <?php echo form_open('admin/update-subject'); ?>
                <div class="form-group">
                    <label>Course <span class="required">*</span></label>
                    <select name="course_id" class="form-control max-600" onchange="getyearbycourse(this.value);" required>
                        <option value="">Select One</option>
                        <?php foreach ($courses as $course) : ?>
                            <option value="<?php echo $course->id; ?>" <?php echo ($course->id == $subject->course_id) ? "selected" : "" ?>><?php echo $course->title; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Year <span class="required">*</span></label>
                    <select class="form-control" id="categories" name="year" required>
                        <option value="">Select One</option>
                        <?php for ($i = 1; $i <= $years; $i++) : ?>
                            <option value="<?php echo $i; ?>" <?php echo ($i == $subject->year) ? "selected" : "" ?>><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Subject Name <span class="required">*</span></label>
                    <input type="text" name="sub_name" class="form-control" placeholder="Subject Name" required value="<?php echo $subject->sub_name ?>">
                </div>
                <div class="form-group">
                    <label>Subject Code <span class="required">*</span></label>
                    <input type="text" name="sub_code" class="form-control" placeholder="Subject Code" required value="<?php echo $subject->sub_code ?>">
                </div>
                <div class="form-group">
                    <label>Subject Order <span class="required">*</span></label>
                    <input type="number" name="sub_order" class="form-control" placeholder="Subject Order" value="<?php echo $subject->sub_order ?>" required>
                </div>
                <div class="form-group">
                    <label>Theory </label>
                    <input type="text" name="theory" class="form-control" placeholder="marks" value="<?php echo $subject->theory ?>">
                </div>
                <div class="form-group">
                    <label>Practical </label>
                    <input type="text" name="practical" class="form-control" placeholder="marks" value="<?php echo $subject->practical ?>">
                </div>
                <div class="form-group">
                    <label>Internal Assessment </label>
                    <input type="text" name="internal_assessment" class="form-control" placeholder="marks" value="<?php echo $subject->internal_assessment ?>">
                </div>
                <div class="right-fifth text-center">
                    <input type="hidden" name="id" value="<?php echo $subject->id ?>">
                    <button type="submit">Update Exam Notice</button>
                </div>
                <?php form_close(); ?>
            </div>

        </div>

    </div>

</div>