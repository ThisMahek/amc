<div class="wrapper">
    <div class="">
        <?php echo form_open_multipart('admin/donationSettings_post'); ?>
        <div class="wrapper-box">
            <h1 class="text-center">Donation Settings</h1>
            <div class="col-sm-12">
                <?php $this->load->view('admin/includes/_messages'); ?>
            </div>
            <div class="wrapper-box-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Setting Language</label>
                            <select name="lang_id" class="form-control" onchange="window.location.href = '<?php echo admin_url(); ?>donationsettings?lang='+this.value;" style="max-width: 600px;">
                                <?php foreach ($this->languages as $language) : ?>
                                    <option value="<?php echo $language->id; ?>" <?php echo ($language->id == $settings_lang) ? 'selected' : ''; ?>><?php echo $language->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="m-wrapper-content">

                    <div class="captcha">
                        <div class="captcha-content">
                            <div class="form-group">
                                <label>Donation Heading</label>
                                <input type="text" name="donation_heading" value="<?php echo $donation_settings->donation_heading; ?>" class="form-control" placeholder="Donation Heading">
                            </div>
                            <div class="form-group">
                                <label>Donation Description</label>
                                <textarea name="donation_description" class="form-control ckeditor" placeholder="Donation Description"><?php echo $donation_settings->donation_description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Beneficiary Name</label>
                                <input type="text" name="account_name" class="form-control" value="<?php echo $donation_settings->account_name; ?>" placeholder="Beneficiary Name">
                            </div>
                            <div class="form-group">
                                <label>Bank Name</label>
                                <input type="text" name="bank_name" class="form-control" value="<?php echo $donation_settings->bank_name; ?>" placeholder="Bank Name">
                            </div>
                            <div class="form-group">
                                <label>Beneficiary Account Number</label>
                                <input type="text" name="account_no" class="form-control" value="<?php echo $donation_settings->account_no; ?>" placeholder="Beneficiary  Account Number">
                            </div>
                            <div class="form-group">
                                <label>Beneficiary IFSC Code</label>
                                <input type="text" name="ifsc_code" class="form-control" value="<?php echo $donation_settings->ifsc_code; ?>" placeholder="Beneficiary IFSC Code">
                            </div>
                            <div class="form-group">
                                <label>Bank branch Address</label>
                                <input type="text" name="branch_address" class="form-control" value="<?php echo $donation_settings->branch_address; ?>" placeholder="Bank branch Address">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <?php if (!empty($donation_settings->donation_image)) : ?>
                                    <div class="row mx-auto" style="margin:10px 0;">
                                        <div class="col-md-3 " style="padding:0">
                                    <img width="100%" src="<?php echo base_url(). 'uploads/misc/'.$donation_settings->donation_image ?>">
                                </div>
                            </div>
                                <?php else : ?>
                                   <div class="row mx-auto " style="margin:10px 0;">
                                        <div class="col-md-3" style="padding:0">
                                    <img width="100%" src="<?php echo base_url(). 'assets/backend/images/noimg.png' ?>">
                                </div>

                                    </div>
                                <?php endif; ?>
                                <input type="file" name="donation_image" class="" value="" placeholder="Image">
                            </div>
                            <input type="hidden" name="oldIng" value="<?php echo $donation_settings->donation_image; ?>">
                            <div class="sav-btn">
                                <button>Save Changes</button>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>