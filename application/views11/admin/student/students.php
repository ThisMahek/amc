<div class="wrapper2">
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>
    <div class="mblog-post">
        <div class="text-right madd-btn">
            <a href="<?php echo admin_url() ?>add-student" class="add-pag">Add student</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Course</th>
                        <th>Batch</th>
                        <th>Date Of Apply</th>
                        <th>Is Paid</th>
                        <th>Verified</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $item) : ?>

                        <tr>
                            <td><?php echo html_escape($item->id); ?></td>
                            <td class="td-product">
                                <div class="img-table" style="height: 67px;">
                                    <img src="<?php echo base_url() . 'uploads/student_images/' . $item->avatar; ?>" alt="" height="50" width="50" />
                                </div>
                                <?php echo html_escape($item->stu_name); ?>
                            </td>
                            <td><?php echo html_escape(getCourseNameByID($item->course_id)); ?></td>
                            <td><?php echo html_escape(getSessionByID($item->session_id)); ?></td>
                            <td><?php echo formatted_date($item->created_on); ?></td>
                            <td><?php if ($item->pay_status == 1) : ?>
                                    <strong class="text-success">
                                        Yes
                                    </strong>
                                <?php else : ?>
                                    <strong class="text-danger">
                                        NO
                                    </strong>
                                <?php endif; ?>
                            </td>
                            <td><?php if ($item->status == 1) : ?>
                                    <strong class="text-success">
                                        Yes
                                    </strong>
                                <?php elseif ($item->status == 2) : ?>
                                    <strong class="text-danger">
                                        Rejected
                                    </strong>
                                <?php elseif ($item->status == 3) : ?>
                                    <strong class="text-warning">
                                        Disputed
                                    </strong>
                                <?php else : ?>
                                    <strong class="text-warning">
                                        Pending
                                    </strong>
                                <?php endif; ?>
                            </td>
                            <td class="drp-btn">
                                <div class="dropdown drp">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select a Option
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="<?php echo admin_url(); ?>view-application/<?php echo html_escape($item->id); ?>">View Application <i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a class="dropdown-item" href="<?php echo admin_url(); ?>edit-student/<?php echo html_escape($item->id); ?>">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                        <a class="dropdown-item" href="<?php echo admin_url(); ?>edit-student-application/<?php echo html_escape($item->id); ?>">Edit Application<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                        <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('adminstudent_controller/delete_blog','<?php echo $item->id; ?>','Are you want to delete this item?');">Delete <i class="fa fa-trash" aria-hidden="true"></i></a>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Course</th>
                        <th>Batch</th>
                        <th>Date Of Apply</th>
                        <th>Is Paid</th>
                        <th>Verified</th>
                        <th>Option</th>
                    </tr>
                </tfoot>
            </table>
            <div class="text-right madd-btn">
                <a href="<?php echo admin_url() ?>add-student"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Student </a>
            </div>
        </div>
    </div>