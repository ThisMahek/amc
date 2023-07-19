<div class="post-b">
    <div class="post-h">
        <h5>Update Campaign</h5>
        <a class="btn btn-primary" href="<?php echo admin_url() ?>all-campaign">All Campaign</a>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="post-d">
                <h5>Campaign Details</h5>
                <?php $this->load->view('admin/includes/_messages'); ?>

                <?php echo form_open('admin/update-campaign'); ?>
                <div class="form-group">
                    <label>Language <span class="required">*</span></label>
                    <select name="lang_id" class="form-control max-600" required>
                        <?php foreach ($this->languages as $language) : ?>
                            <option value="<?php echo $language->id; ?>" <?php echo ($campaign->lang_id == $language->id) ? 'selected' : ''; ?>><?php echo $language->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Campaign Title <span class="required">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Title" required value="<?php echo $campaign->title; ?>">
                </div>
                <div class="form-group">
                    <label>Slug <span style="font-size: 13px">(If you leave it blank, it will be generated automatically.)</span></label>
                    <input type="text" name="slug" class="form-control" placeholder="Slug " value="<?php echo $campaign->slug; ?>">
                </div>
                <div class="form-group">
                    <label> Meta Keywords</label>
                    <input type="text" class="form-control" name="keywords" placeholder="Keywords (Meta Tag)" value="<?php echo $campaign->keywords; ?>">
                </div>
                <div class="form-group">
                    <label>Meta Description</label>
                    <textarea class="form-control" name="meta_description" rows="3" placeholder="Summary & Description (Meta Tag)"><?php echo $campaign->meta_description ?></textarea>
                </div>
                <div class="form-group">
                    <label>Short Description (Content will be 230 character)<span class="required">*</span></label><br>
                    <textarea name="short_description" onkeyup="countChar(this)" class=" form-control" rows="7"><?php echo $campaign->short_description ?></textarea>
                    <span id="charNum" class="color-red">0/230</span>
                </div>
                <div class="form-group">
                    <label>Full Content <span class="required">*</span></label><br>
                    <textarea name="content" class="ckeditor"><?php echo $campaign->content ?></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="post-d2">
                <div class="right-fast">
                    <h5>Image</h5>
                    <p>Featured Image</p>
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
                        <?php if (!empty($campaign->featured_image)) : ?>
                            <img src="<?php echo base_url() . 'uploads/national_campaign/' . $campaign->featured_image ?>"><a href="javascript:void(0)" onclick="remove_Campaign_featured_image(<?php echo $campaign->id ?>)"><i class="fa fa-times" aria-hidden="true"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
                <input type="hidden" name="featured_image" value="<?php echo $campaign->featured_image ?>">>
                <input type="hidden" name="old_featured_image" value="<?php echo $campaign->featured_image ?>">>
                <input type="hidden" name="id" value="<?php echo $campaign->id ?>">
                <div class="right-fifth">
                    <h5>Update</h5>
                    <button type="submit">Update Campaign</button>
                </div>
                <?php form_close(); ?>
            </div>
        </div>
    </div>
</div>