<div class="wrapper2">
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>
    <div class="mblog-post">
        <h3 class="box-title"><?php echo trans('banner_items'); ?></h3>
        <div class="text-right madd-btn">

        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable" id="cs_datatable_lang" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th><?php echo trans('image'); ?></th>
                        <th><?php echo trans('language'); ?></th>
                        
                        <th class="th-options"><?php echo trans('options'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($slider_items as $item) : ?>
                        <tr>

                            <td class="td-product">

                                <img src="<?php echo base_url() . 'uploads/slider/' . $item->image; ?>" alt="" width="100%" height="80px" />

                            </td>
                            <td>
                                <?php
                                $language = get_language($item->lang_id);
                                if (!empty($language)) {
                                    echo $language->name;
                                } ?>
                            </td>
                            <td class="drp-btn">
                                <div class="dropdown drp">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select a Option
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="<?php echo admin_url(); ?>update-banner-item/<?php echo html_escape($item->id); ?>"><?php echo trans('edit'); ?> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                        <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('admin/delete_banner_item_post','<?php echo $item->id; ?>','<?php echo trans('confirm_banner_item'); ?>');"><?php echo trans('delete'); ?> <i class="fa fa-trash" aria-hidden="true"></i></a>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th><?php echo trans('image'); ?></th>
                        <th><?php echo trans('language'); ?></th>
                       
                        <th class="th-options"><?php echo trans('options'); ?></th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
</div>
<div class="wrapper2">
    <div class="mblog">
        <?php echo form_open_multipart('admin/add_banner_item_post'); ?>
        <div class="form-group">
            <label><?php echo trans("language"); ?></label>
            <select name="lang_id" class="form-control" required>
                <?php foreach ($this->languages as $language) : ?>
                    <option value="<?php echo $language->id; ?>" <?php echo ($this->selected_lang->id == $language->id) ? 'selected' : ''; ?>><?php echo $language->name; ?></option>
                <?php endforeach; ?>
            </select>

        </div>
        
        <div class="form-group">
            <label><?php echo trans('image'); ?> (1920x600)</label>
            <input type="file" name="image" class="form-control" accept=".png, .jpg, .jpeg, .gif" required>

        </div>
        <div class="sav-btn">
            <button type="submit" class="btn btn-primary"><?php echo trans('add_banner_item'); ?></button>
        </div>
        <?php echo form_close(); ?>
        <!-- form end -->

    </div>
</div>