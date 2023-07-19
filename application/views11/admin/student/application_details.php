<div class="wrapper2">

    <div class="mblog-post">

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <tr>
                    <td>Course Applied For</td>
                    <td><strong class='text-primary'><?php echo getCourseNameByID($student->course_id) ?></strong></td>
                    <td>Enrollment No</td>
                    <td><strong class='text-primary'><?php echo $student->enroll_no ?></strong></td>
                <tr>


                <tr>
                    <td>Roll No</td>
                    <td><strong class='text-primary'><?php echo $student->roll_no ?></strong></td>
                    <td>Reg No</td>
                    <td><strong class='text-primary'><?php echo $student->reg_no ?></strong></td>
                <tr>
                <tr>
                    <td>Application Status</td>
                    <td><?php if ($student->status == "0") {
                            echo "<strong class='text-info'>Pending</strong>";
                        } else  if ($student->status == "1") {
                            echo "<strong class='text-success'>Approved</strong>";
                        } else  if ($student->status == "2") {
                            echo "<strong class='text-danger'>Rejected</strong>";
                        } else  if ($student->status == "3") {
                            echo "<strong class='text-warning'>Dispute</strong>";
                        }
                        ?>
                    </td>
                    <td>Payment Status</td>
                    <td><?php if ($student->pay_status == "0") {
                            echo "<strong class='text-info'>Pending</strong>";
                        } else  if ($student->pay_status == "1") {
                            echo "<strong class='text-success'>Paid</strong>";
                        } else  if ($student->pay_status == "2") {
                            echo "<strong class='text-danger'>Canceled</strong>";
                        }
                        ?>
                    </td>
                    <?php if ($student->status == "2") { ?>
                <tr>
                    <td>Rejection Cause</td>
                    <td colspan="3"><?php echo $student->rejection_cause ?></td>
                </tr>
            <?php } ?>

            <tr>
                <td>Student Name</td>
                <td><?php echo $student->stu_name ?></td>
                <td>Father's Name</td>
                <td><?php echo $student->f_name ?></td>
            </tr>
            <tr>
                <td>Mother's Name</td>
                <td><?php echo $student->m_name  ?></td>
                <td>Date Of Birth</td>
                <td><?php echo date('d-M-Y', strtotime($student->dob))  ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?php echo $student->gender  ?></td>
                <td>Religion</td>
                <td><?php echo $student->religion  ?></td>
            </tr>
            <tr>
                <td>Present Address</td>
                <td>
                    Address Line 1 :<?php echo ($student->present_add_add_1); ?> <br>
                    Address Line 2: <?php echo ($student->present_add_add_2) ?><br>
                    District : <?php echo ($student->present_add_district); ?><br>
                    State : <?php echo ($student->present_add_state); ?><br>
                    Pin : <?php echo ($student->present_add_pin); ?>

                </td>
                <td>Permanent Address</td>
                <td>
                    Address Line 1 :<?php echo ($student->premanemt_add_1); ?> <br>
                    Address Line 2: <?php echo ($student->premanemt_add_2) ?><br>
                    District : <?php echo ($student->premanemt_add_district); ?><br>
                    State : <?php echo ($student->premanemt_add_state); ?><br>
                    Pin : <?php echo ($student->premanemt_add_pin); ?><br>
                </td>
            </tr>
            <tr>
                <td>Category</td>
                <td><?php echo $student->category  ?></td>
                <td>Education Qualification</td>
                <td><?php echo $student->qualification  ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $student->email  ?></td>
                <td>Mobile</td>
                <td><?php echo $student->mobile  ?></td>
            </tr>
            <tr>
                <td colspan="4" class="text-center">
                    <h5>Education Details</h5>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="text-center">
                    <table>
                        <thead>
                            <tr>
                                <th>Exam Name</th>
                                <th>Year of passing</th>
                                <th>Board/University</th>
                                <th>Total Marks</th>
                                <th>Marks Obtained</th>
                                <th>Subjects</th>
                                <th>Percentage (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $qual_details = json_decode($student->qual_details, TRUE); ?>
                            <tr>
                                <td><input readonly type="text" name="qual_details[exam_name][1]" class="form-control" value="<?php echo $qual_details['exam_name'][1]; ?>"></td>
                                <td><input readonly type="text" name="qual_details[passing_year][1]" class="form-control" value="<?php echo $qual_details['passing_year'][1]; ?>"></td>
                                <td><input readonly type="text" name="qual_details[board][1]" class="form-control" value="<?php echo $qual_details['board'][1]; ?>"></td>
                                <td><input readonly type="text" name="qual_details[total_marks][1]" class="form-control" value="<?php echo $qual_details['total_marks'][1]; ?>"></td>
                                <td><input readonly type="text" name="qual_details[marks_obtained][1]" class="form-control" value="<?php echo $qual_details['marks_obtained'][1]; ?>"></td>
                                <td><input readonly type="text" name="qual_details[subjects][1]" class="form-control" value="<?php echo $qual_details['subjects'][1]; ?>"></td>
                                <td><input readonly type="text" name="qual_details[percentage][1]" class="form-control" value="<?php echo $qual_details['percentage'][1]; ?>"></td>
                            </tr>
                            <tr>
                            <tr>
                                <td><input readonly type="text" name="qual_details[exam_name][2]" class="form-control" value="<?php echo $qual_details['exam_name'][2]; ?>"></td>
                                <td><input readonly type="text" name="qual_details[passing_year][2]" class="form-control" value="<?php echo $qual_details['passing_year'][2]; ?>"></td>
                                <td><input readonly type="text" name="qual_details[board][2]" class="form-control" value="<?php echo $qual_details['board'][2]; ?>"></td>
                                <td><input readonly type="text" name="qual_details[total_marks][2]" class="form-control" value="<?php echo $qual_details['total_marks'][2]; ?>"></td>
                                <td><input readonly type="text" name="qual_details[marks_obtained][2]" class="form-control" value="<?php echo $qual_details['marks_obtained'][2]; ?>"></td>
                                <td><input readonly type="text" name="qual_details[subjects][2]" class="form-control" value="<?php echo $qual_details['subjects'][2]; ?>"></td>
                                <td><input readonly type="text" name="qual_details[percentage][2]" class="form-control" value="<?php echo $qual_details['percentage'][2]; ?>"></td>
                            </tr>
            </tr>


            </tbody>
            </table>
            </td>
            </tr>
            <tr>
                <td>Id Prove Document Type</td>
                <td><?php echo ucfirst($student->id_prove) ?></td>
                <td> Application Date</td>
                <td> <?php echo date('d-M-Y', strtotime($student->created_on)) ?></td>
            </tr>
            <?php if ($student->pay_status == "1") : ?>
                <tr>
                    <td>Fee paid On</td>
                    <td>
                        <?php echo date('d-M-Y H:i:s', strtotime($trans->trn_date)) ?> via
                        <?php echo ($trans->mode); ?>
                    </td>
                    <td>Transaction ID</td>
                    <td><?php echo $trans->transaction_id ?></td>
                </tr>
            <?php endif; ?>
            <?php if ($student->status == "1") : ?>
                <tr>
                    <td>Approved On</td>
                    <td>
                        <?php echo date('d-M-Y', strtotime($trans->trn_date)) ?>
                    </td>
                    <td>Session ID</td>
                    <td><?php echo getSessionByID($trans->session_id) ?></td>
                </tr>
            <?php elseif ($student->status == "2") : ?>
                <tr>
                    <td>Reject On</td>
                    <td>
                        <?php echo date('d-M-Y', strtotime($student->rejected_on)) ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            <?php elseif ($student->status == "3") : ?>
                <tr>
                    <td>Dispute On</td>
                    <td>
                        <?php echo date('d-M-Y', strtotime($student->dispute_on)) ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            <?php endif; ?>
            </table>

            <div class="table-responsive my-5">
                <table class="table table-bordered">

                    <tbody>
                        <tr>
                            <td>
                                <div class="upload-img-box">
                                    <?php if (!empty($student->avatar)) : ?>
                                        <img src="<?php echo base_url() . 'uploads/student_images/' . $student->avatar ?>" class="img-fluid avatar" alt="">
                                    <?php else : ?>
                                        <img src="<?php echo base_url(); ?>assets/backend/images/noimg.png" class="img-fluid avatar" alt="">
                                    <?php endif; ?>
                                    <p class="text-center mt-2">Student Image</p>
                                    <div class="text-center avatar_div">
                                        <?php if (!empty($student->avatar)) : ?>
                                            <ul class="d-inline-flex p-2">
                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/student_images/' . $student->avatar ?>" title="Download" class="btn btn-success btn-sm mx-1" download><i class="fa fa-download" aria-hidden="true"></i></a></li>

                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/student_images/' . $student->avatar ?>" title="View" class="btn btn-warning btn-sm mx-1"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                <?php if ($student->status == 0) : ?>
                                                    <li><button title="Delete" class="btn btn-danger btn-sm mx-1" onclick="disputeImage(<?php echo $student->id ?>,'avatar')"><i class="fa fa-trash"></i></button></li>
                                                <?php endif; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="upload-img-box">
                                    <?php if (!empty($student->sign_img)) : ?>
                                        <img src="<?php echo base_url() . 'uploads/student_images/' . $student->sign_img ?>" class="img-fluid sign_img" alt="">
                                    <?php else : ?>
                                        <img src="<?php echo base_url(); ?>assets/backend/images/noimg.png" class="img-fluid sign_img" alt="">
                                    <?php endif; ?>
                                    <p class="text-center mt-2">Student Signature</p>
                                    <div class="text-center sign_img_div">
                                        <?php if (!empty($student->sign_img)) : ?>
                                            <ul class="d-inline-flex p-2">
                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/student_images/' . $student->sign_img ?>" title="Download" class="btn btn-success btn-sm mx-1" download><i class="fa fa-download" aria-hidden="true"></i></a></li>

                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/student_images/' . $student->sign_img ?>" title="View" class="btn btn-warning btn-sm mx-1"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                <?php if ($student->status == 0) : ?>
                                                    <li><button title="Delete" class="btn btn-danger btn-sm mx-1" onclick="disputeImage(<?php echo $student->id ?>,'sign_img')"><i class="fa fa-trash"></i></button></li>
                                                <?php endif; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="upload-img-box">
                                    <?php if (!empty($student->mp_marksheet_img)) : ?>
                                        <img src="<?php echo base_url() . 'uploads/student_images/' . $student->mp_marksheet_img ?>" class="img-fluid mp_marksheet_img" alt="">
                                    <?php else : ?>
                                        <img src="<?php echo base_url(); ?>assets/backend/images/noimg.png" class="img-fluid mp_marksheet_img" alt="">
                                    <?php endif; ?>
                                    <p class="text-center mt-2">MP Marksheet</p>
                                    <div class="text-center mp_marksheet_img_div">
                                        <?php if (!empty($student->mp_marksheet_img)) : ?>
                                            <ul class="d-inline-flex p-2">
                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/student_images/' . $student->mp_marksheet_img ?>" title="Download" class="btn btn-success btn-sm mx-1" download><i class="fa fa-download" aria-hidden="true"></i></a></li>

                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/student_images/' . $student->mp_marksheet_img ?>" title="View" class="btn btn-warning btn-sm mx-1"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                <?php if ($student->status == 0) : ?>
                                                    <li><button title="Delete" class="btn btn-danger btn-sm mx-1" onclick="disputeImage(<?php echo $student->id ?>,'mp_marksheet_img')"><i class="fa fa-trash"></i></button></li>
                                                <?php endif; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="upload-img-box">
                                    <?php if (!empty($student->hs_marksheet_img)) : ?>
                                        <img src="<?php echo base_url() . 'uploads/student_images/' . $student->hs_marksheet_img ?>" class="img-fluid  hs_marksheet_img" alt="">
                                    <?php else : ?>
                                        <img src="<?php echo base_url(); ?>assets/backend/images/noimg.png" class="img-fluid hs_marksheet_img" alt="">
                                    <?php endif; ?>
                                    <p class="text-center mt-2">HS Marksheet</p>
                                    <div class="text-center hs_marksheet_div">
                                        <?php if (!empty($student->hs_marksheet_img)) : ?>
                                            <ul class="d-inline-flex p-2">
                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/student_images/' . $student->hs_marksheet_img ?>" title="Download" class="btn btn-success btn-sm mx-1" download><i class="fa fa-download" aria-hidden="true"></i></a></li>

                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/student_images/' . $student->hs_marksheet_img ?>" title="View" class="btn btn-warning btn-sm mx-1"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                <?php if ($student->status == 0) : ?>
                                                    <li><button title="Delete" class="btn btn-danger btn-sm mx-1" onclick="disputeImage(<?php echo $student->id ?>,'hs_marksheet_img')"><i class="fa fa-trash"></i></button></li>
                                                <?php endif; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="upload-img-box">
                                    <?php if (!empty($student->id_prof_img)) : ?>
                                        <img src="<?php echo base_url() . 'uploads/student_images/' . $student->id_prof_img ?>" class="img-fluid" alt="">
                                    <?php else : ?>
                                        <img src="<?php echo base_url(); ?>assets/backend/images/noimg.png" class="img-fluid id_prof_img" alt="">
                                    <?php endif; ?>
                                    <p class="text-center mt-2">ID Prove</p>
                                    <div class="text-center id_prof_img_div">
                                        <?php if (!empty($student->id_prof_img)) : ?>
                                            <ul class="d-inline-flex p-2">
                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/student_images/' . $student->id_prof_img ?>" title="Download" class="btn btn-success btn-sm mx-1" download><i class="fa fa-download" aria-hidden="true"></i></a></li>

                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/student_images/' . $student->id_prof_img ?>" title="View" class="btn btn-warning btn-sm mx-1"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                <?php if ($student->status == 0) : ?>
                                                    <li><button title="Delete" class="btn btn-danger btn-sm mx-1" onclick="disputeImage(<?php echo $student->id ?>,'id_prof_img')"><i class="fa fa-trash"></i></button></li>
                                                <?php endif; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="upload-img-box">
                                    <?php if (!empty($student->cast_certi_img)) : ?>
                                        <img src="<?php echo base_url() . 'uploads/student_images/' . $student->cast_certi_img ?>" class="img-fluid cast_certi_img" alt="">
                                    <?php else : ?>
                                        <img src="<?php echo base_url(); ?>assets/backend/images/noimg.png" class="img-fluid cast_certi_img" alt="">
                                    <?php endif; ?>
                                    <p class="text-center mt-2">Cast Certificate</p>
                                    <div class="text-center cast_certi_img_div">
                                        <?php if (!empty($student->cast_certi_img)) : ?>
                                            <ul class="d-inline-flex p-2">
                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/student_images/' . $student->cast_certi_img ?>" title="Download" class="btn btn-success btn-sm mx-1" download><i class="fa fa-download" aria-hidden="true"></i></a></li>

                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/student_images/' . $student->cast_certi_img ?>" title="View" class="btn btn-warning btn-sm mx-1"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                <?php if ($student->status == 0) : ?>
                                                    <li><button title="Delete" class="btn btn-danger btn-sm mx-1" onclick="disputeImage(<?php echo $student->id ?>,'cast_certi_img')"><i class="fa fa-trash"></i></button></li>
                                                <?php endif; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    </tbody>


                </table>
            </div>
        </div>

        <div class="text-center">

            <input type="hidden" name="appID" value="<?php echo $student->id ?>">
            <?php if ($student->status == 0) : ?>
                <a href="<?php echo admin_url() . 'approve-application/' . $student->id ?>" class="btn btn-success btn-lg app">Approve</a>
                <button class="btn btn-danger btn-lg dispute" onclick="disputApps()">Mark Disput</button>
            <?php endif; ?>
            <?php if ($student->status == 3) : ?>
                <a class="btn btn-danger btn-lg" href="<?php echo admin_url() . 'reject-application/' . $student->id ?>">Reject Application</a>
            <?php endif; ?>
            <a href="<?php echo admin_url(). 'pending-student' ?>" class="btn btn-primary btn-lg">Back</a>
            <a href="<?php echo admin_url() . 'edit-student-application/' . $student->id ?>" class="btn btn-warning btn-lg">Edit Form</a>
        </div>
    </div>