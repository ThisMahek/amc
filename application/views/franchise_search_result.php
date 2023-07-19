<div class="form-area mt-5 mb-5">
      <div class="container">
      <?php if (empty($franchise)) : ?>
            <h1 class="text-center">No Franchise Found</h1>
        <?php else : ?>
          
           <div class="table-ssgp">
               <table class="table-responsive">
                 <tr>
                     <th>Franchise Center Code</th>
                     <th>Center Details</th>
                     <th>Franchise Address </th>
                     <th>Coordinator Details </th>
                     
                 </tr>
                 <?php foreach ($franchise as $key => $aFracnhise): ?>
                 <tr>
                     <td><?php echo $aFracnhise->enroll_no; ?></td>
                     <td>
                        <strong>Center Name :</strong><?php echo $aFracnhise->franchise_name ?><br>
                        <strong>Email  :</strong><?php echo $aFracnhise->franchise_email ?><br>
                        <strong>Mobile  :</strong><?php echo $aFracnhise->franchise_contact ?>          
                      </td>
                     <td><?php echo $aFracnhise->franchise_address_1.' ' .$aFracnhise->franchise_address_2.','.$aFracnhise->franchise_district; ?>  <br>
                        <?php echo $aFracnhise->franchise_state.'('.$aFracnhise->franchise_pin.')'; ?>                         
                            </td>
                     <td>
                          <strong>Coordinator Name :</strong><?php echo $aFracnhise->president_name; ?><br>                                 
                    </td>
                 </tr>    
                 <?php endforeach ?>
               </table>
           </div>
     <?php endif;?>               
      </div>
  </div>
  </div>
  <style type="text/css">
      table, tr,td {border: 1px solid black;}
  </style>