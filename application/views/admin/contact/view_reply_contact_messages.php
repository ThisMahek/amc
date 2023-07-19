   <div class="wrapper2">

       <div class="mblog">

           <h4><?php echo $title ?></h4>

           <div class="form-group">
               <label>Reply To</label>
               <input type="text" name="email" value="<?php echo $message->email ?>" class="form-control" readonly>
           </div>
           <div class="form-group">
               <label>Subject</label>
               <input type="text" name="reply_subject" value="<?php echo $message->reply_subject ?>" class="form-control" readonly>
           </div>


           <div class="form-group">
               <label>message</label>
               <textarea name="reply_message" class="ckeditor" readonly><?php echo $message->reply_message ?></textarea>
           </div>
       </div>
       <div class="madd-btn text-center">
           <a  href="<?php echo admin_url() . 'contact-messages' ?>">Back</a>
       </div>
   </div>