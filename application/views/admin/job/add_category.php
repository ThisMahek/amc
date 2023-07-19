 <?php $this->load->view('admin/includes/_messages'); ?>
 <div class="wrapper2">
   <div class="mblog">

     <h4><?php echo $title ?></h4>
     <?php echo form_open('admin/save-job-category'); ?>
     <div class="form-group">
       <label>Category Name</label>
       <input type="text" name="name" class="form-control" required>
     </div>
     <div class="form-group">
       <label>Slug (If you leave it blank, it will be generated automatically.)</label>
       <input type="text" name="slug" class="form-control">
     </div>
     <div class="form-group">
       <label>Description (Meta Tag)</label>
       <input type="text" name="description" class="form-control">
     </div>
     <div class="form-group">
       <label>Keywords (Meta Tag)</label>
       <input type="text" name="keywords" class="form-control">
     </div>
     <div class="form-group">
       <label>Order</label>
       <input type="number" name="cat_order" class="form-control" required>
     </div>
   </div>
   <div class="sav-btn">
     <button type="submit">Save Job Category</button>
   </div>
   <?php echo form_close(); ?>
 </div>