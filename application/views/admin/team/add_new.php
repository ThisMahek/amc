   <div class="col-sm-12">
       <?php $this->load->view('admin/includes/_messages'); ?>
   </div>

   <div class="wrapper2">

       <div class="mblog">

           <h4><?php echo $title ?></h4>
           <?php echo form_open('admin/save-member'); ?>

           <div class="form-group">
               <label>Professor Name</label>
               <input type="text" name="member_name" class="form-control" required>
           </div>
           <div class="form-group">
               <label>Slug (If you leave it blank, it will be generated automatically.)</label>
               <input type="text" name="slug" class="form-control">
           </div>
           <div class="form-group">
               <label>Professor Designation</label>
               <input type="text" name="member_designation" class="form-control">
           </div>
           <div class="form-group">
               <label>Meta Description (Meta Tag)</label>
               <input type="text" name="meta_description" class="form-control">
           </div>
           <div class="form-group">
               <label>Meta Keywords (Meta Tag)</label>
               <input type="text" name="meta_keywords" class="form-control">
           </div>
           <div class="row">
               <div class="col-md-6">

                   <div class="form-group">
                       <label>Facebook URL</label>

                       <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                           <input type="text" name="facebook_url" class="form-control">
                       </div>


                   </div>

               </div>
               <div class="col-md-6">

                   <div class="form-group">
                       <label>Twitter URL</label>
                       <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                           <input type="text" name="twitter_url" class="form-control">
                       </div>

                   </div>
               </div>
               <div class="col-md-6">
                   <div class="form-group">
                       <label>Instagram URL</label>
                       <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-instagram" aria-hidden="true"></i></span>

                           <input type="text" name="instagram_url" class="form-control">
                       </div>
                   </div>
               </div>
               <div class="col-md-6">
                   <div class="form-group">
                       <label>Linkedin URL</label>
                       <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-linkedin" aria-hidden="true"></i></span>
                           <input type="text" name="linkedin_url" class="form-control">
                       </div>
                   </div>

               </div>
               <div class="col-md-6">
                   <div class="form-group">
                       <label>Youtube URL</label>
                       <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-youtube" aria-hidden="true"></i></span>

                           <input type="text" name="youtube_url" class="form-control">
                       </div>

                   </div>
               </div>
               <div class="col-md-6">
                   <div class="form-group">
                       <label>Website URL</label>
                       <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-globe" aria-hidden="true"></i></span>
                           <input type="text" name="website_url" class="form-control">
                       </div>

                   </div>
               </div>
           </div>
           <div class="form-group">
               <label>Order</label>
               <input type="number" name="member_order" class="form-control" required>
           </div>
           <div class="form-group">
               <label>Member Description</label>
               <textarea name="about_member" class="ckeditor"></textarea>
           </div>
           <div class="form-group">
               <label>Member Image</label>
               <input type="file" id="member_image" onchange="teamImageUpload()">
           </div>
           <div class="form-group">
               <div class="sml-imag member_image"> </div>
           </div>
       </div>
       <div class="sav-btn">
           <input type="hidden" name="member_image">
           <button type="submit">Save Professor</button>
       </div>
       <?php echo form_close(); ?>
   </div>