<div class="wrapper2">

    <div class="mblog-post">

        <div class="table-responsive">
            <div>
            <a type="button" title="Download Application Form" class="btn btn-default pull-right" href="<?php echo base_url().'ajax_controller/downloadApplicationForm/'.$franchise->id ?>"  target="_blank" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;Download</a>
            </div>
            <br>
            <table class="table table-striped table-bordered">
                <tr>
                    <td>Proposed Center Name </td>
                    <td><strong class='text-primary'><?php echo $franchise->franchise_name ?></strong></td>
                    <td>CENTER  CODE</td>
                    <td><strong class='text-primary'><?php echo $franchise->enroll_no ?></strong></td>
                <tr>


                
                <tr>
                    <td>Application Status</td>
                    <td><?php echo "<strong class='text-info'>".$this->config->item('franchise_status')[$franchise->status]."</strong>";
                        ?>
                    </td>
                    <td>Payment Status</td>
                    <td><?php if ($franchise->pay_status == "0") {
                            echo "<strong class='text-info'>Pending</strong>";
                        } else  if ($franchise->pay_status == "1") {
                            echo "<strong class='text-success'>Paid</strong>";
                        } else  if ($franchise->pay_status == "2") {
                            echo "<strong class='text-danger'>Canceled</strong>";
                        }
                        ?>
                    </td>
                 </tr>   
                    <?php if ($franchise->status == "2") { ?>
                <tr>
                    <td>Rejection Cause</td>
                    <td colspan="3"><?php echo $franchise->rejection_cause ?></td>
                </tr>
            <?php } ?>

            <tr>
                <td>Franchise Name</td>
                <td><?php echo $franchise->franchise_name ?></td>
                <td>Franchise Address</td>
                <td>
                    Address Line 1 :<?php echo ($franchise->franchise_address_1); ?> <br>
                    Address Line 2: <?php echo ($franchise->franchise_address_2) ?><br>
                    District : <?php echo ($franchise->franchise_district); ?><br>
                    State : <?php echo ($franchise->franchise_state); ?><br>
                    Pin : <?php echo ($franchise->franchise_pin); ?>
            </tr>
            <tr>
                <td>President/Manager Name </td>
                <td><?php echo $franchise->president_name  ?></td>
                <td>President Aadhar No.</td>
                <td><?php echo $franchise->president_aadhar_number ?></td>
            </tr>
            <tr>
                <td>Pan Number</td>
                <td><?php echo $franchise->franchise_pan_number  ?></td>
                <td>President DOB</td>
                <td><?php echo !empty($franchise->president_dob)?date('d, M Y',strtotime($franchise->president_dob)):''  ?></td>
            </tr>
            
            <tr>
                <td>Franchise Email</td>
                <td><?php echo $franchise->franchise_email  ?></td>
                <td>Franchise Mobile</td>
                <td><?php echo $franchise->franchise_contact  ?></td>
                
            </tr>
           
          
            <?php if ($franchise->pay_status == "1") : ?>
                <tr>
                    <td>Fee paid On</td>
                    <td>
                        <?php echo (!empty($trans->trn_date))?date('d-M-Y H:i:s', strtotime($trans->trn_date)):'' ?> via
                        <?php echo !empty($trans->mode)?$trans->mode:''; ?>
                    </td>
                    <td>Transaction ID</td>
                    <td><?php echo (!empty($trans->transaction_id))?$trans->transaction_id:''; ?></td>
                </tr>
            <?php endif; ?>
            <?php if ($franchise->status == "1") : ?>
                <!-- <tr>
                    <td>Approved On</td>
                    <td>
                        <?php echo date('d-M-Y', strtotime($trans->trn_date)) ?>
                    </td>
                    <td>Session</td>
                    <td><?php echo getSessionByID($franchise->session_id) ?></td>
                </tr> -->
            <?php elseif ($franchise->status == "2") : ?>
                <!-- <tr>
                    <td>Reject On</td>
                    <td>
                        <?php echo date('d-M-Y', strtotime($franchise->rejected_on)) ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr> -->
            <?php elseif ($franchise->status == "3") : ?>
                <!-- <tr>
                    <td>Dispute On</td>
                    <td>
                        <?php echo date('d-M-Y', strtotime($franchise->dispute_on)) ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr> -->
            <?php endif; ?>
            </table>

            <div class="table-responsive my-5">
                <table class="table table-bordered">

                    <tbody>
                        <tr>
                            <td>
                                <div class="upload-img-box">
                                    <?php if (!empty($franchise->registration_certificate_img)) : ?>
                                        <img src="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->registration_certificate_img ?>" class="img-fluid avatar" alt="">
                                    <?php else : ?>
                                        <img src="<?php echo base_url(); ?>assets/backend/images/noimg.png" class="img-fluid avatar" alt="">
                                    <?php endif; ?>
                                    <p class="text-center mt-2">Society/Trust/Section 8 company Registration certificate/ Trust Deed)</p>
                                    <div class="text-center avatar_div">
                                        <?php if (!empty($franchise->registration_certificate_img)) : ?>
                                            <ul class="d-inline-flex p-2">
                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->registration_certificate_img ?>" title="Download" class="btn btn-success btn-sm mx-1" download><i class="fa fa-download" aria-hidden="true"></i></a></li>

                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->registration_certificate_img ?>" title="View" class="btn btn-warning btn-sm mx-1"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                <?php if ($franchise->status == 0) : ?>
                                                    <li><button title="Delete" class="btn btn-danger btn-sm mx-1" onclick="disputeImage(<?php echo $franchise->id ?>,'avatar')"><i class="fa fa-trash"></i></button></li>
                                                <?php endif; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="upload-img-box">
                                    <?php if (!empty($franchise->franchise_pan_card_img)) : ?>
                                        <img src="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->franchise_pan_card_img ?>" class="img-fluid sign_img" alt="">
                                    <?php else : ?>
                                        <img src="<?php echo base_url(); ?>assets/backend/images/noimg.png" class="img-fluid sign_img" alt="">
                                    <?php endif; ?>
                                    <p class="text-center mt-2">Franchise Pan Card</p>
                                    <div class="text-center sign_img_div">
                                        <?php if (!empty($franchise->franchise_pan_card_img)) : ?>
                                            <ul class="d-inline-flex p-2">
                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->franchise_pan_card_img ?>" title="Download" class="btn btn-success btn-sm mx-1" download><i class="fa fa-download" aria-hidden="true"></i></a></li>

                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->franchise_pan_card_img ?>" title="View" class="btn btn-warning btn-sm mx-1"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                <?php if ($franchise->status == 0) : ?>
                                                    <li><button title="Delete" class="btn btn-danger btn-sm mx-1" onclick="disputeImage(<?php echo $franchise->id ?>,'franchise_pan_card_img')"><i class="fa fa-trash"></i></button></li>
                                                <?php endif; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="upload-img-box">
                                    <?php if (!empty($franchise->unique_id_img)) : ?>
                                        <img src="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->unique_id_img ?>" class="img-fluid mp_marksheet_img" alt="">
                                    <?php else : ?>
                                        <img src="<?php echo base_url(); ?>assets/backend/images/noimg.png" class="img-fluid unique_id_img" alt="">
                                    <?php endif; ?>
                                    <p class="text-center mt-2">Unique ID of NGO Darpan Registration</p>
                                    <div class="text-center mp_marksheet_img_div">
                                        <?php if (!empty($franchise->unique_id_img)) : ?>
                                            <ul class="d-inline-flex p-2">
                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->unique_id_img ?>" title="Download" class="btn btn-success btn-sm mx-1" download><i class="fa fa-download" aria-hidden="true"></i></a></li>

                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->unique_id_img ?>" title="View" class="btn btn-warning btn-sm mx-1"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                <?php if ($franchise->status == 0) : ?>
                                                    <li><button title="Delete" class="btn btn-danger btn-sm mx-1" onclick="disputeImage(<?php echo $franchise->id ?>,'unique_id_img')"><i class="fa fa-trash"></i></button></li>
                                                <?php endif; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="upload-img-box">
                                    <?php if (!empty($franchise->hs_marksheet_img)) : ?>
                                        <img src="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->msme_certificate_img ?>" class="img-fluid  hs_marksheet_img" alt="">
                                    <?php else : ?>
                                        <img src="<?php echo base_url(); ?>assets/backend/images/noimg.png" class="img-fluid msme_certificate_img" alt="">
                                    <?php endif; ?>
                                    <p class="text-center mt-2">MSME Registration Certificate</p>
                                    <div class="text-center msme_certificate_img_div">
                                        <?php if (!empty($franchise->msme_certificate_img)) : ?>
                                            <ul class="d-inline-flex p-2">
                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->msme_certificate_img ?>" title="Download" class="btn btn-success btn-sm mx-1" download><i class="fa fa-download" aria-hidden="true"></i></a></li>

                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->msme_certificate_img ?>" title="View" class="btn btn-warning btn-sm mx-1"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                <?php if ($franchise->status == 0) : ?>
                                                    <li><button title="Delete" class="btn btn-danger btn-sm mx-1" onclick="disputeImage(<?php echo $franchise->id ?>,'msme_certificate_img')"><i class="fa fa-trash"></i></button></li>
                                                <?php endif; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="upload-img-box">
                                    <?php if (!empty($franchise->president_aadhar_img)) : ?>
                                        <img src="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->president_aadhar_img ?>" class="img-fluid" alt="">
                                    <?php else : ?>
                                        <img src="<?php echo base_url(); ?>assets/backend/images/noimg.png" class="img-fluid president_aadhar_img" alt="">
                                    <?php endif; ?>
                                    <p class="text-center mt-2">Aadhar of President/Manager</p>
                                    <div class="text-center president_aadhar_img_div">
                                        <?php if (!empty($franchise->president_aadhar_img)) : ?>
                                            <ul class="d-inline-flex p-2">
                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->president_aadhar_img ?>" title="Download" class="btn btn-success btn-sm mx-1" download><i class="fa fa-download" aria-hidden="true"></i></a></li>

                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->president_aadhar_img ?>" title="View" class="btn btn-warning btn-sm mx-1"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                <?php if ($franchise->status == 0) : ?>
                                                    <li><button title="Delete" class="btn btn-danger btn-sm mx-1" onclick="disputeImage(<?php echo $franchise->id ?>,'president_aadhar_img')"><i class="fa fa-trash"></i></button></li>
                                                <?php endif; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="upload-img-box">
                                    <?php if (!empty($franchise->president_pan_img)) : ?>
                                        <img src="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->president_pan_img ?>" class="img-fluid president_pan_img" alt="">
                                    <?php else : ?>
                                        <img src="<?php echo base_url(); ?>assets/backend/images/noimg.png" class="img-fluid president_pan_img" alt="">
                                    <?php endif; ?>
                                    <p class="text-center mt-2">PAN of President/Manager</p>
                                    <div class="text-center president_pan_img_div">
                                        <?php if (!empty($franchise->president_pan_img)) : ?>
                                            <ul class="d-inline-flex p-2">
                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->president_pan_img ?>" title="Download" class="btn btn-success btn-sm mx-1" download><i class="fa fa-download" aria-hidden="true"></i></a></li>

                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->president_pan_img ?>" title="View" class="btn btn-warning btn-sm mx-1"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                <?php if ($franchise->status == 0) : ?>
                                                    <li><button title="Delete" class="btn btn-danger btn-sm mx-1" onclick="disputeImage(<?php echo $franchise->id ?>,'president_pan_img')"><i class="fa fa-trash"></i></button></li>
                                                <?php endif; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="upload-img-box">
                                    <?php if (!empty($franchise->president_photograph_img)) : ?>
                                        <img src="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->president_photograph_img ?>" class="img-fluid president_photograph_img" alt="">
                                    <?php else : ?>
                                        <img src="<?php echo base_url(); ?>assets/backend/images/noimg.png" class="img-fluid president_photograph_img" alt="">
                                    <?php endif; ?>
                                    <p class="text-center mt-2">Latest Photograph of President/Manager</p>
                                    <div class="text-center president_photograph_img_div">
                                        <?php if (!empty($franchise->president_photograph_img)) : ?>
                                            <ul class="d-inline-flex p-2">
                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->president_photograph_img ?>" title="Download" class="btn btn-success btn-sm mx-1" download><i class="fa fa-download" aria-hidden="true"></i></a></li>

                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->president_photograph_img ?>" title="View" class="btn btn-warning btn-sm mx-1"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                <?php if ($franchise->status == 0) : ?>
                                                    <li><button title="Delete" class="btn btn-danger btn-sm mx-1" onclick="disputeImage(<?php echo $franchise->id ?>,'president_photograph_img')"><i class="fa fa-trash"></i></button></li>
                                                <?php endif; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="upload-img-box">
                                    <?php if (!empty($franchise->president_signature_img)) : ?>
                                        <img src="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->president_signature_img ?>" class="img-fluid president_signature_img" alt="">
                                    <?php else : ?>
                                        <img src="<?php echo base_url(); ?>assets/backend/images/noimg.png" class="img-fluid president_signature_img" alt="">
                                    <?php endif; ?>
                                    <p class="text-center mt-2">Signature of President/Manager</p>
                                    <div class="text-center president_signature_img_div">
                                        <?php if (!empty($franchise->president_signature_img)) : ?>
                                            <ul class="d-inline-flex p-2">
                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->president_signature_img ?>" title="Download" class="btn btn-success btn-sm mx-1" download><i class="fa fa-download" aria-hidden="true"></i></a></li>

                                                <li><a target="_blank" href="<?php echo base_url() . 'uploads/franchise_images/' . $franchise->president_signature_img ?>" title="View" class="btn btn-warning btn-sm mx-1"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                <?php if ($franchise->status == 0) : ?>
                                                    <li><button title="Delete" class="btn btn-danger btn-sm mx-1" onclick="disputeImage(<?php echo $franchise->id ?>,'president_signature_img')"><i class="fa fa-trash"></i></button></li>
                                                <?php endif; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>


                </table>
            </div>
        </div>

        <div class="text-center">

            <input type="hidden" name="franchise_id" value="<?php echo $franchise->id ?>">
            <?php if (is_admin()): ?>
                
            <?php if ($franchise->status == 1) : ?>
                <a href="<?php echo admin_url() . 'franchise-approve-application/' . $franchise->id ?>" class="btn btn-success btn-lg app">Approve</a>
                <button class="btn btn-danger btn-lg dispute" onclick="disputFranchiseApps()">Mark Disput</button>
            <?php endif ?>
            <?php if ($franchise->status == 2) : ?>
                <a href="<?php echo admin_url() . 'franchise-approve-application/' . $franchise->id ?>" class="btn btn-success btn-lg app">Mark Payment Done</a>
            <?php endif ?>    
            <?php if ($franchise->status == 4) : ?>
                <a href="<?php echo admin_url() . 'franchise-approve-application/' . $franchise->id ?>" class="btn btn-success btn-lg app">Approve</a>

                <a class="btn btn-danger btn-lg" href="<?php echo admin_url() . 'reject-franchise-application/' . $franchise->id ?>">Reject Application</a>
            <?php endif; ?>
            <a href="<?php echo admin_url(). 'franchises' ?>" class="btn btn-primary btn-lg">Back</a>
            <a href="<?php echo admin_url() . 'edit-franchise-application/' . $franchise->id ?>" class="btn btn-warning btn-lg">Edit Form</a>
            <?php endif ?>
            <?php if (is_franchise()): ?>
              <a href="<?php echo franchise_url() . 'update_view' ?>" class="btn btn-warning btn-lg">Edit Form</a>  
            <?php endif ?>    
        </div>
    </div>