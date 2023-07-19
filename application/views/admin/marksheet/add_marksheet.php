<div class="post-b">

    <div class="row">
        <div class="col-md-12">

            <div class="post-d">
                <?php $this->load->view('admin/includes/_messages'); ?>

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
                    <select class="form-control" id="categories" name="session_id" required onchange="getStudentListsForMarksheet(this.value)">
                        <option value="">Select One</option>
                    </select>
                </div>

                <div class="table-responsive marksheet-students">
                

                </div>

            </div>
        </div>
    </div>
</div>