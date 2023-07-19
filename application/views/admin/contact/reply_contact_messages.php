   <div class="col-sm-12">
       <?php $this->load->view('admin/includes/_messages'); ?>
   </div>

   <div class="wrapper2">

       <div class="mblog">

           <h4><?php echo $title ?></h4>
           <?php echo form_open('admin/reply-messages-save'); ?>
           <div class="form-group">
               <label>Reply To</label>
               <input type="text" name="email" value="<?php echo $message->email ?>" class="form-control" readonly>
           </div>
           <div class="form-group">
               <label>Subject</label>
               <input type="text" name="reply_subject" class="form-control" required>
           </div>


           <div class="form-group">
               <label>message</label>
               <textarea name="reply_message" class="ckeditor"></textarea>
           </div>
       </div>
       <div class="sav-btn">
           <input type="hidden" value="<?php echo $message->id?>" name="id">
           <button type="submit">Send Reply</button>
       </div>
       <?php echo form_close(); ?>
   </div>