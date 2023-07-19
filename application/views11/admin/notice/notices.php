<div class="wrapper2">
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>
    <div class="mblog-post">
        <div class="text-right madd-btn">
            <a href="<?php echo admin_url() ?>add-notice" class="add-pag">Add Notice</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($notices as $item) : ?>
                        <tr>
                            <td><?php echo html_escape($item->id); ?></td>
                            <td class="td-product">

                                <a href="<?php echo generate_url("notice") . "/" . $item->slug; ?>" target="_blank" class="a-table">
                                    <?php echo html_escape($item->title); ?>
                                </a>
                            </td>
                            <td><?php if ($item->status == 1) : ?>
                                    <a class="btn btn-danger" href="javascript:void(0)" onclick="delete_item('notice_controller/change_status','<?php echo $item->id; ?>','Are you want to change status?');"> <i class="fa fa-eye-slash" aria-hidden="true"></i> Hide Me </a>
                                <?php else : ?>
                                    <a class="btn btn-success" href="javascript:void(0)" onclick="delete_item('notice_controller/change_status','<?php echo $item->id; ?>','Are you want to change status?');"> <i class="fa fa-eye" aria-hidden="true"></i> Show Me </a>
                                <?php endif; ?>

                            </td>
                            <td><?php echo formatted_date($item->created_at); ?></td>
                            <td class="drp-btn">
                                <div class="dropdown drp">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select a Option
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="<?php echo admin_url(); ?>edit-notice/<?php echo html_escape($item->id); ?>">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                        <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('notice_controller/delete_notice','<?php echo $item->id; ?>','Are you want to delete this item?');">Delete <i class="fa fa-trash" aria-hidden="true"></i></a>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Option</th>
                    </tr>
                </tfoot>
            </table>
            <div class="text-right madd-btn">
                <a href="<?php echo admin_url() ?>add-notice"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Notice </a>
            </div>
        </div>
    </div>