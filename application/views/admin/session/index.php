<div class="wrapper2">
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>
    <div class="mblog-post">
        <div class="text-right madd-btn">
            <a href="<?php echo admin_url() . 'add-sessions' ?>" class="add-pag">Add Session</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Session Name</th>
                        <th>Course</th>
                        <th>Total Fee</th>
                        <th>Admission Fee</th>
                        <th>EMI Fee</th>
                        <th>Start On</th>
                        <th>Created On</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sessions as $item) : ?>
                        <tr>
                            <td><?php echo html_escape($item->id); ?></td>
                            <td><?php echo html_escape($item->session_name); ?></td>

                            <td><?php echo getClassNameByID($item->class_id); ?></td>
                            <td><?php echo number_format($item->total_fees,2); ?></td>
                            <td><?php echo number_format($item->admission_fees,2); ?></td>
                            <td><?php echo number_format($item->installment_fees,2); ?></td>
                            <td><?php echo formatted_date($item->start_date); ?></td>
                            <td><?php echo formatted_date($item->created_at); ?></td>
                            <td class="drp-btn">
                                <div class="dropdown drp">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select a Option
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="<?php echo admin_url(); ?>edit-sessions/<?php echo html_escape($item->id); ?>">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                        <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('academicsession_controller/delete_session_post','<?php echo $item->id; ?>','Are you want to delete this item?');">Delete <i class="fa fa-trash" aria-hidden="true"></i></a>

                                    </div>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Session Name</th>
                        <th>Course</th>
                        <th>Total Fee</th>
                        <th>Admission Fee</th>
                        <th>EMI Fee</th>
                        <th>Start On</th>
                        <th>Created On</th>
                        <th>Option</th>
                    </tr>
                </tfoot>
            </table>
            <div class="text-right madd-btn">
                <a href="<?php echo admin_url() . 'add-sessions' ?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Session </a>
            </div>
        </div>
    </div>