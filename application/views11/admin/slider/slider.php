<div class="wrapper2">
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>
    <div class="mblog-post">
        <h3 class="box-title"><?php echo ('Slider Item'); ?></h3>
        <div class="text-right madd-btn">
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th><?php echo ('image'); ?></th>

                        <th><?php echo ('order'); ?></th>
                        <th class="th-options"><?php echo ('options'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($slider_items as $item) : ?>
                        <tr>

                            <td class="td-product">

                                <img src="<?php echo base_url() . 'uploads/slider/' . $item->image; ?>" alt="" width="150" height="80px" />

                            </td>

                            <td><?php echo html_escape($item->item_order); ?></td>
                            <td class="drp-btn">
                                <div class="dropdown drp">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select a Option
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="<?php echo admin_url(); ?>update-slider-item/<?php echo html_escape($item->id); ?>"><?php echo ('edit'); ?> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                        <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('admin_controller/delete_slider_item_post','<?php echo $item->id; ?>','<?php echo ('Are you sure to delte this item?'); ?>');"><?php echo ('delete'); ?> <i class="fa fa-trash" aria-hidden="true"></i></a>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th><?php echo ('image'); ?></th>
                        <th><?php echo ('order'); ?></th>
                        <th class="th-options"><?php echo ('options'); ?></th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
</div>
<div class="wrapper2">
    <div class="mblog">
        <?php echo form_open_multipart('admin_controller/add_slider_item_post'); ?>
        <?php echo ('Add New Slider'); ?>
        
      <!--   <div class="form-group">
            <label class="control-label"><?php echo ('title'); ?></label>
            <input type="text" class="form-control" name="title" placeholder="<?php echo ('title'); ?>" required>

        </div>
        <div class="form-group">
            <label class="control-label"><?php echo ('title'); ?>1</label>
            <input type="text" class="form-control" name="title1" placeholder="<?php echo ('title'); ?>">

        </div>
        <div class="form-group">
            <label class="control-label"><?php echo ('title'); ?>2</label>
            <input type="text" class="form-control" name="title2" placeholder="<?php echo ('title'); ?>">

        </div>-->
        <div class="form-group">
            <label class="control-label"><?php echo ('Slider order'); ?></label>
            <input type="number" class="form-control" name="item_order" placeholder="<?php echo ('order'); ?>" required>

        </div>
        <div class="form-group">
            <label><?php echo ('Slider image'); ?> (1200x1200)</label>
            <input type="file" name="image" class="form-control" accept=".png, .jpg, .jpeg, .gif" required>

        </div>
        <div class="sav-btn">
            <button type="submit" class="btn btn-primary"><?php echo ('Add Slider'); ?></button>
        </div>
        <?php echo form_close(); ?>
        <!-- form end -->

    </div>
</div>