<div class="team">
    <div class="container">
        <div class="row">
            <?php if (!empty($professors)) : ?>
                <?php foreach ($professors as $professor) : ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                        <div class="team-area matchHeight">
                            <div class="client-image">
                                <div class="pic">
                                    <img src="<?php echo base_url(); ?>assets/frontend/images/team-blank-image.png" alt="Blank Image"> <!-- Dummy Image-->
                                    <a class="holder" href="<?php echo generate_url("professor") . "/" . $professor->slug; ?>" style="background-image:url(<?php echo base_url() . '/uploads/team/' . $professor->member_image ?>);"></a> <!-- Main Image-->
                                </div>
                            </div>
                            <div class="team-social">
                                <ul>
                                    <?php if (!empty($professor->facebook_url)) : ?>
                                        <li><a href="<?php echo $professor->facebook_url ?>" target="_blank" class="fa fa-facebook"></a></li>
                                    <?php endif; ?>
                                    <?php if (!empty($professor->twitter_url)) : ?>
                                        <li><a href="<?php echo $professor->twitter_url ?>" target="_blank" class="fa fa-twitter"></a></li>
                                    <?php endif; ?>
                                    <?php if (!empty($professor->instagram_url)) : ?>
                                        <li><a href="<?php echo $professor->instagram_url ?>" target="_blank" class="fa fa-instagram"></a></li>
                                    <?php endif; ?>
                                    <?php if (!empty($professor->linkedin_url)) : ?>
                                        <li><a href="<?php echo $professor->linkedin_url ?>" target="_blank" class="fa fa-linkedin"></a></li>
                                    <?php endif; ?>
                                    <?php if (!empty($professor->youtube_url)) : ?>
                                        <li><a href="<?php echo $professor->youtube_url ?>" target="_blank" class="fa fa-youtube"></a></li>
                                    <?php endif; ?>
                                    <?php if (!empty($professor->website_url)) : ?>
                                        <li><a href="<?php echo $professor->website_url ?>" target="_blank" class="fa fa-globe"></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="clint-details text-center pt-3 pb-3">
                                <h4><?php echo html_escape($professor->member_name); ?></h4>
                                <p><?php echo $professor->member_designation ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>


        </div>
    </div>
</div>