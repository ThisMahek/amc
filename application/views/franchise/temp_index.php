<div class="post-b">
    <div class="row">
        <div class="post-d">
            <h1 class="text-center">Hi, <?php echo $franchise_data->franchise_name; ?></h1>
        
            <?php if ($franchise_data->status == 0) : ?>
                <div class="text-center">
                    <h4 class="text-danger">Your Application is not completed Please Complete Your Application </h4>
                    <?php echo form_open('update-franchise'); ?>
                 
                </div>
                <div class="form-area">
                   <div class="row">

                     <div class="text-center">
                         <h4 class="form-heading "> Franchise Basic Information </h4>
                     </div>
                     
                     <div class="col-md-6">
                         <div class="form-cover">
                             <label> Proposed Center Name <span class="required">*</span></label>
                             <input class="form-control" type="text" name="franchise_name" required value="<?php echo !empty($this->session->flashdata('form_data')['franchise_name'])?$this->session->flashdata('form_data')['franchise_name']:$franchise_data->franchise_name; ?>">
                         </div>
                     </div>
                     
                     <div class="col-md-6">
                         <div class="form-cover">
                             <label>Address Line 1 <span class="required">*</span></label>
                             <input class="form-control" type="text" name="franchise_address_1" required value="<?php echo !empty($this->session->flashdata('form_data')['franchise_address_1'])?$this->session->flashdata('form_data')['franchise_address_1']:$franchise_data->franchise_address_1; ?>">
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-cover">
                             <label>Address Line 2</label>
                             <input class="form-control" type="text" name="franchise_address_2" value="<?php echo !empty($this->session->flashdata('form_data')['franchise_address_2'])?$this->session->flashdata('form_data')['franchise_address_2']:$franchise_data->franchise_address_2; ?>">
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-cover">
                             <label> District <span class="required">*</span></label>
                             <input class="form-control" type="text" name="franchise_district" required value="<?php echo !empty($this->session->flashdata('form_data')['franchise_district'])?$this->session->flashdata('form_data')['franchise_district']:$franchise_data->franchise_district; ?>">
                         </div>
                     </div>
                     <div class="col-md-6">
                          <div class="form-cover">
                             <label> State <span class="required">*</span></label>
                             <select name="franchise_state" id="franchise_state" class="form-control" required>
                                 <option value="">Select One</option>
                                 <?php foreach ($state as $key => $value) { 
                                  $selected = ($franchise_data->franchise_state == $value)?'selected="selected"':'';

                                  $selected = !empty($this->session->flashdata('form_data')['franchise_state']) && $this->session->flashdata('form_data')['franchise_state']==$value?'selected="selected"':$selected;
                                 ?>

                                     <option value="<?= $value ?>" <?= $selected ?>><?= $value ?></option>
                                 <?php } ?>
                                 
                             </select>

                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-cover">
                             <label> Pin <span class="required">*</span></label>
                             <input class="form-control" type="text" name="franchise_pin" maxlength="6" onkeypress="return isNumberKey(event)" required value="<?php echo !empty($this->session->flashdata('form_data')['franchise_pin'])?$this->session->flashdata('form_data')['franchise_pin']:$franchise_data->franchise_pin; ?>">
                         </div>
                     </div>
                     
                     <div class="col-md-6">
                         <div class="form-cover">
                             <label> President/Manager Name (Society/Trust/Section 8 Company)  <span class="required">*</span></label>
                             <input class="form-control" type="text" name="president_name" required value="<?php echo !empty($this->session->flashdata('form_data')['president_name'])?$this->session->flashdata('form_data')['president_name']:$franchise_data->president_name; ?>">
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-cover">
                             <label> Aadhar Number <span class="required">*</span></label>
                             <input class="form-control" type="text" name="president_aadhar_number" required value="<?php echo !empty($this->session->flashdata('form_data')['president_aadhar_number'])?$this->session->flashdata('form_data')['president_aadhar_number']:$franchise_data->president_aadhar_number; ?>">
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-cover">
                             <label> Pan Number  <span class="required">*</span></label>
                             <input class="form-control" type="text" name="franchise_pan_number" required value="<?php  echo !empty($this->session->flashdata('form_data')['franchise_pan_number'])?$this->session->flashdata('form_data')['franchise_pan_number']:$franchise_data->franchise_pan_number; ?>">
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-cover">
                             <label> Date of Birth <span class="required">*</span></label>
                             <input class="form-control" type="date" name="president_dob" required value="<?php echo !empty($this->session->flashdata('form_data')['president_dob'])?$this->session->flashdata('form_data')['president_dob']:$franchise_data->president_dob; ?>">
                         </div>
                     </div>
                    
                     <div class="col-md-6">
                         <div class="form-cover">
                             <label> Mobile No <span class="required">*</span> </label>
                             <input class="form-control" type="text" name="franchise_contact" maxlength="10" onkeypress="return isNumberKey(event)" required value="<?php echo !empty($this->session->flashdata('form_data')['franchise_contact'])?$this->session->flashdata('form_data')['franchise_contact']:$franchise_data->franchise_contact; ?>">
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-cover">
                             <label> Email ID <span class="required">*</span></label>
                             <input class="form-control" type="email" name="franchise_email" required value="<?php echo !empty($this->session->flashdata('form_data')['franchise_email'])?$this->session->flashdata('form_data')['franchise_email']:$franchise_data->franchise_email; ?>">
                             <div class="verification_div">
                              <?php if ($franchise_data->email_verification): ?>
                               <span class="pull-right" style="background-color: green;border-radius: 2px;"> Email Verified</span>
                              <?php else: ?>
                              <button type="button" onclick="sendVerificationCode()" style="text-decoration:underline; >" class="pull-right" id="verified_email" fdprocessedid="3idyzbi">Verified Email</button>

                              <?php endif ?>
                              
                              </div>
                              <input type="hidden" name="email_verification" id="email_verification" value="<?php echo $franchise_data->email_verification ?>">
                         </div>
                     </div>
                     
                     <div class="text-center Mtop30px B-gap30"><h4 class="form-heading">Select Courses</h4></div>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-cover">
                                 <label>Course Applied for <span class="required">*</span></label>
                                 <select class="form-control drop-arrow" name="course_id[]"  required multiple = "multiple">
                                     <option value="">Select One</option>
                                     <?php foreach ($courses_select as $course) : ?>
                                         <option value="<?php echo $course->id ?>"><?php echo $course->title ?></option>
                                     <?php endforeach; ?>
                                 </select>
                             </div>
                         </div>
                     </div>
                     <div class="text-center Mtop30px B-gap30">
                         <h4 class="form-heading ">Upload Section:</h4>
                     </div>

                     <div class="col-md-3 col-sm-6">
                         <div class="upload-photo">
                             <p class="photoupload-text text-center"> Registration certificate</p>
                             <div class="image-holder">
                                 <div class="registration_certificate_img_div">

                                 </div>
                                 <img id="imgPreview" class="registration_certificate_img" src="<?php echo base_url() ?>assets/backend/images/noimg.png" alt="pic" />
                             </div>
                             <input class="custom-file-inputm" type="file" id="registration_certificate_img" onchange="uploadRegistrationCertificateImg()" />
                             <p class="error-file registration_certificate_img-error"></p>
                         </div>
                     </div>
                     <div class="col-md-3 col-sm-6">
                         <div class="upload-photo">
                             <p class="photoupload-text text-center"> Franchise PAN Card</p>
                             <div class="image-holder">
                                 <div class="franchise_pan_card_img_div">

                                 </div>
                                 <img id="imgPreview" class="franchise_pan_card_img" src="<?php echo base_url() ?>assets/backend/images/noimg.png" alt="pic" />
                             </div>
                             <input class="custom-file-inputm" type="file" id="franchise_pan_card_img"  onchange="uploadFrPanCard()" />
                             <p class="error-file franchise_pan_card_img-error"></p>
                         </div>
                     </div>


                     <div class="col-md-3 col-sm-6">
                         <div class="upload-photo">
                             <p class="photoupload-text text-center"> Unique ID of NGO Darpan Registration </p>
                             <div class="image-holder">
                                 <div class="unique_id_img_div">

                                 </div>
                                 <img id="imgPreview" class="unique_id_img" src="<?php echo base_url() ?>assets/backend/images/noimg.png" alt="pic" />
                             </div>
                             <input class="custom-file-inputm" type="file" id="unique_id_img"  onchange="uploadUniqueId()" />
                             <p class="error-file unique_id_img-error"></p>
                         </div>
                     </div>

                     <div class="col-md-3 col-sm-6">
                         <div class="upload-photo">
                             <p class="photoupload-text text-center"> MSME Registration Certificate <span class="required">*</span></p>
                             <div class="image-holder">
                                 <div class="msme_certificate_img_div">

                                 </div>
                                 <img id="imgPreview" class="msme_certificate_img" src="<?php echo base_url() ?>assets/backend/images/noimg.png" alt="pic" />
                             </div>
                             <input class="custom-file-inputm" type="file" id="msme_certificate_img"  onchange="uploadMsmeCertificate()" />
                             <p class="error-file msme_certificate_img-error"></p>
                         </div>
                     </div>

                     <div class="col-md-3 col-sm-6">
                         <div class="upload-photo">
                             <p class="photoupload-text text-center"> Aadhar of President/Manager <span class="required">*</span></p>
                             <div class="image-holder">
                                 <div class="president_aadhar_img_div">

                                 </div>

                                 <img id="imgPreview" class="president_aadhar_img" src="<?php echo base_url() ?>assets/backend/images/noimg.png" alt="pic" />
                             </div>
                             <input class="custom-file-inputm" type="file" id="president_aadhar_img"  onchange="uploadAadharCard()" />
                             <p class="error-file president_aadhar_img-error"></p>
                         </div>
                     </div>
                     <div class="col-md-3 col-sm-6">
                         <div class="upload-photo">
                             <p class="photoupload-text text-center"> PAN of President/Manager <span class="required cast"></span></p>
                             <div class="image-holder">
                                 <div class="president_pan_img_div">

                                 </div>

                                 <img id="imgPreview" class="president_pan_img" src="<?php echo base_url() ?>assets/backend/images/noimg.png" alt="pic" />
                             </div>
                             <input class="custom-file-inputm" type="file" id="president_pan_img" onchange="uploadPresidentPanCard();" />
                             <p class="error-file president_pan_img-error"></p>
                         </div>
                     </div>
                     <div class="col-md-3 col-sm-6">
                         <div class="upload-photo">
                             <p class="photoupload-text text-center"> Latest Photograph of President/Manager <span class="required cast"></span></p>
                             <div class="image-holder">
                                 <div class="president_photograph_img_div">

                                 </div>

                                 <img id="imgPreview" class="president_photograph_img" src="<?php echo base_url() ?>assets/backend/images/noimg.png" alt="pic" />
                             </div>
                             <input class="custom-file-inputm" type="file" id="president_photograph_img" onchange="uploadPresidentImage();" />
                             <p class="error-file president_photograph_img-error"></p>
                         </div>
                     </div>
                     <div class="col-md-3 col-sm-6">
                         <div class="upload-photo">
                             <p class="photoupload-text text-center"> Signature of President/Manager <span class="required cast"></span></p>
                             <div class="image-holder">
                                 <div class="president_signature_img_div">

                                 </div>

                                 <img id="imgPreview" class="president_signature_img" src="<?php echo base_url() ?>assets/backend/images/noimg.png"  />
                             </div>
                             <input class="custom-file-inputm" type="file" id="president_signature_img" onchange="uploadSignatureImages();" />
                             <p class="error-file president_signature_img-error"></p>
                         </div>
                     </div>

                     <div class="col-md-10 col-sm-10"> 
                         <div class="check-cancellation flex-shrink-0 position-relative">

                         <label><input type="checkbox" class="term-and-condition" name="accept_term_and_condition">Please accept the <a href="<?php echo base_url().'assets/terms_and_conditions.pdf' ?>" target="_blank" >SSGIPS Term &amp; Conditions</a></label><br>
                        </div>
                    
                      </div>      
                     <div class="col-md-2 col-sm-2 text-center " >
                        
                           
                         <input type="hidden" value="" name="registration_certificate_img">
                         <input type="hidden" value="" name="franchise_pan_card_img">
                         <input type="hidden" value="" name="unique_id_img">
                         <input type="hidden" value="" name="msme_certificate_img"> 
                         <input type="hidden" value="" name="president_aadhar_img">
                         <input type="hidden" value="" name="president_pan_img">
                         <input type="hidden" value="" name="president_photograph_img">
                         <input type="hidden" value="" name="president_signature_img">
                         <button type="submit" name="et_builder_submit_button pull-right" class="send-message border-0 "> Register </button>
                         
                     </div>

                 </div>
                 <?php echo form_close(); ?> 
                </div>
            <?php elseif ($franchise_data->status == 3) : ?>
                <div class="">
                    <h4 class="text-danger">Your application mark as dispute please re upload the folowing document and send it to us via register post to our address.</h4>
                    <p> To avoid rejection please send the hardcopy documents (which you have uploded in the time of application ) send it to us via register post to our address.</p>

                </div>
                <div class="text-center">
                    <a href="<?php echo base_url() .'franchise_data/reupload-documents' ?>"  class="btn btn-success">Re Upload Documents  </a>
                </div>

            <?php elseif ($franchise_data->status == 0) : ?>
                <div class="">
                    <h4 class="text-info">Your application is under review.</h4>
                    <p> To avoid rejection please send the hardcopy documents (which you have uploded in the time of application ) send it to us via register post to our address.</p>
                </div>
             <?php elseif ($franchise_data->pay_status == 0) : ?>
                <div class="text-center">
                    <h4 class="text-danger">Admission / Application fees is not paid please pay with scan QR CODE or transfer on given bank details.</h4>
                    <div>After payment please send transation screenshort to mail id <a href="mailto:info@ssgips.in"><span></span>info@ssgips.in</a></div>
                    
                    <div class="row"> 
                    <div class="col-md-12"> 
                        <table style="width:100%" class="payment_details">
                               <tr>
                                     <th>S. No</th> 
                                     <th>Fees (Rs)</th> 
                               </tr>
                               <tr>
                                     <td>Franchise Fees</td> 
                                     <td><?php echo $fees->franchise_fees; ?></td> 
                               </tr>
                               <?php 
                                   
                                   foreach ($courses as  $aCourses) {
                               ?>
                               <tr>
                                     <td><?php echo $aCourses->title.'('.$aCourses->title_name.')'; ?></td> 
                                     <td><?php echo $fees->per_course_feee; ?></td> 
                               </tr>
                           <?php } ?>
                           <tr>
                             <td><strong>Total </strong></td> 
                             <td><strong>Rs <?php echo $fees->franchise_fees+ ($fees->per_course_feee * count($courses)); ?></strong></td> 
                           </tr>
                        </table>  
                        </div>
                        <div class="col-md-6"><img style="width: 75%;" src="<?php echo base_url().'assets/frontend/images/payment_qr_code.jpeg' ?>">
                        </div>
                        <div class="col-md-6">
                             <strong>BANK NAME :</strong>HDFC BANK </br>
                             <strong>RTGS / NEFT IFSC :</strong> HDFC0004008 </br>
                             <strong>Account Name :</strong> SRI SITARAM G G STN INST OF PARAMED SCIN</br>
                             <strong>Ac No. :</strong> 50100582990253 </br>
                        </div>
                        <div class="col-md-12">
                        <?php   $this->load->view('admin/franchise/application_details',['franchise'=>$franchise_data,'course'=>$courses,'trans'=>$trans]); ?>
                        </div>
                    </div>
                </div>     
            <?php endif; ?>
        </div>
    </div>
</div>
 <div class="modal verified-modal"  tabindex="-1" role="dialog" id="verified-modal" style="padding-right: 17px;">
      <div class="modal-dialog modal-md modal-dialog-centered " role="document">
        <div class="modal-content">
         
          <div class="modal-header align-items-center">
            <h4 class="modal-title"><i class="fa fa-user"></i> Email verified</h4>
            <button  type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             
             <div class="form-cover d-flex align-items-center icon-input-column">
                <input name="verification_code" id="verification_code" type="number" maxlength="4" minlength="4" class="form-control" placeholder="Enter 4 Digit verification code">

              </div>
              <input type="hidden" id="verification_id" value="">
          </div>
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-default login-btn col-12" onclick="verifiedEmail()">Verified</button>
          </div>

        
         <!--  </form> -->
        </div>
      </div>
    </div>

    <style type="text/css">
        payment_details.table.payment_details, th, td 
        {
          border:1px solid black;
        }
    </style>