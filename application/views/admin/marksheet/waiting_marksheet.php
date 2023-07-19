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
                        <th>Reg. No</th>
                        <th>Year</th>
                        <th>FM</th>
                        <th>Obtain</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($marksheets as $item) : ?>
                        <tr>
                            <td><?php echo html_escape(getStudentNameById($item->student_id)); ?></td>
                            <td><?php echo html_escape(getCoursedataByID($item->course_id)->title_name); ?></td>
                            <td><?php echo html_escape(getSessionByID($item->session_id)); ?></td>
                            <td><?php echo html_escape($item->enroll_no); ?></td>
                            <td><?php echo html_escape($item->year); ?></td>
                            <td><?php echo html_escape($item->total_marks); ?></td>
                            <td><?php echo html_escape($item->total_obtain_marks); ?></td>
                            <td><?php echo html_escape($item->net_result); ?></td>
                            <td class="drp-btn">
                                <div class="dropdown drp">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select a Option
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a href="<?php echo admin_url() . 'add-edit-marksheet/' . $item->student_id ?>" target="_blank"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Marks</a>
                                        <a href="<?php echo admin_url() . 'pass-fail/' . $item->id ?>"><i class="fa fa-ban" aria-hidden="true"></i> Pass/Fail</a>
                                        <a class="dropdown-item" href="<?php echo admin_url(); ?>publish-marksheet/<?php echo html_escape($item->id); ?>"><i class="fa fa-bullhorn" aria-hidden="true"></i> Publish Marksheet </a>


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
                    <th>Reg. No</th>
                    <th>Year</th>
                    <th>FM</th>
                    <th>Obtain</th>
                    <th>Status</th>
                    <th>Action</th>
                </tfoot>
            </table>

        </div>
    </div>