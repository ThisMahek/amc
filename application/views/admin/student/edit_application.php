<div class="post-b">

    <div class="row">

        <div class="post-d">
            <?php $this->load->view('admin/includes/_messages'); ?>
            <?php echo form_open('admin/update-student-application'); ?>
            <div class="form-area">

                <div class="row">

                    <div class="text-center Mtop30px">
                        <h4 class="form-heading "> Student Information </h4>
                    </div>

                    <div class="col-md-6">
                        <div class="form-cover">
                            <label>Course Applied for <span class="required">*</span></label>
                            <select class="form-control drop-arrow" name="course_id" required>
                                <option value="">Select One</option>
                                <?php foreach ($courses as $course) : ?>
                                    <option value="<?php echo $course->id ?>" <?php echo ($student->course_id == $course->id) ? "selected" : "" ?>><?php echo $course->title ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-cover">
                            <label> Name of the Candidate <span class="required">*</span></label>
                            <input class="form-control" type="text" name="stu_name" name="stu_name" required value="<?php echo $student->stu_name; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-cover">
                            <label> Father's Name <span class="required">*</span></label>
                            <input class="form-control" type="text" name="f_name" required value="<?php echo $student->f_name; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-cover">
                            <label> Mother's Name <span class="required">*</span></label>
                            <input class="form-control" type="text" name="m_name" required value="<?php echo $student->m_name; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-cover">
                            <label> Date of Birth <span class="required">*</span></label>
                            <input class="form-control" type="date" name="dob" required value="<?php echo $student->dob; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-cover">
                            <label> Gender <span class="required">*</span></label>
                            <select class="form-control" name="gender" required>
                                <option <?php echo ($student->gender == "") ? "selected" : "" ?> value="">Select One</option>
                                <option <?php echo ($student->gender == "M") ? "selected" : "" ?> value="M">Male</option>
                                <option <?php echo ($student->gender == "F") ? "selected" : "" ?> value="F">Female</option>
                                <option <?php echo ($student->gender == "O") ? "selected" : "" ?> value="O">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-cover">
                            <label> Religion <span class="required">*</span></label>
                            <select class="form-control" name="religion" required>
                                <option <?php echo ($student->religion == "") ? "selected" : "" ?> value="">select one</option>
                                <option <?php echo ($student->religion == "Buddhism") ? "selected" : "" ?> value="Buddhism">Buddhism</option>
                                <option <?php echo ($student->religion == "Christianity") ? "selected" : "" ?> value="Christianity">Christianity</option>
                                <option <?php echo ($student->religion == "Hinduism") ? "selected" : "" ?> value="Hinduism">Hinduism</option>
                                <option <?php echo ($student->religion == "Islam") ? "selected" : "" ?> value="Islam">Islam</option>
                                <option <?php echo ($student->religion == "Jainism") ? "selected" : "" ?> value="Jainism">Jainism</option>
                                <option <?php echo ($student->religion == "Sikhism") ? "selected" : "" ?> value="Sikhism">Sikhism</option>
                                <option <?php echo ($student->religion == "Zoroastrianism") ? "selected" : "" ?> value="Zoroastrianism">Zoroastrianism</option>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-cover">
                            <label> Category <span class="required">*</span></label>
                            <select class="form-control" name="category" required onchange="catCheck(this.value);">
                                <option value="">select one</option>
                                <option <?php echo ($student->category == "UR") ? "selected" : "" ?> value="UR">General</option>
                                <option <?php echo ($student->category == "OBC") ? "selected" : "" ?> value="OBC">OBC </option>
                                <option <?php echo ($student->category == "SC") ? "selected" : "" ?> value="SC">SC </option>
                                <option <?php echo ($student->category == "ST") ? "selected" : "" ?> value="ST">ST </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-cover">
                            <label> Mobile No <span class="required">*</span> </label>
                            <input class="form-control" type="text" name="mobile" maxlength="10" onkeypress="return isNumberKey(event)" required value="<?php echo $student->mobile; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-cover">
                            <label> Email ID <span class="required">*</span></label>
                            <input class="form-control" type="email" name="email" required value="<?php echo $student->email; ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-cover">
                            <label> Education Qualification <span class="required">*</span></label>
                            <input class="form-control" type="text" name="qualification" required value="<?php echo $student->qualification; ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-cover">
                            <label> Id Prove <span class="required">*</span></label>
                            <select class="form-control" name="id_prove" required onchange="idProveSelector(this.value)">
                                <option value="">select one</option>
                                <option <?php echo ($student->id_prove == "aadhaar") ? "selected" : "" ?> value="aadhaar">Aadhaar </option>
                                <option <?php echo ($student->id_prove == "dl") ? "selected" : "" ?> value="dl"> Driving Licence </option>
                                <option <?php echo ($student->id_prove == "voter") ? "selected" : "" ?> value="voter"> Voter ID </option>
                            </select>
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
                                    <?php
                                    $qual_details = json_decode($student->qual_details, TRUE); ?>
                                    <tr>
                                        <td><input type="text" name="qual_details[exam_name][1]" class="form-control" value="<?php echo $qual_details['exam_name'][1]; ?>"></td>
                                        <td><input type="text" name="qual_details[passing_year][1]" class="form-control" value="<?php echo $qual_details['passing_year'][1]; ?>"></td>
                                        <td><input type="text" name="qual_details[board][1]" class="form-control" value="<?php echo $qual_details['board'][1]; ?>"></td>
                                        <td><input type="text" name="qual_details[total_marks][1]" class="form-control" value="<?php echo $qual_details['total_marks'][1]; ?>"></td>
                                        <td><input type="text" name="qual_details[marks_obtained][1]" class="form-control" value="<?php echo $qual_details['marks_obtained'][1]; ?>"></td>
                                        <td><input type="text" name="qual_details[subjects][1]" class="form-control" value="<?php echo $qual_details['subjects'][1]; ?>"></td>
                                        <td><input type="text" name="qual_details[percentage][1]" class="form-control" value="<?php echo $qual_details['percentage'][1]; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="qual_details[exam_name][2]" class="form-control" value="<?php echo $qual_details['exam_name'][2]; ?>"></td>
                                        <td><input type="text" name="qual_details[passing_year][2]" class="form-control" value="<?php echo $qual_details['passing_year'][2]; ?>"></td>
                                        <td><input type="text" name="qual_details[board][2]" class="form-control" value="<?php echo $qual_details['board'][2]; ?>"></td>
                                        <td><input type="text" name="qual_details[total_marks][2]" class="form-control" value="<?php echo $qual_details['total_marks'][2]; ?>"></td>
                                        <td><input type="text" name="qual_details[marks_obtained][2]" class="form-control" value="<?php echo $qual_details['marks_obtained'][2]; ?>"></td>
                                        <td><input type="text" name="qual_details[subjects][2]" class="form-control" value="<?php echo $qual_details['subjects'][2]; ?>"></td>
                                        <td><input type="text" name="qual_details[percentage][2]" class="form-control" value="<?php echo $qual_details['percentage'][2]; ?>"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="text-center Mtop30px">
                        <h4 class="form-heading "> Address Information </h4>
                    </div>

                    <div class="">
                        <div class="col-md-6">
                            <h4 class="address-heading">Present Address </h4>

                            <div class="form-cover">
                                <label>Address Line 1 <span class="required">*</span></label>
                                <input class="form-control" type="text" name="present_add_add_1" required value="<?php echo $student->present_add_add_1; ?>">
                            </div>

                            <div class="form-cover">
                                <label>Address Line 2</label>
                                <input class="form-control" type="text" name="present_add_add_2" value="<?php echo $student->present_add_add_2; ?>">
                            </div>


                            <div class="form-cover">
                                <label> District <span class="required">*</span></label>
                                <input class="form-control" type="text" name="present_add_district" required value="<?php echo $student->present_add_district; ?>">
                            </div>

                            <div class="form-cover">
                                <label> State <span class="required">*</span></label>
                                <select name="present_add_state" id="state" class="form-control" required>
                                    <option value="">Select One</option>
                                    <option <?php echo ($student->present_add_state == "Andhra Pradesh") ? "selected" : "" ?> value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option <?php echo ($student->present_add_state == "Andaman and Nicobar Islands") ? "selected" : "" ?> value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                    <option <?php echo ($student->present_add_state == "Arunachal Pradesh") ? "selected" : "" ?> value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option <?php echo ($student->present_add_state == "Assam") ? "selected" : "" ?> value="Assam">Assam</option>
                                    <option <?php echo ($student->present_add_state == "Bihar") ? "selected" : "" ?> value="Bihar">Bihar</option>
                                    <option <?php echo ($student->present_add_state == "Chandigarh") ? "selected" : "" ?> value="Chandigarh">Chandigarh</option>
                                    <option <?php echo ($student->present_add_state == "Chhattisgarh") ? "selected" : "" ?> value="Chhattisgarh">Chhattisgarh</option>
                                    <option <?php echo ($student->present_add_state == "Dadar and Nagar Haveli") ? "selected" : "" ?> value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                    <option <?php echo ($student->present_add_state == "Daman and Diu") ? "selected" : "" ?> value="Daman and Diu">Daman and Diu</option>
                                    <option <?php echo ($student->present_add_state == "Delhi") ? "selected" : "" ?> value="Delhi">Delhi</option>
                                    <option <?php echo ($student->present_add_state == "Lakshadweep") ? "selected" : "" ?> value="Lakshadweep">Lakshadweep</option>
                                    <option <?php echo ($student->present_add_state == "Puducherry") ? "selected" : "" ?> value="Puducherry">Puducherry</option>
                                    <option <?php echo ($student->present_add_state == "Goa") ? "selected" : "" ?> value="Goa">Goa</option>
                                    <option <?php echo ($student->present_add_state == "Gujarat") ? "selected" : "" ?> value="Gujarat">Gujarat</option>
                                    <option <?php echo ($student->present_add_state == "Haryana") ? "selected" : "" ?> value="Haryana">Haryana</option>
                                    <option <?php echo ($student->present_add_state == "Himachal Pradesh") ? "selected" : "" ?> value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option <?php echo ($student->present_add_state == "Jammu and Kashmir") ? "selected" : "" ?> value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option <?php echo ($student->present_add_state == "Jharkhand") ? "selected" : "" ?> value="Jharkhand">Jharkhand</option>
                                    <option <?php echo ($student->present_add_state == "Karnataka") ? "selected" : "" ?> value="Karnataka">Karnataka</option>
                                    <option <?php echo ($student->present_add_state == "Kerala") ? "selected" : "" ?> value="Kerala">Kerala</option>
                                    <option <?php echo ($student->present_add_state == "Madhya Pradesh") ? "selected" : "" ?> value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option <?php echo ($student->present_add_state == "Maharashtra") ? "selected" : "" ?> value="Maharashtra">Maharashtra</option>
                                    <option <?php echo ($student->present_add_state == "Manipur") ? "selected" : "" ?> value="Manipur">Manipur</option>
                                    <option <?php echo ($student->present_add_state == "Meghalaya") ? "selected" : "" ?> value="Meghalaya">Meghalaya</option>
                                    <option <?php echo ($student->present_add_state == "Mizoram") ? "selected" : "" ?> value="Mizoram">Mizoram</option>
                                    <option <?php echo ($student->present_add_state == "Nagaland") ? "selected" : "" ?> value="Nagaland">Nagaland</option>
                                    <option <?php echo ($student->present_add_state == "Odisha") ? "selected" : "" ?> value="Odisha">Odisha</option>
                                    <option <?php echo ($student->present_add_state == "Punjab") ? "selected" : "" ?> value="Punjab">Punjab</option>
                                    <option <?php echo ($student->present_add_state == "Rajasthan") ? "selected" : "" ?> value="Rajasthan">Rajasthan</option>
                                    <option <?php echo ($student->present_add_state == "Sikkim") ? "selected" : "" ?> value="Sikkim">Sikkim</option>
                                    <option <?php echo ($student->present_add_state == "Tamil Nadu") ? "selected" : "" ?> value="Tamil Nadu">Tamil Nadu</option>
                                    <option <?php echo ($student->present_add_state == "Telangana") ? "selected" : "" ?> value="Telangana">Telangana</option>
                                    <option <?php echo ($student->present_add_state == "Tripura") ? "selected" : "" ?> value="Tripura">Tripura</option>
                                    <option <?php echo ($student->present_add_state == "Uttar Pradesh") ? "selected" : "" ?> value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option <?php echo ($student->present_add_state == "Uttarakhand") ? "selected" : "" ?> value="Uttarakhand">Uttarakhand</option>
                                    <option <?php echo ($student->present_add_state == "West Bengal") ? "selected" : "" ?> value="West Bengal">West Bengal</option>
                                </select>

                            </div>
                            <div class="form-cover">
                                <label> Pin <span class="required">*</span></label>
                                <input class="form-control" type="text" name="present_add_pin" maxlength="6" onkeypress="return isNumberKey(event)" required value="<?php echo $student->present_add_pin; ?>">
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
                                <input class="form-control" type="text" name="premanemt_add_1" value="<?php echo $student->premanemt_add_1; ?>" required>
                            </div>

                            <div class="form-cover">
                                <label>Address Line 2</label>
                                <input class="form-control" type="text" name="premanemt_add_2" value="<?php echo $student->premanemt_add_2; ?>">
                            </div>
                            <div class="form-cover">
                                <label> District <span class="required">*</span></label>
                                <input class="form-control" type="text" name="premanemt_add_district" value="<?php echo $student->premanemt_add_district; ?>" required>
                            </div>
                            <div class="form-cover">
                                <label> State <span class="required">*</span></label>
                                <select name="premanemt_add_state" class="form-control" required>
                                    <option value="">Select One</option>
                                    <option <?php echo ($student->premanemt_add_state == "Andhra Pradesh") ? "selected" : "" ?> value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option <?php echo ($student->premanemt_add_state == "Andaman and Nicobar Islands") ? "selected" : "" ?> value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                    <option <?php echo ($student->premanemt_add_state == "Arunachal Pradesh") ? "selected" : "" ?> value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option <?php echo ($student->premanemt_add_state == "Assam") ? "selected" : "" ?> value="Assam">Assam</option>
                                    <option <?php echo ($student->premanemt_add_state == "Bihar") ? "selected" : "" ?> value="Bihar">Bihar</option>
                                    <option <?php echo ($student->premanemt_add_state == "Chandigarh") ? "selected" : "" ?> value="Chandigarh">Chandigarh</option>
                                    <option <?php echo ($student->premanemt_add_state == "Chhattisgarh") ? "selected" : "" ?> value="Chhattisgarh">Chhattisgarh</option>
                                    <option <?php echo ($student->premanemt_add_state == "Dadar and Nagar Haveli") ? "selected" : "" ?> value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                    <option <?php echo ($student->premanemt_add_state == "Daman and Diu") ? "selected" : "" ?> value="Daman and Diu">Daman and Diu</option>
                                    <option <?php echo ($student->premanemt_add_state == "Delhi") ? "selected" : "" ?> value="Delhi">Delhi</option>
                                    <option <?php echo ($student->premanemt_add_state == "Lakshadweep") ? "selected" : "" ?> value="Lakshadweep">Lakshadweep</option>
                                    <option <?php echo ($student->premanemt_add_state == "Puducherry") ? "selected" : "" ?> value="Puducherry">Puducherry</option>
                                    <option <?php echo ($student->premanemt_add_state == "Goa") ? "selected" : "" ?> value="Goa">Goa</option>
                                    <option <?php echo ($student->premanemt_add_state == "Gujarat") ? "selected" : "" ?> value="Gujarat">Gujarat</option>
                                    <option <?php echo ($student->premanemt_add_state == "Haryana") ? "selected" : "" ?> value="Haryana">Haryana</option>
                                    <option <?php echo ($student->premanemt_add_state == "Himachal Pradesh") ? "selected" : "" ?> value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option <?php echo ($student->premanemt_add_state == "Jammu and Kashmir") ? "selected" : "" ?> value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option <?php echo ($student->premanemt_add_state == "Jharkhand") ? "selected" : "" ?> value="Jharkhand">Jharkhand</option>
                                    <option <?php echo ($student->premanemt_add_state == "Karnataka") ? "selected" : "" ?> value="Karnataka">Karnataka</option>
                                    <option <?php echo ($student->premanemt_add_state == "Kerala") ? "selected" : "" ?> value="Kerala">Kerala</option>
                                    <option <?php echo ($student->premanemt_add_state == "Madhya Pradesh") ? "selected" : "" ?> value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option <?php echo ($student->premanemt_add_state == "Maharashtra") ? "selected" : "" ?> value="Maharashtra">Maharashtra</option>
                                    <option <?php echo ($student->premanemt_add_state == "Manipur") ? "selected" : "" ?> value="Manipur">Manipur</option>
                                    <option <?php echo ($student->premanemt_add_state == "Meghalaya") ? "selected" : "" ?> value="Meghalaya">Meghalaya</option>
                                    <option <?php echo ($student->premanemt_add_state == "Mizoram") ? "selected" : "" ?> value="Mizoram">Mizoram</option>
                                    <option <?php echo ($student->premanemt_add_state == "Nagaland") ? "selected" : "" ?> value="Nagaland">Nagaland</option>
                                    <option <?php echo ($student->premanemt_add_state == "Odisha") ? "selected" : "" ?> value="Odisha">Odisha</option>
                                    <option <?php echo ($student->premanemt_add_state == "Punjab") ? "selected" : "" ?> value="Punjab">Punjab</option>
                                    <option <?php echo ($student->premanemt_add_state == "Rajasthan") ? "selected" : "" ?> value="Rajasthan">Rajasthan</option>
                                    <option <?php echo ($student->premanemt_add_state == "Sikkim") ? "selected" : "" ?> value="Sikkim">Sikkim</option>
                                    <option <?php echo ($student->premanemt_add_state == "Tamil Nadu") ? "selected" : "" ?> value="Tamil Nadu">Tamil Nadu</option>
                                    <option <?php echo ($student->premanemt_add_state == "Telangana") ? "selected" : "" ?> value="Telangana">Telangana</option>
                                    <option <?php echo ($student->premanemt_add_state == "Tripura") ? "selected" : "" ?> value="Tripura">Tripura</option>
                                    <option <?php echo ($student->premanemt_add_state == "Uttar Pradesh") ? "selected" : "" ?> value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option <?php echo ($student->premanemt_add_state == "Uttarakhand") ? "selected" : "" ?> value="Uttarakhand">Uttarakhand</option>
                                    <option <?php echo ($student->premanemt_add_state == "West Bengal") ? "selected" : "" ?> value="West Bengal">West Bengal</option>
                                </select>
                            </div>
                            <div class="form-cover">
                                <label> Pin <span class="required">*</span></label>
                                <input class="form-control" type="text" name="premanemt_add_pin" maxlength="6" onkeypress="return isNumberKey(event)" value="<?php echo $student->premanemt_add_pin; ?>" required>
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
                                <?php if (!empty($student->mp_marksheet_img)) : ?>
                                    <div class="mp_marksheet_img_div">
                                        <a class="cross-image" href="javascript:void(0)" onclick="disputeImage(<?php echo $student->id ?>,' mp_marksheet_img')"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </div>
                                    <img id="imgPreview" class="mp_marksheet_img" src="<?php echo base_url() . 'uploads/student_images/' . $student->mp_marksheet_img ?>" alt="pic" />
                                <?php else : ?>
                                    <img id="imgPreview" class="mp_marksheet_img" src="<?php echo base_url() ?>assets/backend/images/noimg.png" alt="pic" />
                                <?php endif; ?>
                            </div>
                            <input class="custom-file-inputm" type="file" id="mp_marksheet_img" onchange="uploadMpimg()" />
                            <p class="error-file mp_marksheet_img-error"></p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="upload-photo">
                            <p class="photoupload-text text-center"> Highschool Marksheet</p>
                            <div class="image-holder">
                                <?php if (!empty($student->hs_marksheet_img)) : ?>
                                    <div class="hs_marksheet_img_div">
                                        <a class="cross-image" href="javascript:void(0)" onclick="disputeImage(<?php echo $student->id ?>,' hs_marksheet_img')"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </div>
                                    <img id="imgPreview" class="hs_marksheet_img" src="<?php echo base_url() . 'uploads/student_images/' . $student->hs_marksheet_img ?>" alt="pic" />
                                <?php else : ?>
                                    <img id="imgPreview" class="hs_marksheet_img" src="<?php echo base_url() ?>assets/backend/images/noimg.png" alt="pic" />
                                <?php endif; ?>
                            </div>
                            <input class="custom-file-inputm" type="file" id="hs_marksheet_img" onchange="uploadHsImge()" />
                            <p class="error-file hs_marksheet_img-error"></p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="upload-photo">
                            <p class="photoupload-text text-center"> <span class="idprove">ID prove</span> Upload </p>
                            <div class="image-holder">
                                <div class="id_prof_img_div">

                                </div>
                                <img id="imgPreview" class="id_prof_img" src="<?php echo base_url() ?>assets/backend/images/noimg.png" alt="pic" />
                            </div>
                            <input class="custom-file-inputm" type="file" id="id_prof_img" onchange="uploadIdProveImage()" />
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
                            <input class="custom-file-inputm" type="file" id="avatar" onchange="uploadstudentImage()" />
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
                            <input class="custom-file-inputm" type="file" id="sign_img" onchange="uploadstSignImage()" />
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
                </div>

            </div>
            <input type="hidden" value="<?php echo $student->id ?>" name="id">
            <input type="hidden" value="<?php echo $student->avatar ?>" name="old_avatar">
            <input type="hidden" value="<?php echo $student->sign_img ?>" name="old_sign_img">
            <input type="hidden" value="<?php echo $student->cast_certi_img ?>" name="old_cast_certi_img">
            <input type="hidden" value="<?php echo $student->id_prof_img ?>" name="old_id_prof_img">
            <input type="hidden" value="<?php echo $student->graduate_marksheet_img ?>" name="old_graduate_marksheet_img">
            <input type="hidden" value="<?php echo $student->hs_marksheet_img ?>" name="old_hs_marksheet_img">
            <input type="hidden" value="<?php echo $student->mp_marksheet_img ?>" name="old_mp_marksheet_img">
            <input type="hidden" value="" name="avatar">
            <input type="hidden" value="" name="sign_img">
            <input type="hidden" value="" name="cast_certi_img">
            <input type="hidden" value="" name="id_prof_img">
            <input type="hidden" value="" name="graduate_marksheet_img">
            <input type="hidden" value="" name="hs_marksheet_img">
            <input type="hidden" value="" name="mp_marksheet_img">
            <div class="right-fifth sub-btn2">
                <button type="submit" class="">Edit Student Application</button>
            </div>
            <?php form_close(); ?>


        </div>
    </div>