<div class="post-b">
    <div class="post-h">
        <h5>Add Session</h5>
        <a class="btn btn-primary" href="<?php echo admin_url() . 'academic-session' ?>">All Sessions</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="post-d">
                <h5>Session Details</h5>
                <?php $this->load->view('admin/includes/_messages'); ?>

                <?php echo form_open('admin/save-sessions'); ?>
                <div class="dinamicfiles__">

                </div>
                <div class="form-group">
                    <label>Course <span class="required">*</span></label>
                    <select class="form-control" id="class_id" name="class_id" onchange="getCourseDetails(this.value)" required>
                        <option value="">Select Course</option>
                        <?php foreach ($courses as $key => $value) : ?>
                            <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Session Name<span class="required">*</span></label>
                    <input type="text" name="session_name" class="form-control" placeholder="Session Name" required>
                </div>
                <div class="form-group">
                    <label>Session Start From<span class="required">*</span></label>
                    <input type="date" name="start_date" class="form-control" placeholder="" required>
                </div>
                <div class="form-group">
                    <label>Course Duration (In Month) <span class="required">*</span></label>
                    <input type="text" name="duration_month" class="form-control" placeholder="0" required readonly>
                </div>
                <div class="form-group">
                    <label>Total Course Fees (sum all year) <span class="required">*</span></label>
                    <input type="text" name="total_fees" class="form-control" placeholder="0" required onblur="calculateEmi(this.value)">
                </div>
                <div class="form-group">
                    <label>Admission Fees <span class="required">*</span></label>
                    <input type="text" name="admission_fees" class="form-control" placeholder="0" readonly>
                </div>
                <div class="form-group">
                    <label>EMI Course Fees <span class="required">*</span></label>
                    <input type="text" name="installment_fees" class="form-control" placeholder="0" required readonly>
                </div>

             
            </div>
            <div class="right-fifth sub-btn2">
                <button type="submit" class="">Add Session</button>
            </div>
            <?php form_close(); ?>
        </div>

    </div>
</div>