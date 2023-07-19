<div class="wrapper">
    <div class="">
        <?php echo form_open_multipart('admin_controller/home_counter_settings_post'); ?>
        <div class="wrapper-box">
            <h1 class="text-center">Counter Section</h1>
            <div class="col-sm-12">
                <?php $this->load->view('admin/includes/_messages'); ?>
            </div>
            <div class="wrapper-box-content">
                <div class="m-wrapper-content">

                    <div class="captcha">
                        <div class="captcha-content">
                            <div class="form-group">
                                <label>Counter 1 Heading</label>
                                <input type="text" name="c1_heading" value="<?php echo $panel_data->c1_heading; ?>" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Counter 1 Value</label>
                                <input type="text" name="c1_num" value="<?php echo $panel_data->c1_num; ?>" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Counter 2 Heading</label>
                                <input type="text" name="c2_heading" value="<?php echo $panel_data->c2_heading; ?>" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Counter 2 Value</label>
                                <input type="text" name="c2_num" value="<?php echo $panel_data->c2_num; ?>" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Counter 3 Heading</label>
                                <input type="text" name="c3_heading" value="<?php echo $panel_data->c3_heading; ?>" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Counter 3 Value</label>
                                <input type="text" name="c3_num" value="<?php echo $panel_data->c3_num; ?>" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Counter 4 Heading</label>
                                <input type="text" name="c4_heading" value="<?php echo $panel_data->c4_heading; ?>" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Counter 4 Value</label>
                                <input type="text" name="c4_num" value="<?php echo $panel_data->c4_num; ?>" class="form-control" placeholder="">
                            </div>
                            <div class="sav-btn">
                                <button>Save Changes</button>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>