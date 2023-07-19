<div class="post-b">
    <div class="post-h">
        <h5>Update Page</h5>
        <a class="btn btn-primary" href="<?php echo admin_url() . 'all-pages' ?>">All Page</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="post-d">
                <h5>Page Details</h5>
                <?php $this->load->view('admin/includes/_messages'); ?>

                <?php echo form_open('admin/update-page'); ?>
                <div class="dinamicfiles__">

                </div>

                <div class="form-group">
                    <label>Page Title <span class="required">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Title" required value="<?php echo $page->title; ?>">
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
                <div class="form-group">
                    <label>Location <span class="required">*</span></label><br>
                    <div class="radio">
                        <label><input type="radio" name="location" value="top" <?php echo ($page->location == "top") ? 'checked' : ''; ?>>Header</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="location" value="footer" <?php echo ($page->location == "footer") ? 'checked' : ''; ?>>Footer</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="location" value="both" <?php echo ($page->location == "both") ? 'checked' : ''; ?>>Both</label>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $page->id ?>">


                <div class="form-group">
                    <label>Page Content <span class="required">*</span></label><br>
                    <textarea name="content" class="ckeditor"><?php echo $page->page_content ?></textarea>
                </div>

            </div>

            <div class="right-fifth sub-btn2">
                <button type="submit" class="">Update Page</button>
            </div>

        </div>
    </div>
    <?php form_close(); ?>
</div>