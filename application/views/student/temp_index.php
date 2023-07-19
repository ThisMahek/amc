<div class="post-b">
    <div class="row">
        <div class="post-d">
            <h1 class="text-center">Hi, <?php echo $student_data->stu_name; ?></h1>
            <?php if ($student_data->pay_status == 0) : ?>
                <div class="text-center">
                    <h4 class="text-danger">Admission / Application fees not paid please click the bellow link to compleate the application.</h4>
                    <a href=<?php echo base_url() . 'admission-payment/' . $student_data->user_name ?> target="_blank" class="btn btn-success">Make Payment</a>
                </div>


            <?php elseif ($student_data->status == 2) : ?>
                <div class="text-center">
                    <h4 class="text-danger">Your application rejcected cause given bellow</h4>
                    <p>
                        <?php echo ($student_data->rejection_cause); ?>
                    </p>
                    <p>Reject On : <?php echo formatted_date($student_data->rejected_on); ?></p>
                </div>
            <?php elseif ($student_data->status == 3) : ?>
                <div class="">
                    <h4 class="text-danger">Your application mark as dispute please re upload the folowing document and send it to us via register post to our address.</h4>
                    <p> To avoid rejection please send the hardcopy documents (which you have uploded in the time of application ) send it to us via register post to our address.</p>

                </div>
                <div class="text-center">
                    <a href=<?php echo base_url() .'student-portal/reupload-documents' ?>  class="btn btn-success">Re Upload Documents  </a>
                </div>

            <?php elseif ($student_data->status == 0) : ?>
                <div class="">
                    <h4 class="text-info">Your application is under review.</h4>
                    <p> To avoid rejection please send the hardcopy documents (which you have uploded in the time of application ) send it to us via register post to our address.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>