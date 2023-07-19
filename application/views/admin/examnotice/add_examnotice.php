<div class="post-b">
    <div class="post-h">
        <h5>Add Notice</h5>
        <div>
            <a class="btn btn-primary" href="<?php echo admin_url() . 'exam-notice' ?>">All Notice</a>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="post-d">
                <h5>Notice Details</h5>
                <?php $this->load->view('admin/includes/_messages'); ?>
                <?php echo form_open('admin/save-exam-notice'); ?>
                <div class="form-group">
                    <label>Course <span class="required">*</span></label>
                    <select name="course_id" class="form-control max-600" onchange="get_session_by_course(this.value);" required>
                        <option value="">Select One</option>
                        <?php foreach ($courses as $course) : ?>
                            <option value="<?php echo $course->id; ?>"><?php echo $course->title; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Session/Batch <span class="required">*</span></label>
                    <select class="form-control" id="categories" name="session_id" required>
                        <option value="">Select One</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Notice Title <span class="required">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Title" required>
                </div>
                <div class="form-group">
                    <label>Slug <span style="font-size: 13px">(If you leave it blank, it will be generated automatically.)</span></label>
                    <input type="text" name="slug" class="form-control" placeholder="Slug ">
                </div>
                <div class="form-group">
                    <label>Optional Url</label>
                    <input type="text" name="optional_url" class="form-control" placeholder="Optional Url">
                </div>
                <div class="form-group">
                    <label>Short Description (Content will be 450 character)<span class="required">*</span></label><br>
                    <textarea name="short_description" onkeyup="countChar(this)" class=" form-control" rows="7"></textarea>
                    <span id="charNum" class="color-red">0/450</span>
                </div>
                <div class="form-group">
                    <label>Full Content <span class="required">*</span></label><br>
                    <textarea name="content" class="ckeditor"></textarea>
                </div>
                <div class="right-fifth text-center">
                    <button type="submit">Publish Exam Notice</button>
                </div>
                <?php form_close(); ?>
            </div>

        </div>

    </div>

</div>