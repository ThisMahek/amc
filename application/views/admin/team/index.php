<div class="wrapper2">
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>
    <div class="mblog-post">
        <div class="text-right madd-btn">
            <a href="<?php echo admin_url() ?>add-member" class="add-pag">Add Professor</a>
        </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid" aria-describedby="example1_info">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Professor</th>
                            <th>Order</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($members as $item) : ?>
                            <tr>
                                <td><?php echo html_escape($item->id); ?></td>
                                <td class="td-product">
                                    <a href="<?php echo generate_url("professor") . "/" . $item->slug; ?>" target="_blank" class="a-table">
                                        <div class="team-name">

                                            <div class="img-table">
                                                <img src="<?php echo base_url() . 'uploads/team/' . $item->member_image; ?>" alt="" height="80" width="100" />
                                            </div>
                                            <h5>
                                                <?php echo html_escape($item->member_name); ?>
                                            </h5>
                                        </div>
                                    </a>

                                </td>
                                <td><?php echo html_escape($item->member_order); ?>
                                </td>
                                <td class="drp-btn">
                                    <div class="dropdown drp">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Select a Option
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="<?php echo admin_url(); ?>edit-member/<?php echo html_escape($item->id); ?>">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('admin/delete_member','<?php echo $item->id; ?>','Are you want to delete this item?');">Delete <i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Professor</th>
                            <th>Order</th>
                            <th>Option</th>
                        </tr>
                    </tfoot>
                </table>
                <div class="text-right madd-btn">
                    <a href="<?php echo admin_url() ?>add-member"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Professor</a>
                </div>
            </div>
        </div>
    </div>