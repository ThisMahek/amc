<div class="wrapper3">

    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="counter">
                <div class="counter-icon">
                    <i class="fa fa-inr" aria-hidden="true"></i>
                </div>
                <span class="counter-value"><?php echo $student_data->total_fees ?></span>
                <h3>Course Fees</h3>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="counter red">
                <div class="counter-icon">
                    <i class="fa fa-inr" aria-hidden="true"></i>
                </div>
                <span class="counter-value"><?php echo $student_data->fees_paid ?></span>
                <h3>Fee Paid</h3>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="counter">
                <div class="counter-icon">
                    <i class="fa fa-inr" aria-hidden="true"></i>
                </div>
                <span class="counter-value"><?php echo $student_data->balance ?></span>
                <h3>Due Amount</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="post-d">
                <h3 class="text-center">Welcome, <?php echo $student_data->stu_name ?> </h3>
                <p>Enrolled Course : <?php echo $course->title ?></p>
                <p>Session / Batch : <?php echo $aca_sess->session_name ?></p>
                <p>Session / Batch Start : <?php echo date('D d-M-Y', strtotime($aca_sess->start_date)) ?></p>
                <p>Enrolment Number :<?php echo $student_data->enroll_no ?></p>
                <p>Registration Number :<?php echo $student_data->reg_no ?></p>
                <p>Roll Number :<?php echo $student_data->roll_no ?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="admin-table">

                <div class="table-hed">
                    <h4>Notice Board</h4>
                </div>
                <div class="table-part">
                    <table width="100%" class="table">
                        <tr>
                            <th>Sl.no</th>
                            <th>Notice Tile</th>
                            <th>Date</th>
                        </tr>
                        <?php $i = 1;
                        foreach ($notices as $notice) : ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><a href="<?php echo generate_url("notice") . "/" . $notice->slug; ?>" target="_blank"><?php echo $notice->title ?></a></td>
                                <td><?php echo getFormatedDate($notice->created_at) ?></td>
                            </tr>
                        <?php $i++;
                        endforeach; ?>

                    </table>
                </div>
                <div class="view-btn">
                    <a href="<?php echo student_url() . 'notice-board' ?>">View all Notice</a>
                </div>
            </div>
        </div>

    </div>


    <div class="cus-table">

        <div class="row">
            <div class="col-md-12">
                <div class="panel">

                    <div class="panel-body table-responsive">
                        <div class="table-hed">
                            <h4>Exam Notice</h4>

                        </div>
                        <div class="table-part">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th style="width: 13%">Date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($exam_notices as $exam_notce) : ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><a href="<?php echo student_url() . 'exam-notice/' . $exam_notce->slug ?>"><?php echo $exam_notce->title ?></a></td>
                                            <td><?php echo getFormatedDate($exam_notce->created_at) ?></td>
                                        </tr>
                                    <?php $i++;
                                    endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">

                            <div class="col-sm-12 col-xs-6">
                                <div class="view-btn">
                                    <a href="<?php echo student_url() . 'exam-notice' ?>">View Notice</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>