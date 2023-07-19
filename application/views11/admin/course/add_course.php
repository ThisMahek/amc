<div class="post-b">
    <div class="post-h">
        <h5>Add course</h5>
        <a class="btn btn-primary" href="<?php echo admin_url() . 'courses' ?>">All Courses</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="post-d">
                <h5>Course Details</h5>
                <?php $this->load->view('admin/includes/_messages'); ?>

                <?php echo form_open('admin/save-courses'); ?>
                <div class="dinamicfiles__">

                </div>
                <div class="form-group">
                    <label>Course Title (Menu Name)<span class="required">*</span></label>
                    <input type="text" name="title_name" class="form-control" placeholder="menu Name" required>
                </div>
                <div class="form-group">
                    <label>Course Title <span class="required">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Title" required>
                </div>
                <div class="form-group">
                    <label>Course Duration (In Year) <span class="required">*</span></label>
                    <input type="text" name="duration_year" class="form-control" placeholder="Only input number" required maxlength="5" onkeyup="calculateCourseMonth(this.value)">
                </div>
                <div class="form-group">
                    <label>Course Duration (In Month) <span class="required">*</span></label>
                    <input type="text" name="duration_month" class="form-control" placeholder="0" required readonly>
                </div>
                <div class="form-group">
                    <label>Total Course Fees (sum all year) <span class="required">*</span></label>
                    <input type="text" name="total_fees" class="form-control" placeholder="0" required>
                </div>
                <div class="form-group">
                    <label>Admission Fees <span class="required">*</span></label>
                    <input type="text" name="admission_fees" class="form-control" placeholder="0" onblur="calculateEmi(this.value)" required>
                </div>
                <div class="form-group">
                    <label>EMI Course Fees <span class="required">*</span></label>
                    <input type="text" name="installment_fees" class="form-control" placeholder="0" required readonly>
                </div>
                <div class="form-group">
                    <label>Slug <span style="font-size: 13px">(If you leave it blank, it will be generated automatically.)</span></label>
                    <input type="text" name="slug" class="form-control" placeholder="Slug ">
                </div>
                <div class="form-group">
                    <label> Meta Keywords</label>
                    <input type="text" class="form-control" name="page_keywords" placeholder="Keywords (Meta Tag)">
                </div>
                <div class="form-group">
                    <label>Meta Description</label>
                    <textarea class="form-control" name="page_description" rows="3" placeholder="Summary & Description (Meta Tag)"></textarea>
                </div>
                <div class="form-group">
                    <label>Order <span class="required">*</span></label>
                    <input type="number" name="page_order" class="form-control" placeholder="Course Order ">
                </div>
                <div class="form-group">
                    <label>Short Description (Content will be 450 character)<span class="required">*</span></label><br>
                    <textarea name="short_description" onkeyup="countChar(this)" class=" form-control" rows="7"></textarea>
                    <span id="charNum" class="color-red">0/450</span>
                </div>
                <div class="form-group">
                    <label>Content <span class="required">*</span></label><br>
                    <textarea name="content" class="ckeditor" required></textarea>
                </div>
            </div>
            <div class="right-fifth sub-btn2">
                <button type="submit" class="">Add Course</button>
            </div>
            <?php form_close(); ?>
        </div>

    </div>
</div>