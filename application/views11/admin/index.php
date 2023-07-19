<div class="wrapper3">

    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="counter">
                <div class="counter-icon">
                    <i class="fa fa-book" aria-hidden="true"></i>
                </div>
                <span class="counter-value"><?php echo $total_student ?></span>
                <h3>Total Student</h3>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="counter red">
                <div class="counter-icon">
                    <i class="fa fa-bullhorn" aria-hidden="true"></i>
                </div>
                <span class="counter-value"><?php echo $pending_student ?></span>
                <h3>Pending Student</h3>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="counter">
                <div class="counter-icon">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </div>
                <span class="counter-value"><?php echo $reject_student ?></span>
                <h3>Rejected Student</h3>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="counter red">
                <div class="counter-icon">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </div>
                <span class="counter-value"><?php echo $approve_student ?></span>
                <h3>Approve Student</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="admin-table">
                <div class="table-hed">
                    <h4>New Application</h4>
                </div>
                <div class="table-part">
                    <table width="100%" class="table">
                        <tr>
                            <th>Sl.no</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Date</th>
                        </tr>
                        <?php $i = 1;
                        foreach ($pending_apps as $pending_app) : ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $pending_app->stu_name ?></td>
                                <td><?php echo getCourseNameByID($pending_app->course_id) ?></td>
                                <td><?php echo getFormatedDate($pending_app->created_on) ?></td>
                            </tr>
                        <?php $i++;
                        endforeach; ?>

                    </table>
                </div>
                <div class="view-btn">
                    <a href="<?php echo admin_url() . 'pending-student' ?>">View all</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="admin-table">

                <div class="table-hed">
                    <h4>Disputed Application</h4>

                </div>
                <div class="table-part">
                    <table width="100%" class="table">
                        <tr>
                            <th>Sl.no</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Date</th>
                        </tr>
                        <?php $i = 1;
                        foreach ($disputed_applications as $disputed_application) : ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $podcastComment->stu_name ?></td>
                                <td><?php echo getCourseNameByID($podcastComment->course_id) ?></td>
                                <td><?php echo getFormatedDate($podcastComment->created_at) ?></td>
                            </tr>
                        <?php $i++;
                        endforeach; ?>
                    </table>
                </div>
                <div class="view-btn">
                    <a href="<?php echo admin_url() . 'dispute-student' ?>">View all</a>
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
                            <h4>Contact Messages</h4>

                        </div>
                        <div class="table-part">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th style="width: 60%">Message</th>
                                        <th style="width: 13%">Date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($last_contacts as $contacts) : ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $contacts->name ?></td>
                                            <td><?php echo $contacts->message ?></td>
                                            <td><?php echo getFormatedDate($contacts->created_at) ?></td>
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
                                    <a href="<?php echo admin_url() . 'contact-messages' ?>">View all</a>
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