<div class="wrapper2">
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>
    <div class="mblog-post">
        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable" id="cs_datatable_lang" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th class="text-center">Uploded Files</th>
                        <th>Date</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages as $item) : ?>
                        <tr>
                            <td><?php echo html_escape($item->id); ?></td>
                            <td class="td-product">
                                <?php echo html_escape($item->name); ?>
                            </td>
                            <td><?php echo html_escape($item->email); ?></td>
                            <td><?php echo html_escape($item->message); ?></td>
                            <td class="text-center">
                                <?php echo form_open('admin/download-cv'); ?>
                                <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                                <button type="submit "><i class="fa fa-download fa-3x" aria-hidden="true"></i> </button>
                                <?php //echo html_escape($item->cv_file); ?>
                                <?php echo form_close(); ?>

                            </td>
                            <td><?php echo formatted_date($item->created_at); ?></td>
                            <td class="drp-btn">
                                <div class="dropdown drp">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select a Option
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('admin/delete_engage_with_us_messages','<?php echo $item->id; ?>','Are you want to delete this item?');">Delete <i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Uploded Files</th>
                        <th>Date</th>
                        <th>Option</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>