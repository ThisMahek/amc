<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
$ci = &get_instance();
$ci->load->library('razorpay');
$total_amount = $amount * 100;
$array = array(
    'receipt' => 123,
    'amount' => $total_amount,
    'currency' => "INR",
);
$razorpay_order_id = $ci->razorpay->create_order($array);
if (!empty($razorpay_order_id)) :
?>
    <div class="payment-page mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="payment-area text-center">
                        <?php $this->load->view('partials/_messages'); ?>
                        <h2 class="heading"> Thank You </h2>
                        <p>Dear, <?php echo $student->stu_name ?> please make payment to compleate your application.</p>

                        <div class="payment-table table-responsive text-start d-flex justify-content-center mt-3 mb-3">
                            <table>
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
                                        <td> Cource Fee </td>
                                        <td> <i class="fa fa-inr"></i> <?php echo $course->admission_fees ?></td>
                                    </tr>
                                    <tr>
                                        <td> User Id </td>
                                        <td><?php echo $student->user_name ?></td>
                                    </tr>
                                    <tr>
                                        <td> Password </td>
                                        <td>You set in form</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                        <strong>Don't refresh page once payment porcess start.</strong>

                        <div class="two-btn d-flex justify-content-center mt-4 align-items-center">
                            <button type="button" name="" id="rzp-button1" class="send-message border-0 orangebtn"> Pay Now </button>
                            <a href="<?php echo base_url() . 'cancel-payment/' . $student->user_name ?>" class="send-message border-0 m-0"> Cancel Payment </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "<?php echo  $ci->general_settings->razorpay_key_id; ?>",
            "amount": "<?php echo $total_amount; ?>",
            "currency": "INR",
            "name": "<?php echo "SSIGPS"; ?>",
            "description": "<?php echo $description; ?>",
            "image": "<?php echo base_url() . 'uploads/logo/' . $this->general_settings->logo ?>",
            "prefill.email": "<?php echo $user_email; ?>",
            "prefill.contact": "<?php echo $user_mobile; ?>",
            "order_id": "<?php echo $razorpay_order_id; ?>",
            "handler": function(response) {
                var data_array = {
                    'payment_id': response.razorpay_payment_id,
                    'razorpay_order_id': response.razorpay_order_id,
                    'razorpay_signature': response.razorpay_signature,
                    'currency': 'INR',
                    'payment_amount': '<?php echo $total_amount; ?>',
                    'payment_status': '',
                    'mds_payment_type': '<?php echo $payment_type; ?>',
                    'user_name': '<?php echo $student->user_name; ?>',
                };
                data_array[csfr_token_name] = $.cookie(csfr_cookie_name);
                $.ajax({
                    type: "POST",
                    url: base_url + "admission-payment",
                    data: data_array,
                    success: function(response) {
                        console.log(response);
                        var obj = JSON.parse(response);
                        if (obj.result == 1) {
                            window.location.href = obj.redirect;
                        } else {
                            window.location.href = obj.redirect;
                        }
                    }
                });
            },
            "theme": {
                "color": "#022547"
            }
        };
        var rzp1 = new Razorpay(options);
        document.getElementById('rzp-button1').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
        }
    </script>
<?php endif; ?>