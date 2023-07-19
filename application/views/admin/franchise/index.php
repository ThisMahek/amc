<div class="wrapper2">
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>
    <div class="mblog-post">
        <div class="text-right madd-btn">
            <a href="<?php echo admin_url() ?>add-franchise" class="add-pag">Add Franchise</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Center Details</th>
                        <th>Franchise Address</th>
                        <th>President Details</th>
                        <th>Created On</th>
                        <th>Pay Status</th>
                        <th>Status</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($franchises as $item) : ?>

                        <tr>
                            <td><?php echo html_escape($item->id); ?></td>
                            <td class="td-product">
                                <strong>Center Name :</strong><?php echo html_escape($item->franchise_name); ?><br>
                                <strong>Email  :</strong><?php echo html_escape($item->franchise_email); ?><br>
                                <strong>Mobile  :</strong><?php echo html_escape($item->franchise_contact); ?>
                            </td>
                            
                            <td><?php echo html_escape($item->franchise_address_1.' '.$item->franchise_address_2).' '.$item->franchise_district.' <br>'.$item->franchise_state.(!empty($item->franchise_pin)?'('.$item->franchise_pin.')':''); ?>
                                
                            </td>
                            <td>
                                <strong>President Name :</strong><?php echo html_escape($item->president_name); ?><br>
                                <strong>Aadhar No  :</strong><?php echo html_escape($item->president_aadhar_number); ?><br>
                                <strong>DOB  :</strong><?php echo (!empty($item->president_dob))?date('d M, Y h:i A',strtotime($item->president_dob)):''; ?>
                            </td>
                            <td><?php echo date('d M, Y h:i A',strtotime($item->created_on)); ?></td>
                            
                            <td><?php if ($item->pay_status == 1) : ?>
                                    <strong class="text-success">
                                        Yes
                                    </strong>
                                <?php else : ?>
                                    <strong class="text-danger">
                                        NO
                                    </strong>
                                <?php endif; ?>
                            </td>
                            <td>
                                 <?php echo  config_item('franchise_status')[$item->status] ?>
                            </td>
                            <td class="drp-btn">
                                <div class="dropdown drp">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select a Option
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="<?php echo admin_url(); ?>view-franchise-application/<?php echo html_escape($item->id); ?>">View Application <i class="fa fa-eye" aria-hidden="true"></i></a>
                                        
                                        <a class="dropdown-item" href="<?php echo admin_url(); ?>edit-franchise-application/<?php echo html_escape($item->id); ?>">Edit Application<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                        <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('adminfranchise_controller/delete_franchise','<?php echo $item->id; ?>','Are you want to delete this item?');">Delete <i class="fa fa-trash" aria-hidden="true"></i></a>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Center Details</th>
                        <th>Franchise Address</th>
                        <th>President Details</th>
                        <th>Created On</th>
                        <th>Pay Status</th>
                        <th>Status</th>
                        <th>Option</th>
                    </tr>
                </tfoot>
            </table>
            <div class="text-right madd-btn">
                <a href="<?php echo admin_url() ?>add-franchise"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Student </a>
            </div>
        </div>
    </div>