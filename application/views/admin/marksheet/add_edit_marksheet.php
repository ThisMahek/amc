<div class="wrapper2 ">
    <?php $this->load->view('admin/includes/_messages'); ?>
    <div class="mblog-post">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped " id="" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th colspan="4">
                                    <h3 class="text-center">Marksheet Details</h3>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Student Name</td>
                                <td> <?php echo html_escape($student->stu_name); ?></td>
                                <td>Enrollment No</td>
                                <td> <?php echo html_escape($student->enroll_no); ?></td>
                            </tr>
                            <tr>
                                <td>Roll No</td>
                                <td> <?php echo html_escape($student->roll_no); ?></td>
                                <td>Registration No</td>
                                <td> <?php echo html_escape($student->reg_no); ?></td>
                            </tr>
                            <tr>
                                <td>Course</td>
                                <td><?php echo html_escape(getCourseNameByID($student->course_id)); ?></td>
                                <td>Session</td>
                                <td><?php echo html_escape(getSessionByID($student->session_id)); ?></td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <?php echo form_open('admin/save-update-marks'); ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped " id="" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th>YEAR</th>
                                <th>Subject</th>
                                <th>Theoty</th>
                                <th>Practical</th>
                                <th>Assessment</th>
                                <th>Theory FM</th>
                                <th>Prac FM</th>
                                <th>Asses FM</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($marksheetData as $item) : ?>
                                <tr>
                                    <td><?php echo html_escape($item->year); ?></td>
                                    <td><?php echo html_escape($item->sub_code); ?></td>
                                    <td><input type="text" name="theory_obtain[]" class="form-control " style="width:70px;" value="<?php echo $item->theory_obtain ?>"></td>
                                    <td><input type="text" name="practical_obtain[]" class="form-control " style="width:70px;" value="<?php echo $item->practical_obtain ?>"></td>
                                    <td><input type="text" name="assessment_obtain[]" class="form-control " style="width:70px;" value="<?php echo $item->assessment_obtain ?>"></td>
                                    <td><?php echo html_escape($item->theory_full); ?></td>
                                    <td><?php echo html_escape($item->practical_full); ?></td>
                                    <td><?php echo html_escape($item->assessment_full); ?></td>
                                    <input type="hidden" name="ids[]" value="<?php echo $item->id ?>">
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>YEAR</th>
                                <th>Subject</th>
                                <th>Theoty</th>
                                <th>Practical</th>
                                <th>Assessment</th>
                                <th>Theory FM</th>
                                <th>Prac FM</th>
                                <th>Asses FM</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>

        </div>

    </div>
    <div class="sav-btn">
        <button type="submit">Save / Update Marks</button>
    </div>
    <?php echo form_close(); ?>

</div>