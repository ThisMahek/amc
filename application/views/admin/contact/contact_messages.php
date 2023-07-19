<div class="wrapper2 contact">
    <?php $this->load->view('admin/includes/_messages'); ?>
    <div class="mblog-post ">
        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages as $item) : ?>
                        <tr>
                            <td><?php echo html_escape($item->id); ?></td>
                            <td class="td-product">
                                <?php echo html_escape($item->name); ?>
                            </td>
                            <td><?php echo html_escape($item->email); ?></td>
                            <td><?php echo html_escape($item->message); ?></td>
                            <td><?php echo formatted_date($item->created_at); ?></td>
                            <td class="drp-btn">
                                <div class="dropdown drp">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select a Option
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <?php if ($item->is_replied == 0) : ?>
                                            <a class="dropdown-item" href="<?php echo admin_url() . 'reply-message/' . $item->id ?>"> <i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
                                        <?php else : ?>
                                            <a class="dropdown-item" href="<?php echo admin_url() . 'view-reply-message/' . $item->id ?>"> <i class="fa fa-reply" aria-hidden="true"></i> View Reply</a>
                                        <?php endif; ?>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('admin_controller/delete_contact_message_post','<?php echo $item->id; ?>','Are you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i> Delete </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Option</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>