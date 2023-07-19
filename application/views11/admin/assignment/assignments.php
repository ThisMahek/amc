<div class="wrapper2">
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>
    <div class="mblog-post">
        <div class="text-right madd-btn">
            <a href="<?php echo admin_url() ?>add-assignment" class="add-pag">Add Assignment</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Course</th>
                        <th>Batch</th>
                        <th>Closing On</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($assignments as $item) : ?>
                        <tr>
                            <td><?php echo html_escape($item->id); ?></td>
                            <td class="td-product">

                                <a href="<?php echo generate_url("assignment") . "/" . $item->slug; ?>" target="_blank" class="a-table">
                                    <?php echo html_escape($item->title); ?>
                                </a>
                            </td>

                            <td><?php echo html_escape($item->course_id); ?></td>
                            <td><?php echo html_escape($item->session_id); ?></td>
                            <td><?php echo html_escape($item->closing_date); ?></td>
                            <td class="drp-btn">
                                <div class="dropdown drp">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select a Option
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="<?php echo admin_url(); ?>edit-assignment/<?php echo html_escape($item->id); ?>">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                        <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('assignment_controller/delete_assignment','<?php echo $item->id; ?>','Are you want to delete this item?');">Delete <i class="fa fa-trash" aria-hidden="true"></i></a>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Course</th>
                        <th>Batch</th>
                        <th>Closing On</th>
                        <th>Option</th>
                    </tr>
                </tfoot>
            </table>
            <div class="text-right madd-btn">
                <a href="<?php echo admin_url() ?>add-assignment"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Assignment </a>
            </div>
        </div>
    </div>