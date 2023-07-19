<?php $this->load->view('admin/includes/_messages'); ?>
<div class="wrapper2">
  <div class="mblog">
    <div class="col-sm-12">

    </div>
    <h4><?php echo $title ?></h4>
    <?php echo form_open('admin/update-job-category'); ?>

    <div class="form-group">
      <label>Category Name</label>
      <input type="text" name="name" class="form-control" required value="<?php echo html_escape($category->name); ?>">
    </div>
    <div class="form-group">
      <label>Slug (If you leave it blank, it will be generated automatically.)</label>
      <input type="text" name="slug" class="form-control" value="<?php echo html_escape($category->slug); ?>">
    </div>
    <div class="form-group">
      <label>Description (Meta Tag)</label>
      <input type="text" name="description" class="form-control" value="<?php echo html_escape($category->description); ?>">
    </div>
    <div class="form-group">
      <label>Keywords (Meta Tag)</label>
      <input type="text" name="keywords" class="form-control" value="<?php echo html_escape($category->keywords); ?>">
    </div>
    <div class="form-group">
      <label>Order</label>
      <input type="number" name="cat_order" class="form-control" required value="<?php echo html_escape($category->cat_order); ?>">
    </div>
  </div>
  <input type="hidden" name="id" value="<?php echo html_escape($category->id); ?>">
  <div class="sav-btn">
    <button type="submit">Save Blog Category</button>
  </div>
  <?php echo form_close(); ?>
</div>