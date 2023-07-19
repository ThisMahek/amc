<div class="post-b">
    <div class="post-h">
        <h5>Update Traning Partner</h5>
        <a class="btn btn-primary" href="<?php echo admin_url() ?>partners">All Traning Partner</a>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="post-d">
                <h5>Blog Details</h5>
                <?php $this->load->view('admin/includes/_messages'); ?>

                <?php echo form_open('admin/update-partner'); ?>
                <div class="form-group">
                    <label>Partner Name <span class="required">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Title" required value="<?php echo $partner->title; ?>">
                </div>
                <div class="form-group">
                    <label>Partner Display Order <span class="required">*</span></label>
                    <input type="number" name="partner_order" class="form-control" placeholder="Order No " value="<?php echo $partner->partner_order; ?>">
                </div>
                <div class="form-group">
                    <label>Partner URL <span class="required">*</span></label>
                    <input type="text" name="partner_url" class="form-control" placeholder="Partner URL" required value="<?php echo $partner->partner_url; ?>">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="post-d2">
                <div class="right-fast">
                    <h5>Image</h5>
                    <p>Main post image</p>
                    <div class="insertimg">
                        <i class="fa fa-picture-o" aria-hidden="true"></i><br>
                        <div class="rig-btn">
                            <span class="sel-btn">

                                <input type="file" id="featured_image" onchange="featuredImageUpload()">
                                Select Image
                            </span>
                        </div>
                    </div>
                    <div class="featuredImg">
                        <?php if (!empty($partner->featured_image)) : ?>
                            <img src="<?php echo base_url() . 'uploads/traning_partner/' . $partner->featured_image ?>"><a href="javascript:void(0)" onclick="remove_featured_image(<?php echo $partner->id ?>)"><i class="fa fa-times" aria-hidden="true"></i></a>
                        <?php endif; ?>
                    </div>

                </div>




                <input type="hidden" name="featured_image" value="<?php echo $partner->featured_image ?>">>
                <input type="hidden" name="old_featured_image" value="<?php echo $partner->featured_image ?>">>

                <input type="hidden" name="id" value="<?php echo $partner->id ?>">

                <div class="right-fifth">
                    <h5>Update</h5>
                    <button type="submit">Update Traning Partner</button>
                </div>
                <?php form_close(); ?>
            </div>
        </div>
    </div>
</div>