<div class="wrapper2">
    <?php $this->load->view('student/includes/_messages'); ?>
    <div class="mblog-post">
        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr>

                        <th>Particulars</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Trns ID</th>
                        <th>Created On</th>
                        <th>Payment On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($fees as $item) : ?>
                        <tr>

                            <td><?php echo html_escape($item->particulars); ?></td>
                            <td><?php echo html_escape($item->amount); ?></td>
                            <td>
                                <?php if ($item->status == 0) : ?>
                                    <strong class="text-warning">Pending</strong>
                                <?php elseif ($item->status == 1) : ?>
                                    <strong class="text-success">Paid</strong>
                                <?php elseif ($item->status == 2) : ?>
                                    <strong class="text-danger">Failed</strong>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($item->status != 0) : ?>
                                    <?php echo html_escape($item->trans_id); ?>
                                <?php else : ?>
                                    NA
                                <?php endif; ?>
                            </td>
                            <td><?php echo formatted_date($item->created_on); ?></td>
                            <td>
                                <?php if ($item->status != 0) : ?>
                                    <?php echo formatted_date($item->payment_on); ?>
                                <?php else : ?>
                                    NA
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($item->status != 1) : ?>
                                    <a href="<?php echo student_url() . 'monthly-tution-fee-payment/' . $item->id ?>" class="btn btn-success">Make Payment</a>
                                <?php else : ?>
                                    NA
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <tfoot>
                    <tr>

                        <th>Particulars</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Trns ID</th>
                        <th>Created On</th>
                        <th>Payment On</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>