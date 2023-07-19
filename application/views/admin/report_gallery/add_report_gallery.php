<div class="post-b">
    <div class="post-h">
        <h5>Add Image</h5>
        <div>
            <a class="btn btn-primary" href="<?php echo admin_url() ?>report-gallery">Report Gallery</a>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="post-d">
                <h5>Report Details</h5>
                <?php $this->load->view('admin/includes/_messages'); ?>
                <?php echo form_open_multipart('admin/save-report-gallery'); ?>
                <div class="form-group">
                    <label>Language <span class="required">*</span></label>
                    <select name="lang_id" class="form-control max-600" required>
                        <?php foreach ($this->languages as $language) : ?>
                            <option value="<?php echo $language->id; ?>" <?php echo ($this->selected_lang->id == $language->id) ? 'selected' : ''; ?>><?php echo $language->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Report Title <span class="required">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Title" required>
                </div>
                <div class="form-group">
                    <label>File Included <span class="required">*</span></label><br>
                    <input type="radio" name="has_file" value="1" required> Yes <span> <input type="radio" name="has_file" value="0" required> No</span>
                </div>
                <div class="form-group">
                    <label>Image (jpg,jpeg,png)</label>
                    <input type="file" name="image" placeholder="image" accept="image/png,image/jpg, image/jpeg" required>
                </div>
                <div class="form-group">
                    <label>File (pdf only)</label>
                    <input type="file" name="file_name" placeholder="file_name" accept="application/pdf" />
                </div>
                <div class="sav-btn">
                    <button>Save Changes</button>
                </div>

            </div>
        </div>

    </div>

</div>