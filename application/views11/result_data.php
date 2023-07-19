<div class="aboutPage pt-5 pb-5 class50vh">
    <div class="container">
        <?php if (empty($marksheet)) : ?>
            <h1 class="text-center">Result yet to be declired / no result found</h1>
        <?php else : ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped dataTable">
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
                            <th>Created On</th>
                            <th>Published On</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($marksheet as $item) : ?>
                            <tr>
                                <td><?php echo html_escape(getStudentNameById($item->student_id)); ?></td>
                                <td><?php echo html_escape(getCoursedataByID($item->course_id)->title_name); ?></td>
                                <td><?php echo html_escape(getSessionByID($item->session_id)); ?></td>
                                <td><?php echo html_escape($item->reg_no); ?></td>
                                <td><?php echo html_escape($item->year); ?></td>
                                <td><?php echo html_escape($item->total_marks); ?></td>
                                <td><?php echo html_escape($item->total_obtain_marks); ?></td>
                                <td><?php echo html_escape($item->net_result); ?></td>
                                <td><?php echo formatted_date($item->created_on); ?></td>
                                <td><?php echo formatted_date($item->published_on); ?></td>


                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>