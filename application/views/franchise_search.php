  <div class="form-area mt-5 mb-5">
      <div class="container">
          <!--  <div class="row">
              <div class="col-12">
                  <?php $this->load->view('partials/_messages'); ?>
              </div>
          </div> -->
          

          <?php echo form_open('search-franchise-result'); ?>
          <div class="row justify-content-center flex-column align-items-center">
              <div class="col-md-6">
                  <?php $this->load->view('partials/_messages'); ?>
              </div>
                  <div class="col-md-6">
                      <div class="form-cover">
                          <label> Search Franchise Through Name/Email/Center Code. </label>
                          <input class="form-control" type="text" name="open_search" required placeholder="Enter Franchise/Name/Email/Center Code">
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