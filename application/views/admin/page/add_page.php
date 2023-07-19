<div class="post-b">
    <div class="post-h">
        <h5>Add Page</h5>
        <a class="btn btn-primary" href="<?php echo admin_url() . 'all-pages' ?>">All Page</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="post-d">
                <h5>Page Details</h5>
                <?php $this->load->view('admin/includes/_messages'); ?>

                <?php echo form_open('admin/save-page'); ?>
                <div class="dinamicfiles__">

                </div>
                <div class="form-group">
                    <label>Page Title <span class="required">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Title" required>
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
                    <input type="number" name="page_order" class="form-control" placeholder="Page Order ">
                </div>
                <div class="form-group">
                    <label>Location <span class="required">*</span></label><br>
                    <div class="radio">
                        <label><input type="radio" name="location" value="top" checked>Header</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="location" value="footer">Footer</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="location" value="both">Both</label>
                    </div>
                </div>


                <div class="form-group">
                    <label>Content <span class="required">*</span></label><br>
                    <textarea name="content" class="ckeditor" required></textarea>
                </div>
            </div>
            <div class="right-fifth sub-btn2">
                <button type="submit" class="">Add Page</button>
            </div>
            <?php form_close(); ?>
        </div>

    </div>
</div>