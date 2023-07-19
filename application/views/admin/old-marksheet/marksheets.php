<div class="wrapper2">

    <?php $this->load->view('admin/includes/_messages'); ?>
    <div class="mblog-post">
    <div class="text-right madd-btn">
            <a href="<?php echo admin_url() . 'add-postdated-marksheet' ?>" class="add-pag">Add Marksheet</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Father Name</th>
                        <th>DOB</th>
                        <th>Course</th>
                        <th>Session</th>
                        <th>Reg. No</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($marksheets as $item) : ?>
                        <tr>
                            <td><?php echo html_escape($item->stu_name); ?></td>
                            <td><?php echo html_escape($item->f_name); ?></td>
                            <td><?php echo formatted_date_only($item->dob); ?></td>
                            <td><?php echo html_escape($item->course_name); ?></td>
                            <td><?php echo html_escape($item->session_name); ?></td>
                            <td><?php echo html_escape($item->reg_no); ?></td>
                           
                            <td class="drp-btn">
                                    <div class="dropdown drp">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Select a Option
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="<?php echo admin_url(); ?>old-marksheet-marks-breakups/<?php echo html_escape($item->id); ?>">Add/Edit Marks <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            <a class="dropdown-item" href="<?php echo admin_url(); ?>edit-old-marksheet/<?php echo html_escape($item->id); ?>">Edit Marksheet <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                            <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('oldmarksheet_controller/delete_old_marksheet','<?php echo $item->id; ?>','Are you want to delete this item?');">Delete <i class="fa fa-trash" aria-hidden="true"></i></a>

                                        </div>
                                    </div>
                                </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <th>Student Name</th>
                    <th>Father Name</th>
                    <th>DOB</th>
                    <th>Course</th>
                    <th>Session</th>
                    <th>Reg. No</th>
                    <th>Action</th>
                </tfoot>
            </table>
            <div class="text-right madd-btn">
                <a href="<?php echo admin_url() ?>add-postdated-marksheet"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add MarkSheet </a>
            </div>

        </div>
    </div>