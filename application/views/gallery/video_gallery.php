<div class="mt-5 mb-4">
    <div class="container">
        <div class="row">
            <?php foreach ($videos as $image) : ?>
                <div class="col-md-6 col-sm-12 mb-4">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $image->video_id?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            <?php endforeach ?>
            <div class="col-md-12">
                <div class="b_pagination">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </div>
</div>