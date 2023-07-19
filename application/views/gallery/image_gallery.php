  <div class="gallerys tz-gallery mt-5 mb-4">
      <div id="image" class="tabcontent">
          <div class="container">
              <div class="row no-gutters">
                  <?php foreach ($images as $image) : ?>
                      <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                          <div class="gallery-holder">
                              <img src="<?php echo base_url(); ?>assets/frontend/images/gallery-empty.png" alt="empty">
                              <div class="holder" style="background: url(<?php echo base_url() . 'uploads/image_gallery/' . $image->image ?>);">
                                  <div class="capson">
                                      <a class="lightbox" href="<?php echo base_url() . 'uploads/image_gallery/' . $image->image ?>">
                                          <i class="fa fa-search"></i>
                                      </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <?php endforeach ?>
              </div>
              <div class="b_pagination">
                  <?php echo $this->pagination->create_links(); ?>
              </div>

          </div>
      </div>
  </div>