<div class="form-area mt-5 mb-5">
      <div class="container">
      <?php if (empty($marksheet)) : ?>
            <h1 class="text-center">Result yet to be declired / no result found</h1>
        <?php else : ?>
          
           <div class="table-ssgp">
               <table class="table-responsive">
                <tr>
                    <td> Name - <?php echo $student->stu_name ?></td>
                    <td rowspan="7">
                        <div class="image-passport">
                            <img src="<?php echo base_url().'uploads/student_images/'.$student->avatar ?>" alt=""/>
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
                    <td> Course-  <?php echo getCourseNameByID($student->course_id) ?> </td>
                </tr>
                <tr>
                    <td> Session- <?php echo getSessionByID($student->session_id) ?> </td>
                </tr>
               </table>
           </div>
           
           <?php foreach ($marksheet as $marksheetTotal) : 
                if($marksheetTotal->year==1){
                    $marks1 = json_decode($marksheetTotal->marks_details,true);
                }elseif ($marksheetTotal->year==2) {
                    $marks2 = json_decode($marksheetTotal->marks_details,true);
                }elseif ($marksheetTotal->year==3) {
                    $marks3 = json_decode($marksheetTotal->marks_details,true);
                }
            
            ?>


           <?php if(!empty($marks1)):?> 
           
           <div class="table-ssgp design-table mt-5 mb-5">
               <table class="table-responsive">
                    <tr>
                        <th colspan="8" class="text-center" style="background: #ea6645; color: #FFF;"> First Year </th>
                    </tr>
                   
                    <tr>
                        <td rowspan="2"><b> Subject  Code </b></td>
                        <td rowspan="2"> <b> Subject Name </b></td>
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
                       
                        foreach ($marks1 as $mark1):
                            $row_obtain = 0;
                            $row_FM = 0;
                        $subjectDetails = getSubjectDataById($mark1['subject_id']);
                            $row_obtain = $mark1['assessment_obtain']+$mark1['theory_obtain']+$mark1['practical_obtain'];
                            $row_FM = $mark1['theory_full']+$mark1['practical_full']+$mark1['assessment_full'];
                        ?>
                    <tr>
                        <td> <?php echo $subjectDetails->sub_code ?> </td>
                        <td> <?php echo $subjectDetails->sub_name ?> </td>
                        <td><?php echo $mark1['assessment_obtain'] ?></td>
                        <td><?php echo $mark1['theory_obtain'] ?></td>
                        <td><?php echo $mark1['practical_obtain'] ?></td>
                        <td> <?php echo $row_obtain ?> </td>
                        <td> <?php echo $row_FM ?></td>
                    </tr>
                    <?php 
                        $tot_obtain+=$row_obtain;
                        $tot_fm+=$row_FM;
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
                       
                        foreach ($marks2 as $mark2):
                            $row_obtain = 0;
                            $row_FM = 0;
                        $subjectDetails = getSubjectDataById($mark2['subject_id']);
                            $row_obtain = $mark2['assessment_obtain']+$mark2['theory_obtain']+$mark2['practical_obtain'];
                            $row_FM = $mark2['theory_full']+$mark2['practical_full']+$mark2['assessment_full'];
                        ?>
                    <tr>
                        <td> <?php echo $subjectDetails->sub_code ?> </td>
                        <td> <?php echo $subjectDetails->sub_name ?> </td>
                        <td><?php echo $mark2['assessment_obtain'] ?></td>
                        <td><?php echo $mark2['theory_obtain'] ?></td>
                        <td><?php echo $mark2['practical_obtain'] ?></td>
                        <td> <?php echo $row_obtain ?> </td>
                        <td> <?php echo $row_FM ?></td>
                    </tr>
                    <?php 
                        $tot_obtain+=$row_obtain;
                        $tot_fm+=$row_FM;
                    endforeach;?>
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
                       
                        foreach ($marks3 as $mark3):
                            $row_obtain = 0;
                            $row_FM = 0;
                        $subjectDetails = getSubjectDataById($mark3['subject_id']);
                            $row_obtain = $mark3['assessment_obtain']+$mark3['theory_obtain']+$mark3['practical_obtain'];
                            $row_FM = $mark3['theory_full']+$mark3['practical_full']+$mark3['assessment_full'];
                        ?>
                    <tr>
                        <td> <?php echo $subjectDetails->sub_code ?> </td>
                        <td> <?php echo $subjectDetails->sub_name ?> </td>
                        <td><?php echo $mark3['assessment_obtain'] ?></td>
                        <td><?php echo $mark3['theory_obtain'] ?></td>
                        <td><?php echo $mark3['practical_obtain'] ?></td>
                        <td> <?php echo $row_obtain ?> </td>
                        <td> <?php echo $row_FM ?></td>
                    </tr>
                    <?php 
                        $tot_obtain+=$row_obtain;
                        $tot_fm+=$row_FM;
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
        <?php endforeach;?>


          

     <?php endif;?>               
      </div>
  </div>
  </div>