<div class="our-courses mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2 class="heading"> Course Details </h2>
            </div>
                <?php echo $course->content;?>
            <hr>
            <?php 
            if(!empty($syllebus)):
            $counter = count($syllebus);  
            for ($i=1; $i <=$counter ; $i++):
              $thortytotal =0;  
              $practotal =0;  
              $asstotal =0;  
            ?>
            
            <div class="col-12 text-center mb-4 mt-5">
                <h2 class="heading"> SYLLABUS -   <?php echo $course->title_name;?> (YEAR <?php echo $i?>  ) </h2>
            </div>
            <div class="col-12  ">
                <div class="table-design">
                    <table>
                        <thead>
                            <tr>
                                <th>SUBJECT CODE</th>
                                <th>SUBJECT</th>
                                <th>THEORY </th>
                                <th>PRACTICAL</th>
                                <th>INTERNAL ASSESSMENT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($syllebus[$i] as $years => $syllebu):?>
                            <tr>
                                <td><?php echo $syllebu->sub_code ?></td>
                                <td><?php echo $syllebu->sub_name ?></td>
                                <td> <?php echo $syllebu->theory;?> </td>
                                <td> <?php echo $syllebu->practical;?> </td>
                                <td><?php echo $syllebu->internal_assessment;?></td>
                            </tr>
                            <?php
                               $thortytotal+= $syllebu->theory;
                                $practotal+= $syllebu->practical;
                                $asstotal+= $syllebu->internal_assessment;
                        endforeach;?>
                        
                        </tbody>

                        <tfoot>
                            <tr>
                                <td> </td>
                                <td> <strong>TOTAL</strong> </td>
                                <td> <?php echo $thortytotal?> </td>
                                <td> <?php echo $practotal?> </td>
                                <td> <?php echo $asstotal?> </td>
                            </tr>
                        </tfoot>
                    </table>


                </div>
            </div>
                                <?php endfor;?>
                                <?php endif;?>
          
            
        </div>
    </div>
</div>