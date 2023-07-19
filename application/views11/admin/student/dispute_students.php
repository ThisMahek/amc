<div class="wrapper2">
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>
    <div class="mblog-post">

        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Course</th>
                        <th>Date Of Apply</th>
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
                            
                            <td><?php echo formatted_date($item->created_on); ?></td>
                            


                            <td class="drp-btn">
                                <div class="dropdown drp">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select a Option
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="<?php echo admin_url(); ?>view-application/<?php echo html_escape($item->id); ?>">View Application <i class="fa fa-eye" aria-hidden="true"></i></a>
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
                       
                        <th>Date Of Apply</th>
                       
                        <th>Option</th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>