<div class="wrapper2">
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>
    <div class="mblog">
        <h3 class="box-title"><?php echo trans('update_banner_item'); ?></h3>
        <?php echo form_open_multipart('admin/update_banner_item_post'); ?>
        <input type="hidden" name="id" value="<?php echo $item->id; ?>">
        <div class="form-group">
            <label><?php echo trans("language"); ?></label>
            <select name="lang_id" class="form-control">
                <?php foreach ($this->languages as $language) : ?>
                    <option value="<?php echo $language->id; ?>" <?php echo ($item->lang_id == $language->id) ? 'selected' : ''; ?>><?php echo $language->name; ?></option>
                <?php endforeach; ?>
            </select>

        </div>
        <div class="form-group">
            <label><?php echo trans('image'); ?> (1920x600)</label>
            <div class="display-block m-b-15">
                <img src="<?php echo base_url() . 'uploads/slider/' . $item->image; ?>" alt="" class="img-responsive" style="max-width: 300px; max-height: 300px;">
            </div>
            <input type="file" name="image" class="form-control" accept=".png, .jpg, .jpeg, .gif">

        </div>
        <div class="sav-btn">
            <button type="submit" class="btn btn-primary pull-right"><?php echo trans('add_update_item'); ?></button>
        </div>
        <?php echo form_close(); ?>
        <!-- form end -->

    </div>
</div>