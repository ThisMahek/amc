 <div class="form-area mt-5 mb-5">
     <div class="container">
         <?php $this->load->view('partials/_messages'); ?>
         <?php echo form_open('save-application'); ?>
         <div class="row">

             <div class="text-center">
                 <h4 class="form-heading "> Student Information </h4>
             </div>

             <div class="col-md-6">
                 <div class="form-cover">
                     <label>Course Applied for <span class="required">*</span></label>
                     <select class="form-control drop-arrow" name="course_id" required>
                         <option value="">Select One</option>
                         <?php foreach ($courses as $course) : ?>
                             <option value="<?php echo $course->id ?>"><?php echo $course->title ?></option>
                         <?php endforeach; ?>
                     </select>
                 </div>
             </div>

             <div class="col-md-6">
                 <div class="form-cover">
                     <label> Name of the Candidate <span class="required">*</span></label>
                     <input class="form-control" type="text" name="stu_name" name="stu_name" required value="<?php echo $this->session->flashdata('form_data')['stu_name']; ?>">
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="form-cover">
                     <label> Father's Name <span class="required">*</span></label>
                     <input class="form-control" type="text" name="f_name" required value="<?php echo $this->session->flashdata('form_data')['f_name']; ?>">
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="form-cover">
                     <label> Mother's Name <span class="required">*</span></label>
                     <input class="form-control" type="text" name="m_name" required value="<?php echo $this->session->flashdata('form_data')['m_name']; ?>">
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="form-cover">
                     <label> Date of Birth <span class="required">*</span></label>
                     <input class="form-control" type="date" name="dob" required value="<?php echo $this->session->flashdata('form_data')['dob']; ?>">
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="form-cover">
                     <label> Gender <span class="required">*</span></label>
                     <select class="form-control" name="gender" required>
                         <option value="">Select One</option>
                         <option value="M">Male</option>
                         <option value="F">Female</option>
                         <option value="O">Other</option>
                     </select>
                 </div>
             </div>

             <div class="col-md-6">
                 <div class="form-cover">
                     <label> Religion <span class="required">*</span></label>
                     <select class="form-control" name="religion" required>
                         <option value="">select one</option>
                         <option value="African Traditional &amp; Diasporic">African Traditional &amp; Diasporic</option>
                         <option value="Agnostic">Agnostic</option>
                         <option value="Atheist">Atheist</option>
                         <option value="Baha-i">Baha'i</option>
                         <option value="Buddhism">Buddhism</option>
                         <option value="Cao Dai">Cao Dai</option>
                         <option value="Chinese traditional religion">Chinese traditional religion</option>
                         <option value="Christianity">Christianity</option>
                         <option value="Hinduism">Hinduism</option>
                         <option value="Islam">Islam</option>
                         <option value="Jainism">Jainism</option>
                         <option value="Juche">Juche</option>
                         <option value="Judaism">Judaism</option>
                         <option value="Neo-Paganism">Neo-Paganism</option>
                         <option value="Nonreligious">Nonreligious</option>
                         <option value="Rastafarianism">Rastafarianism</option>
                         <option value="Secular">Secular</option>
                         <option value="Shinto">Shinto</option>
                         <option value="Sikhism">Sikhism</option>
                         <option value="Spiritism">Spiritism</option>
                         <option value="Tenrikyo">Tenrikyo</option>
                         <option value="Unitarian-Universalism">Unitarian-Universalism</option>
                         <option value="Zoroastrianism">Zoroastrianism</option>
                         <option value="primal-indigenous">primal-indigenous</option>
                     </select>
                 </div>
             </div>

             <div class="col-md-6">
                 <div class="form-cover">
                     <label> Category <span class="required">*</span></label>
                     <select class="form-control" name="category" required onchange="catCheck(this.value);">
                         <option value="">select one</option>
                         <option value="UR">General</option>
                         <option value="OBC">OBC </option>
                         <option value="SC">SC </option>
                         <option value="ST">ST </option>
                     </select>
                 </div>
             </div>

             <div class="col-md-6">
                 <div class="form-cover">
                     <label> Mobile No <span class="required">*</span> </label>
                     <input class="form-control" type="text" name="mobile" maxlength="10" onkeypress="return isNumberKey(event)" required value="<?php echo $this->session->flashdata('mobile')['mobile']; ?>">
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="form-cover">
                     <label> Email ID <span class="required">*</span></label>
                     <input class="form-control" type="email" name="email" required value="<?php echo $this->session->flashdata('form_data')['email']; ?>">
                 </div>
             </div>

             <div class="col-md-6">
                 <div class="form-cover">
                     <label> Education Qualification <span class="required">*</span></label>
                     <input class="form-control" type="text" name="qualification" required value="<?php echo $this->session->flashdata('form_data')['qualification']; ?>">
                 </div>
             </div>

             <div class="col-md-6">
                 <div class="form-cover">
                     <label> Id Prove <span class="required">*</span></label>
                     <select class="form-control" name="id_prove" required onchange="idProveSelector(this.value)">
                         <option value="">select one</option>
                         <option value="aadhaar">Aadhaar </option>
                         <option value="dl"> Driving Licence </option>
                         <option value="voter"> Voter ID </option>
                     </select>
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="form-cover">
                     <label> Password <span class="required">*</span></label>
                     <input class="form-control" type="password" name="password" required>
                 </div>
             </div>

             <div class="col-md-6">
                 <div class="form-cover">
                     <label> Re-type Password <span class="required">*</span></label>
                     <input class="form-control" type="password" name="confurm_password" required>
                 </div>
             </div>

             <div class="text-center Mtop30px">
                 <h4 class="form-heading "> Qualification Details </h4>
             </div>

             <div class="col-md-12">
                 <div class="table-responsive">
                     <table>
                         <thead>
                             <tr>
                                 <th>Exam Name</th>
                                 <th>Year of passing</th>
                                 <th>Board/University</th>
                                 <th>Total Marks</th>
                                 <th>Marks Obtained</th>
                                 <th>Subjects</th>
                                 <th>Percentage (%)</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td><input type="text" name="qual_details[exam_name][1]" class="form-control" required></td>
                                 <td><input type="text" name="qual_details[passing_year][1]" class="form-control"></td>
                                 <td><input type="text" name="qual_details[board][1]" class="form-control" required></td>
                                 <td><input type="text" name="qual_details[total_marks][1]" class="form-control"></td>
                                 <td><input type="text" name="qual_details[marks_obtained][1]" class="form-control" required></td>
                                 <td><input type="text" name="qual_details[subjects][1]" class="form-control" required></td>
                                 <td><input type="text" name="qual_details[percentage][1]" class="form-control" required></td>
                             </tr>
                             <tr>
                                 <td><input type="text" name="qual_details[exam_name][2]" class="form-control"></td>
                                 <td><input type="text" name="qual_details[passing_year][2]" class="form-control"></td>
                                 <td><input type="text" name="qual_details[board][2]" class="form-control"></td>
                                 <td><input type="text" name="qual_details[total_marks][2]" class="form-control"></td>
                                 <td><input type="text" name="qual_details[marks_obtained][2]" class="form-control"></td>
                                 <td><input type="text" name="qual_details[subjects][2]" class="form-control"></td>
                                 <td><input type="text" name="qual_details[percentage][2]" class="form-control"></td>
                             </tr>


                         </tbody>
                     </table>
                 </div>
             </div>

             <div class="text-center Mtop30px">
                 <h4 class="form-heading "> Address Information </h4>
             </div>

             <div class="row">
                 <div class="col-md-6">
                     <h4 class="address-heading">Present Address</h4>

                     <div class="form-cover">
                         <label>Address Line 1 <span class="required">*</span></label>
                         <input class="form-control" type="text" name="present_add_add_1" required value="<?php echo $this->session->flashdata('form_data')['present_add_add_1']; ?>">
                     </div>

                     <div class="form-cover">
                         <label>Address Line 2</label>
                         <input class="form-control" type="text" name="present_add_add_2" value="<?php echo $this->session->flashdata('form_data')['present_add_add_2']; ?>">
                     </div>


                     <div class="form-cover">
                         <label> District <span class="required">*</span></label>
                         <input class="form-control" type="text" name="present_add_district" required value="<?php echo $this->session->flashdata('form_data')['present_add_district']; ?>">
                     </div>

                     <div class="form-cover">
                         <label> State <span class="required">*</span></label>
                         <select name="present_add_state" id="state" class="form-control" required>
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
                     <div class="form-cover">
                         <label> Pin <span class="required">*</span></label>
                         <input class="form-control" type="text" name="present_add_pin" maxlength="6" onkeypress="return isNumberKey(event)" required value="<?php echo $this->session->flashdata('form_data')['present_add_pin']; ?>">
                     </div>

                 </div>


                 <div class="col-md-6">
                     <h4 class="address-heading">Permanent Address </h4>
                     <label class="container">
                         <input type="checkbox" id="permacheck" onchange="setResetPermanentAddress()">
                         Same As Present Address
                     </label>
                     <div class="form-cover">
                         <label>Address Line 1 <span class="required">*</span></label>
                         <input class="form-control" type="text" name="premanemt_add_1" required>
                     </div>

                     <div class="form-cover">
                         <label>Address Line 2</label>
                         <input class="form-control" type="text" name="premanemt_add_2">
                     </div>
                     <div class="form-cover">
                         <label> District <span class="required">*</span></label>
                         <input class="form-control" type="text" name="premanemt_add_district" required>
                     </div>
                     <div class="form-cover">
                         <label> State <span class="required">*</span></label>
                         <select name="premanemt_add_state" class="form-control" required>
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
                     <div class="form-cover">
                         <label> Pin <span class="required">*</span></label>
                         <input class="form-control" type="text" name="premanemt_add_pin" maxlength="6" onkeypress="return isNumberKey(event)" required>
                     </div>
                 </div>

             </div>









             <div class="text-center Mtop30px B-gap30">
                 <h4 class="form-heading ">Upload Section:</h4>
             </div>


             <div class="col-md-3 col-sm-6">
                 <div class="upload-photo">
                     <p class="photoupload-text text-center"> Intermediate Marksheet</p>
                     <div class="image-holder">
                         <div class="mp_marksheet_img_div">

                         </div>
                         <img id="imgPreview" class="mp_marksheet_img" src="<?php echo base_url() ?>assets/backend/images/noimg.png" alt="pic" />
                     </div>
                     <input class="custom-file-inputm" type="file" id="mp_marksheet_img" required="true" onchange="uploadMpimg()" />
                     <p class="error-file mp_marksheet_img-error"></p>
                 </div>
             </div>
             <div class="col-md-3 col-sm-6">
                 <div class="upload-photo">
                     <p class="photoupload-text text-center"> Highschool Marksheet</p>
                     <div class="image-holder">
                         <div class="hs_marksheet_img_div">

                         </div>
                         <img id="imgPreview" class="hs_marksheet_img" src="<?php echo base_url() ?>assets/backend/images/noimg.png" alt="pic" />
                     </div>
                     <input class="custom-file-inputm" type="file" id="hs_marksheet_img" required="true" onchange="uploadHsImge()" />
                     <p class="error-file hs_marksheet_img-error"></p>
                 </div>
             </div>

           
             <div class="col-md-3 col-sm-6">
                 <div class="upload-photo">
                     <p class="photoupload-text text-center"> <span class="idprove">Voter</span> Upload </p>
                     <div class="image-holder">
                         <div class="id_prof_img_div">

                         </div>
                         <img id="imgPreview" class="id_prof_img" src="<?php echo base_url() ?>assets/backend/images/noimg.png" alt="pic" />
                     </div>
                     <input class="custom-file-inputm" type="file" id="id_prof_img" required="true" onchange="uploadIdProveImage()" />
                     <p class="error-file id_prof_img-error"></p>
                 </div>
             </div>

             <div class="col-md-3 col-sm-6">
                 <div class="upload-photo">
                     <p class="photoupload-text text-center"> Photograph <span class="required">*</span></p>
                     <div class="image-holder">
                         <div class="avatar_div">

                         </div>
                         <img id="imgPreview" class="avatar" src="<?php echo base_url() ?>assets/backend/images/noimg.png" alt="pic" />
                     </div>
                     <input class="custom-file-inputm" type="file" id="avatar" required="true" onchange="uploadstudentImage()" />
                     <p class="error-file avatar-error"></p>
                 </div>
             </div>

             <div class="col-md-3 col-sm-6">
                 <div class="upload-photo">
                     <p class="photoupload-text text-center"> Signature <span class="required">*</span></p>
                     <div class="image-holder">
                         <div class="sign_img_div">

                         </div>

                         <img id="imgPreview" class="sign_img" src="<?php echo base_url() ?>assets/backend/images/noimg.png" alt="pic" />
                     </div>
                     <input class="custom-file-inputm" type="file" id="sign_img" required="true" onchange="uploadstSignImage()" />
                     <p class="error-file sign_img-error"></p>
                 </div>
             </div>
             <div class="col-md-3 col-sm-6">
                 <div class="upload-photo">
                     <p class="photoupload-text text-center"> Cast Certificate <span class="required cast"></span></p>
                     <div class="image-holder">
                         <div class="cast_certi_img_div">

                         </div>

                         <img id="imgPreview" class="cast_certi_img" src="<?php echo base_url() ?>assets/backend/images/noimg.png" alt="pic" />
                     </div>
                     <input class="custom-file-inputm" type="file" id="cast_certi_img" onchange="uploadstCertificateImage();" />
                     <p class="error-file cast_certi_img-error"></p>
                 </div>
             </div>


             <div class="col-md-12 text-center">
                 <input type="hidden" value="" name="avatar">
                 <input type="hidden" value="" name="sign_img">
                 <input type="hidden" value="" name="cast_certi_img">
                 <input type="hidden" value="" name="id_prof_img">
                 <input type="hidden" value="" name="graduate_marksheet_img">
                 <input type="hidden" value="" name="hs_marksheet_img">
                 <input type="hidden" value="" name="mp_marksheet_img">
                 <button type="submit" name="et_builder_submit_button" class="send-message border-0 "> Register </button>
             </div>
             <?php echo form_close(); ?>

         </div>
     </div>
 </div>