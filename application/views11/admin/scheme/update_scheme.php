<div class="post-b">
    <div class="post-h">
        <h5>Update Scheme</h5>
        <a class="btn btn-primary" href="<?php echo admin_url() ?>all-scheme">All scheme</a>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="post-d">
                <h5>Scheme Details</h5>
                <?php $this->load->view('admin/includes/_messages'); ?>
                <?php echo form_open('admin/update-scheme'); ?>
                <div class="form-group">
                    <label>Language <span class="required">*</span></label>
                    <select name="lang_id" class="form-control max-600" onchange="get_Scheme_categories_by_lang(this.value);" required>
                        <?php foreach ($this->languages as $language) : ?>
                            <option value="<?php echo $language->id; ?>" <?php echo ($post->lang_id == $language->id) ? 'selected' : ''; ?>><?php echo $language->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Category <span class="required">*</span></label>
                    <select class="form-control" id="categories" name="category_id" required>
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $key => $value) : ?>
                            <option value="<?php echo $value->id; ?>" <?php echo ($post->category_id == $value->id) ? 'selected' : ''; ?>><?php echo $value->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Scheme Title <span class="required">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Title" required value="<?php echo $post->title; ?>">
                </div>
                <div class="form-group">
                    <label>Slug <span style="font-size: 13px">(If you leave it blank, it will be generated automatically.)</span></label>
                    <input type="text" name="slug" class="form-control" placeholder="Slug " value="<?php echo $post->slug; ?>">
                </div>
                <div class="form-group">
                    <label> Meta Keywords</label>
                    <input type="text" class="form-control" name="keywords" placeholder="Keywords (Meta Tag)" value="<?php echo $post->keywords; ?>">
                </div>
                <div class="form-group">
                    <label>Meta Description</label>
                    <textarea class="form-control" name="meta_description" rows="3" placeholder="Summary & Description (Meta Tag)"><?php echo $post->meta_description ?></textarea>
                </div>


                <div class="form-group">
                    <label>Short Description <span class="required">*</span></label><br>
                    <textarea name="short_description" class="ckeditor"><?php echo $post->short_description ?></textarea>
                </div>
                <div class="form-group">
                    <label>Full Content <span class="required">*</span></label><br>
                    <textarea name="content" class="ckeditor"><?php echo $post->content ?></textarea>
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
                        <?php if (!empty($post->featured_image)) : ?>
                            <img src="<?php echo base_url() . 'uploads/govt_scheme/' . $post->featured_image ?>"><a href="javascript:void(0)" onclick="remove_govt_scheme_featured_image(<?php echo $post->id ?>)"><i class="fa fa-times" aria-hidden="true"></i></a>
                        <?php endif; ?>
                    </div>

                </div>



                <input type="hidden" name="featured_image" value="<?php echo $post->featured_image ?>">>
                <input type="hidden" name="old_featured_image" value="<?php echo $post->featured_image ?>">>
                <input type="hidden" name="id" value="<?php echo $post->id ?>">

                <div class="right-fifth">
                    <h5>Update</h5>
                    <button type="submit">Update Scheme Post</button>
                </div>
                <?php form_close(); ?>
            </div>
        </div>
    </div>
</div>