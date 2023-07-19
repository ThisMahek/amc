<div class="post-b">
    <div class="row">
        <div class="post-d">
            <?php $this->load->view('student/includes/_messages'); ?>
            <?php echo form_open('student-portal/save-upload'); ?>
            <div class="form-area">
                <div class="row">
                    <div class="text-center Mtop30px B-gap30">
                        <h4 class="form-heading ">Upload Section:</h4>
                    </div>
                    <?php if (empty($student_data->mp_marksheet_img)) : ?>
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
                    <?php endif; ?>
                    <?php if (empty($student_data->hs_marksheet_img)) : ?>
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
                    <?php endif; ?>
                    <?php if (empty($student_data->id_prof_img)) : ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="upload-photo">
                                <p class="photoupload-text text-center"> <span class="idprove">
                                <?php if($student_data->id_prove== "aadhaar"):?>    
                                Aadhaar
                                <?php elseif($student_data->id_prove== "dl"):?>  
                                    Driving Lisence
                                <?php elseif($student_data->id_prove== "voter"):?>  
                                    Voter ID
                                <?php endif;?>  
                            </span> Upload </p>
                                <div class="image-holder">
                                    <div class="id_prof_img_div">

                                    </div>
                                    <img id="imgPreview" class="id_prof_img" src="<?php echo base_url() ?>assets/backend/images/noimg.png" alt="pic" />
                                </div>
                                <input class="custom-file-inputm" type="file" id="id_prof_img" required="true" onchange="uploadIdProveImage()" />
                                <p class="error-file id_prof_img-error"></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (empty($student_data->avatar)) : ?>
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
                    <?php endif; ?>
                    <?php if (empty($student_data->sign_img)) : ?>
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
                    <?php endif; ?>
                    <?php if (empty($student_data->cast_certi_img) && $student_data->category != "UR") : ?>
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
                    <?php endif; ?>

                </div>

            </div>
            <?php if (empty($student_data->avatar)) : ?>
                <input type="hidden" value="" name="avatar">
            <?php endif; ?>
            <?php if (empty($student_data->sign_img)) : ?>
                <input type="hidden" value="" name="sign_img">
            <?php endif; ?>
            <?php if (empty($student_data->cast_certi_img) && $student_data->category != "UR") : ?>
                <input type="hidden" value="" name="cast_certi_img">
            <?php endif; ?>
            <?php if (empty($student_data->id_prof_img)) : ?>
                <input type="hidden" value="" name="id_prof_img">
            <?php endif; ?>
            <?php if (empty($student_data->graduate_marksheet_img)) : ?>
                <input type="hidden" value="" name="graduate_marksheet_img">
            <?php endif; ?>
            <?php if (empty($student_data->hs_marksheet_img)) : ?>
                <input type="hidden" value="" name="hs_marksheet_img">
            <?php endif; ?>
            <?php if (empty($student_data->mp_marksheet_img)) : ?>
                <input type="hidden" value="" name="mp_marksheet_img">
            <?php endif; ?>

            <div class="right-fifth sub-btn2">
                <button type="submit" class="">Upload Documents</button>
            </div>
            <?php form_close(); ?>


        </div>
    </div>