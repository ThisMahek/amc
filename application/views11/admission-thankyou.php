<div class="mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8    ">
                <div class="thankyoupage text-center">
                    <h2> Thank You </h2>
                    <p>Your registration is compleated. And its pending for the appoval of site admin. You can check your application / registration status by <a href="<?php echo base_url('login') ?>" class="text-danger">Login</a> And follow the nessery instruction. </p>
                    <div class="check-right">
                        <i class="fa fa-check"></i>
                    </div>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Cource Applied for</td>
                                <td><?php echo $course->title ?></td>
                            </tr>
                            <tr>
                                <td>Student Name</td>
                                <td><?php echo $student->stu_name ?></td>
                            </tr>
                            <tr>
                                <td> Amount Received </td>
                                <td> <i class="fa fa-inr"></i> <?php echo $course->admission_fees ?></td>
                            </tr>
                            <tr>
                                <td> Transaction Id </td>
                                <td><?php echo $trans->transaction_id ?></td>
                            </tr>
                            <tr>
                                <td> Registration No / User Id </td>
                                <td><?php echo $student->user_name ?></td>
                            </tr>
                            <tr>
                                <td> Password </td>
                                <td>You set in form</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4">
                        <a href="<?php echo base_url() ?>" class="send-message border-0 m-0"> Back To Home Page </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>