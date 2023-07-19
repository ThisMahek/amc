<div class="wrapper2">

    <?php $this->load->view('admin/includes/_messages'); ?>
    <div class="mblog-post">


        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Course</th>
                        <th>Session</th>
                        <th>Roll</th>
                        <th>Reg. No</th>
                        <th>Enroll. No</th>
                        <th>Action</th>
                        <th>Publish</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($marksheets as $item) : ?>
                        <tr>

                            <td><?php echo html_escape($item->stu_name); ?></td>
                            <td><?php echo html_escape(getCoursedataByID($item->course_id)->title_name); ?></td>
                            <td><?php echo html_escape(getSessionByID($item->session_id)); ?></td>
                            <td><?php echo html_escape($item->roll_no); ?></td>
                            <td><?php echo html_escape($item->reg_no); ?></td>
                            <td><?php echo html_escape($item->enroll_no); ?></td>
                            <td><a href="<?php echo admin_url() . 'add-edit-marksheet/' . $item->id ?>" class="btn btn-warning" target="_blank">View / Edit Marks</a></td>
                            <td class="drp-btn">
                                <div class="dropdown drp">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select a Option
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <?php $year = getCourseYearNo($item->course_id);
                                        for ($i = 1; $i <= $year; $i++) : ?>
                                            <a class="dropdown-item" href="<?php echo admin_url(); ?>create-marksheet/<?php echo $i ?>/<?php echo html_escape($item->id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?php echo $i ?> Year Print Marksheet </a>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </td>


                        </tr>

                    <?php endforeach; ?>

                </tbody>
                <tfoot>
                    <th>Student Name</th>
                    <th>Course</th>
                    <th>Session</th>
                    <th>Roll</th>
                    <th>Reg. No</th>
                    <th>Enroll. No</th>
                    <th>Action</th>
                    <th>Publish</th>
                </tfoot>
            </table>

        </div>
    </div>