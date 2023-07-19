  <div class="form-area mt-5 mb-5">
      <div class="container">
          <!--  <div class="row">
              <div class="col-12">
                  <?php $this->load->view('partials/_messages'); ?>
              </div>
          </div> -->
          

          <?php echo form_open('search-result'); ?>
          <div class="row justify-content-center flex-column align-items-center">
              <div class="col-md-6">
                  <?php $this->load->view('partials/_messages'); ?>
              </div>
                  <div class="col-md-6">
                      <div class="form-cover">
                          <label> Enter your Registration No. </label>
                          <input class="form-control" type="text" name="user_name" required>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-cover">
                          <label> Date Of Bitrh </label>
                          <input class="form-control" type="date" name="dob" required>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-cover">

                          <?php generate_recaptcha(); ?>


                      </div>
                  </div>
                  <div class="col-md-12 text-center">
                      <button type="submit" name="et_builder_submit_button" class="send-message border-0 "> Search </button>
                  </div>


              </div>
              <?php echo form_close(); ?>

          </div>



      </div>
  </div>
  </div>