<div class="post-b">
    <div class="post-h">
        <h5>Add Scheme</h5>
        <div>
            <a class="btn btn-primary" href="<?php echo admin_url() ?>all-scheme">All scheme</a>
        </div>

    </div>
    <div class=" row">
        <div class="col-md-8">

            <div class="post-d">
                <h5>Scheme Details</h5>
                <?php $this->load->view('admin/includes/_messages'); ?>

                <?php echo form_open('admin/save-scheme'); ?>
                <div class="form-group">
                    <label>Language <span class="required">*</span></label>
                    <select name="lang_id" class="form-control max-600" onchange="get_Scheme_categories_by_lang(this.value);" required>
                        <?php foreach ($this->languages as $language) : ?>
                            <option value="<?php echo $language->id; ?>" <?php echo ($this->selected_lang->id == $language->id) ? 'selected' : ''; ?>><?php echo $language->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Category <span class="required">*</span></label>
                    <select class="form-control" id="categories" name="category_id" required>
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $key => $value) : ?>
                            <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Scheme Title <span class="required">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Title" required>
                </div>
                <div class="form-group">
                    <label>Slug <span style="font-size: 13px">(If you leave it blank, it will be generated automatically.)</span></label>
                    <input type="text" name="slug" class="form-control" placeholder="Slug ">
                </div>
                <div class="form-group">
                    <label> Meta Keywords</label>
                    <input type="text" class="form-control" name="keywords" placeholder="Keywords (Meta Tag)">
                </div>
                <div class="form-group">
                    <label>Meta Description</label>
                    <textarea class="form-control" name="meta_description" rows="3" placeholder="Summary & Description (Meta Tag)"></textarea>
                </div>

            
                <div class="form-group">
                    <label>Short Description (Content will be 230 character)<span class="required">*</span></label><br>
                    <textarea name="short_description" onkeyup="countChar(this)" class=" form-control" rows="7"></textarea>
                    <span id="charNum" class="color-red">0/230</span>
                </div>
                <div class="form-group">
                    <label>Full Content <span class="required">*</span></label><br>
                    <textarea name="content" class="ckeditor"></textarea>
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
                    <div class="featuredImg"></div>

                </div>
                <input type="hidden" name="featured_image">
                <div class="right-fifth">
                    <h5>Publish</h5>
                    <button type="submit">Add Scheme</button>
                </div>
                <?php form_close(); ?>
            </div>
        </div>
    </div>

</div>