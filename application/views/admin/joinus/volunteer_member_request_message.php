   <div class="wrapper2">
       <?php $this->load->view('admin/includes/_messages'); ?>

       <div class="mblog-post">
           <div class="table-responsive">
               <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid" aria-describedby="example1_info">
                   <thead>
                       <tr>
                           <th>ID</th>
                           <th>Name</th>
                           <th>Phone</th>
                           <th>Email</th>
                           <th>Address</th>
                           <th>Message</th>
                           <th>Date</th>
                           <th>Option</th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php foreach ($messages as $item) : ?>
                           <tr>
                               <td><?php echo html_escape($item->id); ?></td>
                               <td class="td-product">
                                   <?php echo html_escape($item->name); ?>
                               </td>
                               <td><?php echo html_escape($item->phone); ?></td>
                               <td><?php echo html_escape($item->email); ?></td>
                               <td><?php echo html_escape($item->address); ?></td>
                               <td><?php echo html_escape($item->message); ?></td>
                               <td><?php echo formatted_date($item->created_at); ?></td>
                               <td class="drp-btn">
                                   <div class="dropdown drp">
                                       <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           Select a Option
                                       </button>
                                       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                           <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('admin/delete_volunteer_member_messages','<?php echo $item->id; ?>','Are you want to delete this item?');">Delete <i class="fa fa-trash" aria-hidden="true"></i></a>
                                       </div>
                                   </div>
                               </td>
                           </tr>
                       <?php endforeach; ?>

                   </tbody>
                   <tfoot>
                       <tr>
                           <th>ID</th>
                           <th>Name</th>
                           <th>Phone</th>
                           <th>Email</th>
                           <th>Address</th>
                           <th>Message</th>
                           <th>Date</th>
                           <th>Option</th>
                       </tr>
                   </tfoot>
               </table>
           </div>
       </div>
   </div>