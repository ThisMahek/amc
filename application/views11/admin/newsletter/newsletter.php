<div class="post-b">
    <div class="post-h">
        <h5>Newsletter</h5>


    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="post-d">
                <h5>Subscribers</h5>
                <?php $this->load->view('admin/includes/_messages'); ?>
                <?php echo form_open('admin_controller/newsletter_send_email'); ?>
                <?php if (empty($subscribers)) : ?>
                    <p class="text-muted">no records found</p>
                <?php else : ?>
                    <table class="table table-subscribers">
                        <thead>
                            <tr>
                                <th width="20"><input type="checkbox" id="check_all_subscribers"></th>
                                <th>email</th>
                                <th>options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($subscribers as $item) : ?>
                                <tr>
                                    <td><input type="checkbox" name="email[]" value="<?= $item->email; ?>"></td>
                                    <td><?= $item->email; ?></td>
                                    <td><a href="javascript:void(0)" onclick="delete_item('admin_controller/delete_newsletter_post','<?php echo $item->id; ?>','Are you want to delete this item?');" class="text-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
        <?php endif; ?>
        <div class="right-fifth">
            <button type="submit" class="btn btn-primary">Send Mail <i class="fa fa-send"></i></button>
        </div>
        <?php form_close(); ?>
        </div>
    </div>

</div>

</div>
