<div class="form-area mt-5 mb-5">
      <div class="container">
          <!--  <div class="row">
              <div class="col-12">
                  <?php $this->load->view('partials/_messages'); ?>
              </div>
          </div> -->
 
           <div class="table-ssgp">
               <table class="table-responsive">
                <tr>
                    <td> Name - <?php echo $student->stu_name ?></td>
                    <td rowspan="7">
                        <div class="image-passport">
                            <img src="<?php echo base_url().'uploads/old_student_images/'.$student->avatar ?>" alt=""/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td> Father’s Name- <?php echo $student->f_name ?></td>
                </tr>
                <tr>
                    <td> DOB- <?php echo $student->dob ?></td>
                </tr>
                <tr>
                    <td> Roll No-  <?php echo $student->roll_no ?></td>
                </tr>
                <tr>
                    <td> Reg. No-  <?php echo $student->reg_no ?></td>
                </tr>
                <tr>
                    <td> Course-  <?php echo $student->course_name ?> </td>
                </tr>
                <tr>
                    <td> Session- <?php echo $student->session_name ?> </td>
                </tr>
               </table>
           </div>
           <?php if(!empty($marks6)):?> 
           <div class="table-ssgp design-table mt-5 mb-5">
               <table class="table-responsive">
                    <tr>
                        <th colspan="8" class="text-center" style="background: #ea6645; color: #FFF;"> 6 Month </th>
                    </tr>
                   
                    <tr>
                        <td rowspan="2"><b> Subject  Code </b></td>
                        <td rowspan="2"> <b> Subject Name </b></td>
                        <!-- <td><b> Type </b></td> -->
                        <td rowspan="2"><b> Internal </b></td>
                        <td rowspan="2"><b> Theory </b></td>
                        <td rowspan="2"><b> Practical </b></td>
                        <td colspan="2"><b> Total </b></td>
                    </tr>

                    <tr>
                        
                        <td><b> Obtained </b></td>
                        <td><b> Maximum </b></td>
                    </tr>
                    
                    <?php 
                        $tot_obtain = 0;
                        $tot_fm = 0;
                        foreach ($marks6 as $mark6):?>
                    <tr>
                        <td> <?php echo $mark6->sub_code ?> </td>
                        <td> <?php echo $mark6->sub_name ?> </td>
                        <!-- <td> <?php //echo $mark6->sub_type ?> </td> -->
                        <td><?php echo $mark6->internal ?></td>
                        <td><?php echo $mark6->external ?></td>
                        <td><?php echo $mark6->practical ?></td>
                        <td> <?php echo $mark6->obtain ?> </td>
                        <td> <?php echo $mark6->max_marks ?></td>
                    </tr>
                    <?php 
                        $tot_obtain+=$mark6->obtain;
                        $tot_fm+=$mark6->max_marks;
                    endforeach;?>
               
                    <tr>
                        <td colspan="5"> <b> Grand Total </b> </td>
                        <td> <b> <?php echo $tot_obtain;?> </b> </td>
                        <td> <b> <?php echo $tot_fm;?> </b> </td>
                    </tr>
                    <tr>
                        <td colspan="8" style="text-align: right !important; background: #022547; color: #FFF;"> Percentage = <?php echo getPercentage($tot_obtain,$tot_fm)?>% </td>
                    </tr>
               </table>
           </div>
           <?php endif;?>

           <?php if(!empty($marks1)):?> 
           <div class="table-ssgp design-table mt-5 mb-5">
               <table class="table-responsive">
                    <tr>
                        <th colspan="8" class="text-center" style="background: #ea6645; color: #FFF;"> First Year </th>
                    </tr>
                   
                    <tr>
                        <td rowspan="2"><b> Subject  Code </b></td>
                        <td rowspan="2"> <b> Subject Name </b></td>
                        <!-- <td><b> Type </b></td> -->
                        <td rowspan="2"><b> Internal </b></td>
                        <td rowspan="2"><b> Theory </b></td>
                        <td rowspan="2"><b> Practical </b></td>
                        <td colspan="2"><b> Total </b></td>
                    </tr>

                    <tr>
                        
                        <td><b> Obtained </b></td>
                        <td><b> Maximum </b></td>
                    </tr>
                    
                    <?php 
                        $tot_obtain = 0;
                        $tot_fm = 0;
                        foreach ($marks1 as $mark1):?>
                    <tr>
                        <td> <?php echo $mark1->sub_code ?> </td>
                        <td> <?php echo $mark1->sub_name ?> </td>
                        <!-- <td> <?php //echo $mark1->sub_type ?> </td> -->
                        <td><?php echo $mark1->internal ?></td>
                        <td><?php echo $mark1->external ?></td>
                        <td><?php echo $mark1->practical ?></td>
                        <td> <?php echo $mark1->obtain ?> </td>
                        <td> <?php echo $mark1->max_marks ?></td>
                    </tr>
                    <?php 
                        $tot_obtain+=$mark1->obtain;
                        $tot_fm+=$mark1->max_marks;
                    endforeach;?>
               
                    <tr>
                        <td colspan="5"> <b> Grand Total </b> </td>
                        <td> <b> <?php echo $tot_obtain;?> </b> </td>
                        <td> <b> <?php echo $tot_fm;?> </b> </td>
                    </tr>
                    <tr>
                        <td colspan="8" style="text-align: right !important; background: #022547; color: #FFF;"> Percentage = <?php echo getPercentage($tot_obtain,$tot_fm)?>% </td>
                    </tr>
               </table>
           </div>
           <?php endif;?>
           <?php if(!empty($marks2)):?> 

           <div class="table-ssgp design-table mt-5 mb-5">
               <table class="table-responsive">
                    <tr>
                        <th colspan="8" style="background: #ea6645; color: #FFF;"> Second Year </th>
                    </tr>   
                    <tr>
                        <td rowspan="2"><b> Subject  Code </b></td>
                        <td rowspan="2"> <b> Subject Name </b></td>
                        <!-- <td><b> Type </b></td> -->
                        <td rowspan="2"><b> Internal </b></td>
                        <td rowspan="2"><b> Theory </b></td>
                        <td rowspan="2"><b> Practical </b></td>
                        <td colspan="2"><b> Total </b></td>
                    </tr>

                    <tr>
                        
                        <td><b> Obtained </b></td>
                        <td><b> Maximum </b></td>
                    </tr>
                  
                    <?php 
                        $tot_obtain = 0;
                        $tot_fm = 0;
                        foreach ($marks2 as $mark2):?>
                    <tr>
                        <td> <?php echo $mark2->sub_code ?> </td>
                        <td> <?php echo $mark2->sub_name ?> </td>
                        <!-- <td> <?php //echo $mark2->sub_type ?> </td> -->
                        <td><?php echo $mark2->internal ?></td>
                        <td><?php echo $mark2->external ?></td>
                        <td><?php echo $mark2->practical ?></td>
                        <td> <?php echo $mark2->obtain ?> </td>
                        <td> <?php echo $mark2->max_marks ?></td>
                    </tr>
                    <?php 
                        $tot_obtain+=$mark2->obtain;
                        $tot_fm+=$mark2->max_marks;
                    endforeach;?>
               
                    <tr>
                        <td colspan="5"> <b> Grand Total </b> </td>
                        <td> <b> <?php echo $tot_obtain;?> </b> </td>
                        <td> <b> <?php echo $tot_fm;?> </b> </td>
                    </tr>
                    <tr>
                        <td colspan="8" style="text-align: right !important; background: #022547; color: #FFF;"> Percentage = <?php echo getPercentage($tot_obtain,$tot_fm)?>% </td>
                    </tr>
               </table>
           </div>
           <?php endif;?>
           <?php if(!empty($marks3)):?> 
            <div class="table-ssgp design-table mt-5 mb-5">
               <table class="table-responsive">
                    <tr>
                        <th colspan="8" style="background: #ea6645; color: #FFF;"> Third Year </th>
                    </tr>   
                    <tr>
                        <td rowspan="2"><b> Subject  Code </b></td>
                        <td rowspan="2"> <b> Subject Name </b></td>
                        <!-- <td><b> Type </b></td> -->
                        <td rowspan="2"><b> Internal </b></td>
                        <td rowspan="2"><b> Theory </b></td>
                        <td rowspan="2"><b> Practical </b></td>
                        <td colspan="2"><b> Total </b></td>
                    </tr>

                    <tr>
                        
                        <td><b> Obtained </b></td>
                        <td><b> Maximum </b></td>
                    </tr>
                    
                    <?php 
                        $tot_obtain = 0;
                        $tot_fm = 0;
                        foreach ($marks3 as $mark3):?>
                    <tr>
                        <td> <?php echo $mark3->sub_code ?> </td>
                        <td> <?php echo $mark3->sub_name ?> </td>
                        <!-- <td> <?php //echo $mark3->sub_type ?> </td> -->
                        <td><?php echo $mark3->internal ?></td>
                        <td><?php echo $mark3->external ?></td>
                        <td><?php echo $mark3->practical ?></td>
                        <td> <?php echo $mark3->obtain ?> </td>
                        <td> <?php echo $mark3->max_marks ?></td>
                    </tr>
                    <?php 
                        $tot_obtain+=$mark3->obtain;
                        $tot_fm+=$mark3->max_marks;
                    endforeach;?>
               
                    <tr>
                        <td colspan="5"> <b> Grand Total </b> </td>
                        <td> <b> <?php echo $tot_obtain;?> </b> </td>
                        <td> <b> <?php echo $tot_fm;?> </b> </td>
                    </tr>
                    <tr>
                        <td colspan="8" style="text-align: right !important; background: #022547; color: #FFF;"> Percentage = <?php echo getPercentage($tot_obtain,$tot_fm)?>% </td>
                    </tr>
               </table>
           </div>
           <?php endif;?>



          


      </div>
  </div>
  </div>