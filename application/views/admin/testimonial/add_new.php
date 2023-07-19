   <div class="col-sm-12">
       <?php $this->load->view('admin/includes/_messages'); ?>
   </div>

   <div class="wrapper2">

       <div class="mblog">

           <h4><?php echo $title ?></h4>
           <?php echo form_open_multipart('admin/save-testimonial'); ?>
           <div class="form-group">
               <label>Name</label>
               <input type="text" name="user_name" required class="form-control" placeholder="">
           </div>
           <div class="form-group">
               <label>Display Order</label>
               <input type="number" name="testimonial_order" required class="form-control" placeholder="">
           </div>
           <div class="form-group">
               <label>Testimonial Content</label>
               <textarea name="testimonial_details" class="form-control ckeditor" placeholder="Content" required></textarea>
           </div>
           <div class="form-group">
               <label><?php echo ('User image'); ?> (100X100)</label>
               <input type="file" name="testimonial_image" class="form-control" accept=".png, .jpg, .jpeg" required>

           </div>
           <div class="sav-btn">
               <button type="submit" class="btn btn-primary"><?php echo ('Add Testimonial'); ?></button>
           </div>
           <?php echo form_close(); ?>
           <!-- form end -->
       </div>