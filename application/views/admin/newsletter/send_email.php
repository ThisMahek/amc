<style>
    .label-newsletter-email {
        display: inline-block;
        padding: 3px 8px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 300 !important;
        color: #41464b !important;
        background-color: #e2e3e5 !important;
        border-color: #d3d6d8 !important;
    }

    .newsletter-email-container {
        max-height: 300px;
        overflow-y: auto;
        margin-top: 15px;
    }

    .newsletter-spinner {
        display: none;
        text-align: center;
        font-size: 16px;
    }

    .text-newsletter-completed {
        display: none;
    }
</style>
<div class="post-b">
    <div class="post-h">
        <h5>Send Email to Subscribers</h5>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="post-d">
                <?php $this->load->view('admin/includes/_messages'); ?>
                <?php echo form_open('admin_controller/newsletter_send_email_post'); ?>
                <div class="alert alert-success alert-large m-t-10">
                    <strong> Warning! </strong> servers do not allow mass mailing. Therefore, instead of sending your mails to all subscribers at once, you can send them part by part (Example: 50 subscribers at once). If your mail server stops sending mail, the sending process will also stop.
                </div>
                <div class="form-group" style="margin-bottom: 10px;">
                    <label>To</label>
                    <?php if (!empty($emails)) : ?>
                        <p style="max-height: 150px; overflow-y: auto">
                            <?php foreach ($emails as $email) : ?>
                                <label class="label-newsletter-email"><?= $email; ?></label>
                            <?php endforeach; ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" name="subject" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="message" class="ckeditor"></textarea>
                </div>

            </div>

            <div class="right-fifth">
                <input type="hidden" name="sender" value="<?php echo implode("|", $emails) ?>">
                <button type="submit" class="btn btn-primary">Send Mail <i class="fa fa-send"></i></button>
            </div>
            <?php form_close(); ?>
        </div>
    </div>

</div>

</div>