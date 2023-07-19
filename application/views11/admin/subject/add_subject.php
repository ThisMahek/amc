<div class="post-b">
    <div class="post-h">
        <h5>Add Subject</h5>
        <div>
            <a class="btn btn-primary" href="<?php echo admin_url() . 'subjects' ?>">All Subject</a>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="post-d">
                <h5>Subject Details</h5>
                <?php $this->load->view('admin/includes/_messages'); ?>
                <?php echo form_open('admin/save-subject'); ?>
                <div class="form-group">
                    <label>Course <span class="required">*</span></label>
                    <select name="course_id" class="form-control max-600" onchange="getyearbycourse(this.value);" required>
                        <option value="">Select One</option>
                        <?php foreach ($courses as $course) : ?>
                            <option value="<?php echo $course->id; ?>"><?php echo $course->title; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Year <span class="required">*</span></label>
                    <select class="form-control" id="categories" name="year" required>
                        <option value="">Select One</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Subject Name <span class="required">*</span></label>
                    <input type="text" name="sub_name" class="form-control" placeholder="Subject Name" required>
                </div>
                <div class="form-group">
                    <label>Subject Code <span class="required">*</span></label>
                    <input type="text" name="sub_code" class="form-control" placeholder="Subject Code" required>
                </div>
                <div class="form-group">
                    <label>Subject Order <span class="required">*</span></label>
                    <input type="number" name="sub_order" class="form-control" placeholder="Subject Order" required>
                </div>
                <div class="form-group">
                    <label>Theory </label>
                    <input type="text" name="theory" class="form-control" placeholder="marks">
                </div>
                <div class="form-group">
                    <label>Practical </label>
                    <input type="text" name="practical" class="form-control" placeholder="marks">
                </div>
                <div class="form-group">
                    <label>Internal Assessment </label>
                    <input type="text" name="internal_assessment" class="form-control" placeholder="marks">
                </div>
                <div class="right-fifth text-center">
                    <button type="submit">Add Subject</button>
                </div>
                <?php form_close(); ?>
            </div>

        </div>

    </div>

</div>