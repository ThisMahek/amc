<div class="wrapper2">
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>
    <div class="mblog-post">
        <div class="text-right madd-btn">
            <a href="<?php echo admin_url() ?>add-subject" class="add-pag">Add Subject</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable" id="cs_datatable_lang" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Course</th>
                        <th>Subject</th>
                        <th>Code</th>
                        <th>Year</th>
                        <th>Order</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($subjects as $item) : ?>
                        <tr>
                            <td><?php echo html_escape($item->id); ?></td>
                            <td><?php echo html_escape($item->title_name); ?></td>
                            <td><?php echo html_escape($item->sub_name); ?></td>
                            <td><?php echo html_escape($item->sub_code); ?></td>
                            <td><?php echo html_escape($item->year); ?></td>
                            <td><?php echo html_escape($item->sub_order); ?></td>
                            <td class="drp-btn">
                                <div class="dropdown drp">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select a Option
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="<?php echo admin_url(); ?>edit-subject/<?php echo html_escape($item->id); ?>">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                        <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('subject_controller/delete_subject_post','<?php echo $item->id; ?>','Are you want to delete this item?');">Delete <i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Course</th>
                        <th>Subject</th>
                        <th>Code</th>
                        <th>Year</th>
                        <th>Order</th>
                        <th>Option</th>
                    </tr>
                </tfoot>
            </table>
            <div class="text-right madd-btn">
                <a href="<?php echo admin_url() ?>add-subject"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Subject </a>
            </div>
        </div>
    </div>