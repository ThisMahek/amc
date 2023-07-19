<div class="post-b">
    <div class="post-h">
        <h5>Add Notice</h5>
        <div class="text-right madd-btn">
            <a href="<?php echo admin_url() ?>notices" class="add-pag">Notices</a>
        </div>

    </div>
    <div class="row">
        <div class="col-md-8">

            <div class="post-d">
                <h5>Notice Details</h5>
                <?php $this->load->view('admin/includes/_messages'); ?>

                <?php echo form_open('admin/save-notice'); ?>
                <div class="dinamicfiles__">

                </div>

                <div class="form-group">
                    <label>Notice Title <span class="required">*</span></label>
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
                    <label>Optional Url</label>
                    <input type="text" name="optional_url" class="form-control" placeholder="Optional Url">
                </div>
                <div class="form-group">
                    <label>Short Description (Content will be 450 character)<span class="required">*</span></label><br>
                    <textarea name="short_description" onkeyup="countChar(this)" class=" form-control" rows="7"></textarea>
                    <span id="charNum" class="color-red">0/450</span>
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
                <div class="right-second">
                    <h5>Additional Images</h5>
                    <p>More main images (slider will be active)</p>
                    <span class="sel-btn ">
                        <input type="file" id="extra_image" onchange="additionalImageUpload()">
                        Select Image
                    </span>
                    <div class="sml-imag extra_img_div">

                    </div>
                </div>
                <div class="right-third">
                    <h5>Files</h5>
                    <p>Downloadable additional files (.pdf, .doc, .ppt etc..)</p>

                    <span class="sel-btn">
                        <input type="file" id="upload_files" onchange="uploadFiles()">
                        Select File

                    </span>
                    <ul class="fileList">
                    </ul>
                    <div class="fuploadErr">
                    </div>
                    <div class="dinamicfiles">

                    </div>
                </div>
                <input type="hidden" name="extra_image">
                <input type="hidden" name="featured_image">
                <input type="hidden" name="file_index" value="1">

                <div class="right-fifth">
                    <h5>Publish</h5>
                    <button type="submit">Add Notice Post</button>
                </div>
                <?php form_close(); ?>
            </div>
        </div>
    </div>

</div>