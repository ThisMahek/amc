 <div class="banner">
     <div class="row align-items-center">
         <div class="col-md-6">
             <div class="bannerSlider">
                 <?php foreach ($slider_items as $slider_item) : ?>
                     <div><img src="<?php echo base_url() . 'uploads/slider/' . $slider_item->image; ?>"></div>
                 <?php endforeach; ?>

             </div>
         </div>
         <div class="col-md-6">
             <div class="banner-content text-center wow slideInUp">
                 <h2><?php echo $this->general_settings->application_name ?></h2>
                 <hr>
                 <h3> <?php echo $this->settings->contact_address ?> </h3>
             </div>
         </div>
     </div>
 </div>