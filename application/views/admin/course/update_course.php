<div class="post-b">
    <div class="post-h">
        <h5>Update Page</h5>
        <a class="btn btn-primary" href="<?php echo admin_url() . 'courses' ?>">All Courses</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="post-d">
                <h5>Page Details</h5>
                <?php $this->load->view('admin/includes/_messages'); ?>

                <?php echo form_open('admin/update-courses'); ?>
                <div class="dinamicfiles__">

                </div>
                <div class="form-group">
                    <label>Course Title (Menu Name)<span class="required">*</span></label>
                    <input type="text" name="title_name" class="form-control" placeholder="menu Name" required value="<?php echo $page->title_name; ?>">
                </div>

                <div class="form-group">
                    <label>Page Title <span class="required">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Title" required value="<?php echo $page->title; ?>">
                </div>
                <div class="form-group">
                    <label>Course Duration (In Year) <span class="required">*</span></label>
                    <input type="text" name="duration_year" class="form-control" placeholder="Only input number" required maxlength="5" onkeyup="calculateCourseMonth(this.value)" value="<?php echo $page->duration_year ?>">
                </div>
                <div class="form-group">
                    <label>Course Duration (In Month) <span class="required">*</span></label>
                    <input type="text" name="duration_month" class="form-control" placeholder="0" value="<?php echo $page->duration_month ?>" required readonly>
                </div>
               
                <div class="form-group">
                    <label>Admission Fees <span class="required">*</span></label>
                    <input type="text" name="admission_fees" class="form-control" placeholder="0" onblur="calculateEmi(this.value)" value="<?php echo $page->admission_fees ?>" required>
                </div>
              
                <div class="form-group">
                    <label>Slug <span style="font-size: 13px">(If you leave it blank, it will be generated automatically.)</span></label>
                    <input type="text" name="slug" class="form-control" placeholder="Slug " value="<?php echo $page->slug; ?>">
                </div>
                <div class="form-group">
                    <label> Meta Keywords</label>
                    <input type="text" class="form-control" name="page_keywords" placeholder="Keywords (Meta Tag)" value="<?php echo $page->page_keywords; ?>">
                </div>
                <div class="form-group">
                    <label>Meta Description</label>
                    <textarea class="form-control" name="page_description" rows="3" placeholder="Summary & Description (Meta Tag)"><?php echo $page->page_description ?></textarea>
                </div>
                <div class="form-group">
                    <label>Order <span class="required">*</span></label>
                    <input type="number" name="page_order" value="<?php echo $page->page_order ?>" class="form-control" placeholder="Page Order ">
                </div>

                <input type="hidden" name="id" value="<?php echo $page->id ?>">

                <div class="form-group">
                    <label>Short Description (Content will be 450 character)<span class="required">*</span></label><br>
                    <textarea name="short_description" onkeyup="countChar(this)" class=" form-control" rows="7"><?php echo $page->short_description ?></textarea>
                    <span id="charNum" class="color-red">0/450</span>
                </div>

              

                <div class="form-group">
                    <label>Page Content <span class="required">*</span></label><br>
                    <textarea name="content" class="ckeditor"><?php echo $page->content ?></textarea>
                </div>

            </div>

            <div class="right-fifth sub-btn2">
                <button type="submit" class="">Update Course</button>
            </div>

        </div>
    </div>
    <?php form_close(); ?>
</div>