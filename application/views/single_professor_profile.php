    <div class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="<?php echo base_url() . '/uploads/team/' . $member->member_image ?>" />
                    <div class="">
                                <ul>
                                    <?php if (!empty($member->facebook_url)) : ?>
                                        <li><a href="<?php echo $member->facebook_url ?>" target="_blank" class="fa fa-facebook"></a></li>
                                    <?php endif; ?>
                                    <?php if (!empty($member->twitter_url)) : ?>
                                        <li><a href="<?php echo $member->twitter_url ?>" target="_blank" class="fa fa-twitter"></a></li>
                                    <?php endif; ?>
                                    <?php if (!empty($member->instagram_url)) : ?>
                                        <li><a href="<?php echo $member->instagram_url ?>" target="_blank" class="fa fa-instagram"></a></li>
                                    <?php endif; ?>
                                    <?php if (!empty($member->linkedin_url)) : ?>
                                        <li><a href="<?php echo $member->linkedin_url ?>" target="_blank" class="fa fa-linkedin"></a></li>
                                    <?php endif; ?>
                                    <?php if (!empty($member->youtube_url)) : ?>
                                        <li><a href="<?php echo $member->youtube_url ?>" target="_blank" class="fa fa-youtube"></a></li>
                                    <?php endif; ?>
                                    <?php if (!empty($member->website_url)) : ?>
                                        <li><a href="<?php echo $member->website_url ?>" target="_blank" class="fa fa-globe"></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                 </div>
                    <div class="col-md-7">
                        <div class="prof-details">
                            <h4><?php  echo $member->member_name ?></h4>
                            <h5><?php echo  $member->member_designation ?></h5>
                            <div>
                                <?php  echo $member->about_member  ?> 
                            </div>
                        </div>
                                        
                    </div>
                </div>
            </div>
        </div>