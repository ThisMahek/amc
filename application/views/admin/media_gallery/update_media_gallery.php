<div class="post-b">
    <div class="post-h">
        <h5>Edit Image</h5>
        <div>
            <a class="btn btn-primary" href="<?php echo admin_url() ?>media-gallery">Media Gallery</a>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="post-d">
                <h5>Image Details</h5>
                <?php $this->load->view('admin/includes/_messages'); ?>
                <?php echo form_open_multipart('admin/update-media-gallery'); ?>
                <div class="form-group">
                    <label>Language <span class="required">*</span></label>
                    <select name="lang_id" class="form-control max-600" required>
                        <?php foreach ($this->languages as $language) : ?>
                            <option value="<?php echo $language->id; ?>" <?php echo ($media_gallery->lang_id == $language->id) ? 'selected' : ''; ?>><?php echo $language->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Image Title <span class="required">*</span></label>
                    <input type="text" name="title" value="<?php echo $media_gallery->title ?>" class="form-control" placeholder="Title" required>
                </div>
                <div class="form-group">
                    <label>File Included <span class="required">*</span></label><br>
                    <input type="radio" name="has_file" value="1" required <?php echo ($media_gallery->has_file == 1) ? 'checked' : '' ?>> Yes <span> <input type="radio" name="has_file" value="0" required <?php echo ($media_gallery->has_file == 0) ? 'checked' : '' ?>> No</span>
                </div>
                <div class="form-group">
                    <label>Image (jpg,jpeg,png)</label>
                    <?php if (!empty($media_gallery->image)) : ?>
                        <div class="row mx-auto">
                            <div class="col-md-3">
                                <img src="<?php echo base_url() . 'uploads/media_gallery/' . $media_gallery->image ?>" style="width: 100%; padding:10px 0">
                            </div>
                        </div>

                    <?php else : ?>
                        <div class="row mx-auto">
                            <div class="col-md-3">
                                <img src="<?php echo base_url() . 'assets/backend/images/noimg.png' ?>" style="width: 100%; padding:10px 0">
                            </div>
                        </div>

                    <?php endif; ?>
                    <input type="file" name="image" class="" value="" placeholder="Image" ccept="image/png,image/jpg, image/jpeg">
                </div>
                <div class="form-group">
                    <label>File (pdf only)</label>
                    <?php if (!empty($media_gallery->file_name)) : ?>
                        <div class="row mx-auto">
                            <div class="col-md-3">
                                <i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: 100px;margin:10px 0px;"></i>
                                <p><?php echo $media_gallery->file_name ?></p>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="row mx-auto">
                            <div class="col-md-3">
                                <i class="fa fa-ban" aria-hidden="true" style="font-size: 100px;margin:10px 0px;"></i>
                                <p><?php echo $media_gallery->file_name ?></p>

                            </div>
                        </div>

                    <?php endif; ?>
                    <input type="file" name="file_name" class="" value="" placeholder="file name" accept="application/pdf">
                </div>
                <input type="hidden" name="oldIng" value="<?php echo $media_gallery->image; ?>">
                <input type="hidden" name="oldFile" value="<?php echo $media_gallery->file_name; ?>">
                <input type="hidden" name="id" value="<?php echo $media_gallery->id; ?>">
                <div class="sav-btn">
                    <button>Save Changes</button>
                </div>

            </div>
        </div>

    </div>

</div>