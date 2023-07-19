<div class="wrapper2">
    <div class="mblog-post">
        <div class="exam-notice-details">
            <h3>
                <?php echo ucfirst($notice->title) ?>
            </h3>
            <hr>
            <p><i class="fa fa-calendar"></i>&nbsp; <?php echo formatted_date($notice->created_at) ?></p>

            <?php echo $notice->content ?>



            <?php if (!empty($notice->optional_url)) : ?>
                <div class="text-center">
                    <br>
                    <a href="<?php echo $notice->optional_url ?>" target="_blank" class="btn btn-primary">View Link</a>
                </div>
            <?php endif ?>
        </div>
    </div>