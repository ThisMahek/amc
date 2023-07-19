<div class="post-b">
    <div class="post-h">
        <h5>Add Franchise</h5>
        <a class="btn btn-primary" href="<?php echo admin_url() . 'franchises' ?>">All Franchise</a>
    </div>
    <div class="row">

        <div class="post-d">
            <?php $this->load->view('admin/includes/_messages'); ?>
            <?php echo form_open('admin/save-franchise'); ?>
            <div class="form-area">

                <div class="row">

                    <div class="text-center Mtop30px">
                        <h4 class="form-heading "> Franchise Information </h4>
                    </div>
                    <?php debug($this->session->flashdata('form_data')); ?>
                   
                    <div class="col-md-6">
                        <div class="form-cover">
                            <label> Franchise Name <span class="required">*</span></label>
                            <input class="form-control" type="text" name="franchise_name" required value="<?php echo $this->session->flashdata('form_data')['franchise_name']; ?>" placeholder="Enter Franchise Name">
                        </div>
                    </div>                   
                    
                    <div class="col-md-6">
                        <div class="form-cover">
                            <label> Email ID <span class="required">*</span></label>
                            <input class="form-control" type="email" name="franchise_email" required value="<?php echo $this->session->flashdata('form_data')['franchise_email']; ?>" placeholder="Enter Franchise Email Id" >
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-cover">
                            <label> Mobile No <span class="required">*</span> </label>
                            <input class="form-control" type="text" name="franchise_contact" maxlength="10" onkeypress="return isNumberKey(event)" required value="<?php echo $this->session->flashdata('form_data')['franchise_contact']; ?>" placeholder="Enter Franchise Mobile Number">
                        </div>
                    </div>
                    

                   

                   
                    <div class="col-md-6">
                        <div class="form-cover">
                            <label> Password <span class="required">*</span></label>
                            <input class="form-control" type="password" name="password" required placeholder="Enter Enter Password">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-cover">
                            <label> Re-type Password <span class="required">*</span></label>
                            <input class="form-control" type="password" name="confurm_password" required>
                        </div>
                    </div>

                    

                    <div class="text-center Mtop30px">
                        <h4 class="form-heading "> Address Information </h4>
                    </div>

                    <div class="col-sm-12">
                        <!-- <div class="col-md-6"> -->
                           <!--  <h4 class="address-heading">Present Address </h4> -->

                            <div class="form-cover col-md-6">
                                <label>Address Line 1 <span class="required">*</span></label>
                                <input class="form-control" type="text" name="franchise_address_1" required value="<?php echo $this->session->flashdata('form_data')['franchise_address_1']; ?>" placeholder="Enter Building/Street No. ">
                            </div>

                            <div class="form-cover col-md-6">
                                <label>Address Line 2</label>
                                <input class="form-control" type="text" name="franchise_address_2" value="<?php echo $this->session->flashdata('form_data')['franchise_address_2']; ?>" placeholder="Enter Area/Vilage/Post">
                            </div>


                            <div class="form-cover col-md-6">
                                <label> District <span class="required">*</span></label>
                                <input class="form-control" type="text" name="franchise_district" required value="<?php echo $this->session->flashdata('form_data')['franchise_district']; ?>" placeholder="Enter District ">
                            </div>

                            <div class="form-cover col-md-6">
                                <label> State <span class="required">*</span></label>
                                <select name="franchise_state" id="state" class="form-control" required>
                                    <option value="">Select One</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                    <option value="Daman and Diu">Daman and Diu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Puducherry">Puducherry</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="West Bengal">West Bengal</option>
                                </select>

                            </div>
                            <div class="form-cover col-md-6">
                                <label> Pin <span class="required">*</span></label>
                                <input class="form-control" type="text" name="franchise_pin" maxlength="6" onkeypress="return isNumberKey(event)" required value="<?php echo $this->session->flashdata('form_data')['franchise_pin']; ?>">
                            </div>


                        <!-- </div> -->


                        
                    </div>
                                      
                    
                </div>

            </div>
            
            <div class="right-fifth sub-btn2">
                <button type="submit" class="">Add Franchise</button>
            </div>
            <?php form_close(); ?>


        </div>
    </div>