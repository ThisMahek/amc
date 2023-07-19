<div class="post-b">
    <div class="post-h">
        <h5>Add Teaning Partner</h5>
        <div>
            <a class="btn btn-primary" href="<?php echo admin_url() ?>partners">All partner</a>
        </div>

    </div>
    <div class="row">
        <div class="col-md-8">

            <div class="post-d">
                <h5>Teaning Partner Details</h5>
                <?php $this->load->view('admin/includes/_messages'); ?>
                <?php echo form_open('admin/save-partner'); ?>
                <div class="dinamicfiles__">

                </div>

                <div class="form-group">
                    <label>Partner Name <span class="required">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Title" required>
                </div>
                <div class="form-group">
                    <label>Partner Display Order <span class="required">*</span></label>
                    <input type="number" name="partner_order" class="form-control" placeholder="Partner Display Order">
                </div>
                <div class="form-group">
                    <label>Partner URL <span class="required">*</span></label>
                    <input type="text" class="form-control" name="partner_url" placeholder="Partner URL">
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="post-d2">
                <div class="right-fast">
                    <h5>Image</h5>
                    <p>Featured image</p>
                    <div class="insertimg">
                        <i class="fa fa-picture-o" aria-hidden="true"></i><br>
                        <div class="rig-btn">
                            <span class="sel-btn">

                                <input type="file" id="featured_image" onchange="featuredImageUpload()">
                                Select Image
                            </span>
                        </div>
                    </div>
                    <div class="featuredImg"></div>

                </div>

                <input type="hidden" name="featured_image">


                <div class="right-fifth">
                    <h5>Publish</h5>
                    <button type="submit">Add Partner</button>
                </div>
                <?php form_close(); ?>
            </div>
        </div>
    </div>

</div>