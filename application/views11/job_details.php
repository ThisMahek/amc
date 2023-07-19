<div class="postarea pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="heading"> <?php echo $post->title ?> </h1>
                <div class="d-flex linepgap mb-4">
                    <p>Posted On: <i class="fa fa-calendar"></i> <?php echo formatted_date($post->created_at) ?></p>
                    <p> &nbsp; <i class="fa fa-check-circle"></i> &nbsp; </p>
                    <p>Vacancies: <?php echo $post->vacancy ?></p>
                </div>
                <?php if (!empty($post->featured_image)) : ?>
                    <div class="mb-4">
                        <img class="" src="<?php echo base_url() . 'uploads/job_image/' . $post->featured_image ?>" alt="" />
                    </div>
                <?php endif; ?>
                <?php echo $post->content ?>
            </div>
            <?php if (!empty($files)) : ?>
                <div class="dwlink mt-3 mb-4">
                    <ul class="d-flex">
                        <?php foreach ($files as $file) : ?>

                            <li><a class="d-flex align-items-center" href="<?php echo base_url() . 'uploads/files/' . $file->file_name; ?>" download=""><i class="fa fa-cloud-download"></i> <?php echo $file->file_name ?> </a></li>

                            <li> | </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>

            <hr>
            <?php if (!empty($related_posts)) : ?>
                <div class="col-md-12 mt-5">
                    <h2 class="heading"> RELATED JOBS </h2>
                </div>
                <?php foreach ($related_posts as $related_post) :
                    $post_category = $this->job_cat_model->get_category($related_post->category_id);

                ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                        <div class="card">
                            <?php if (!empty($related_post->featured_image)) : ?>
                                <img class="card-img-top" src="<?php echo base_url() . 'uploads/job_image/' . $related_post->featured_image ?>" alt="Card image cap">
                            <?php else : ?>

                                <img class="card-img-top" src="<?php echo base_url() . 'uploads/logo/' . $this->general_settings->logo ?>" alt="Card image cap">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title small-heading"> <?php echo $related_post->title ?> </h5>

                                <a href="<?php echo generate_url("job") . "/" . $post_category->slug; ?>/<?php echo $related_post->slug; ?>" class="send-message border-0 m-0">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>


            <?php endif; ?>


        </div>
    </div>
</div>