   <div class="col-sm-12">
       <?php $this->load->view('admin/includes/_messages'); ?>
   </div>

   <div class="wrapper2">

       <div class="mblog">

           <h4><?php echo $title ?></h4>
           <?php echo form_open_multipart('admin/update-testimonial'); ?>
           <input type="hidden" name="id" value="<?php echo $testimonial->id; ?>">
           <input type="hidden" name="old_image" value="<?php echo $testimonial->testimonial_image; ?>">
           <div class="form-group">
               <label>Name</label>
               <input type="text" name="user_name" required class="form-control" value="<?php echo $testimonial->user_name ?>">
           </div>
           <div class="form-group">
               <label>Display Order</label>
               <input type="number" name="testimonial_order" required class="form-control" value="<?php echo $testimonial->testimonial_order ?>">
           </div>
           <div class="form-group">
               <label>Testimonial Content</label>
               <textarea name="testimonial_details" class="form-control ckeditor" required><?php echo $testimonial->testimonial_details ?></textarea>
           </div>
           <div class="form-group">
               <label><?php echo ('User image'); ?> (100X100)</label>
               <?php if (!empty($testimonial->testimonial_image)) : ?>
                   <div class="display-block m-b-15">
                       <img src="<?php echo base_url() . 'uploads/testimonials/' . $testimonial->testimonial_image; ?>" alt="" class="img-responsive" style="max-width: 300px; max-height: 300px;">
                   </div>
               <?php endif; ?>
               <input type="file" name="testimonial_image" class="form-control" accept=".png, .jpg, .jpeg, .gif">

           </div>

           <div class="sav-btn">
               <button type="submit" class="btn btn-primary"><?php echo ('Edit Testimonial'); ?></button>
           </div>
           <?php echo form_close(); ?>
           <!-- form end -->
       </div>