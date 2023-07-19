<div class="col-sm-12">
    <?php $this->load->view('admin/includes/_messages'); ?>
</div>

<div class="wrapper2">
    <div class="mblog">
        <?php echo form_open('adminfranchise_controller/application_approve_post'); ?>
        <div class="form-group">
            <label>franchise Name</label>
            <input type="text" class="form-control" value="<?php echo $franchise->franchise_name ?>" disabled>
        </div>
        <div class="form-group">
            <label>Course applied for </label>
            <input type="text" class="form-control" value="<?php echo implode(',',$courses) ?>" disabled>
        </div>
        <div class="form-group">
            <label>Franchise User Name </label>
            <input type="text" class="form-control" value="<?php echo $franchise->franchise_email; ?>" disabled>
        </div>
        <div class="form-group">
            <label>Franchise Fees </label>
            <input type="text" class="form-control" value="<?php echo $franchise_feees->franchise_fees; ?>" disabled>
        </div>
        <div class="form-group">
            <label>Per Course Fees </label>
            <input type="text" class="form-control" value="<?php echo $franchise_feees->per_course_feee; ?>" disabled>
        </div>
        <div class="form-group">
            <label>Total Fees </label>
            <input type="text" class="form-control" value="<?php echo $franchise_feees->franchise_fees+($franchise_feees->per_course_feee* count($courses)); ?>" disabled>
        </div>
        <?php if ($franchise->pay_status ==0): ?>
        <div class="form-group">
            <label>Payment Status</label>
            <select class="form-control" name="is_payment_done">
                <option value="">Select Payment Status</option>
                <option value="1">Payment Done</option>
                <option value="0">Payment Not Done</option>
            </select>
        </div>
        <?php elseif($franchise->pay_status ==1): ?>
          <input type="hidden" name="is_payment_done" value="<?php echo $franchise->pay_status ?>">
        <?php endif ?>
        <div class="form-group">
            <label>Payment Mode </label>
            <select class="form-control" name="payment_mode">
              <option value="">Select Paymetn Mode</option>  
              <option value="offline">Offline</option>  
              <option value="online">Online</option>  
            </select>
        </div>
        <div class="form-group">
            <label>Transaction Reference </label>
            <input class="form-control" type="text" name="transaction_reference" value="" placeholder="Transaction Reference">
        </div>
        <div class="form-group">
            <label>Transaction Date </label>
            <input class="form-control" type="date" name="transaction_date" value="" placeholder="Select Transaction Date">
        </div>
        <div>
           <label>Transaction Time </label>
            <input class="form-control" type="time" name="transaction_time" value="" placeholder="Select Transaction Date"> 
        </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $franchise->id ?>">
    <div class="sav-btn">
        <button type="submit">Approved </button>
    </div>
    <?php echo form_close(); ?>
</div>