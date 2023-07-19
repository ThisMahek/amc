<div class="wrapper2">
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>
    <div class="mblog-post">
        <div class="text-right madd-btn">
            <a href="<?php echo admin_url() ?>add-testimonial" class="add-testimonial">Add Testimonials</a>
        </div>
        <h3 class="box-title"><?php echo ('Testimonial'); ?></h3>
        <div class="text-right madd-btn">

        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Order</th>
                        <th>Testiminial</th>
                        <th class="th-options"><?php echo ('options'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($testimonials as $item) : ?>
                        <tr>
                            <td><?php echo html_escape($item->id); ?></td>
                            <td><?php echo html_escape($item->user_name); ?></td>
                            <td class="td-product">
                                <img src="<?php echo base_url() . 'uploads/testimonials/' . $item->testimonial_image; ?>" alt="" width="100%" height="80px" />
                            </td>
                            <td><?php echo html_escape($item->testimonial_order); ?></td>
                            <td><?php echo ($item->testimonial_details); ?></td>

                            <td class="drp-btn">
                                <div class="dropdown drp">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select a Option
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="<?php echo admin_url(); ?>edit-testimonial/<?php echo html_escape($item->id); ?>"><?php echo ('edit'); ?> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                        <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('testimonial_controller/delete_testimonial','<?php echo $item->id; ?>','<?php echo ('Want ot delete the item?'); ?>');"><?php echo ('delete'); ?> <i class="fa fa-trash" aria-hidden="true"></i></a>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Order</th>
                        <th>Testiminial</th>
                        <th class="th-options"><?php echo ('options'); ?></th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
</div>