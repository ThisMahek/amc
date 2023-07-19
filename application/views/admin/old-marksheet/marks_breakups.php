<div class="col-sm-12">
     <?php $this->load->view('admin/includes/_messages'); ?>
</div>
<?php if(!empty($marksBreakups)): ?>
<div class="wrapper2" style="min-height: auto !important;">
     <div class="mblog" >
        <div class="row">
            <div class="col-md-12">
            <h4>Marks Details</h4>
            <table class="table table-bordered" id="update_dynamic_field">
            <tr>
                    <td>Sub Code</td>
                    <td>Sub Name</td>
                    <td>Year</td>
                    <td>Internal</td>
                    <td>Therory</td>
                    <td>Practical</td>
                    <td>Obtain </td>
                    <td>FM</td>
                    <td>#</td>
                </tr>
            <?php echo form_open('admin/update-old-marks-details'); ?>
            <?php foreach ($marksBreakups as $key => $value) { ?>
              <tr >
                <td><input type="text" name="sub_code[]" placeholder="Sub Code" class="form-control "  value = "<?php echo $value->sub_code;?>"/></td>
                <td><input type="text" name="sub_name[]" placeholder="Subj Name" class="form-control" required="required"  value = "<?php echo $value->sub_name;?>"/></td>
               <td>
                <select class="form-control sel"  name="year[]" required="required">
                    <option value="">Year</option>
                    <option value="6" <?php echo($value->year=="6")?"selected ":""?> >6 Month</option>
                    <option value="1" <?php echo($value->year=="1")?"selected ":""?> >1</option>
                    <option value="2" <?php echo($value->year=="2")?"selected ":""?> >2</option>
                    <option value="3" <?php echo($value->year=="3")?"selected ":""?> >3</option>
                </select>
            </td>
               <td><input type="text" name="internal[]" placeholder="Internal Marks" class="form-control" required="required"  value = "<?php echo $value->internal;?>" /></td>
               <td><input type="text" name="external[]" placeholder="External Marks" class="form-control" required="required"  value = "<?php echo $value->external;?>" /></td>
               <td><input type="text" name="practical[]" placeholder="Practical Marks" class="form-control" required="required"  value = "<?php echo $value->practical;?>" /></td>
               <td><input type="text" name="obtain[]" placeholder="Obtain Marks" class="form-control" required="required"  value = "<?php echo $value->obtain;?>" /></td>
               <td><input type="text" name="max_marks[]" placeholder="Full Marks" class="form-control" required="required" value = "<?php echo $value->max_marks;?>" /></td>
                <td>
               <button type="button" name="remove" class="btn btn-danger update_btn_remove" title="Delete" onclick="deletePostMarksData(<?php echo $value->id; ?>);">-</button>
             <input type="hidden" name="id[]" value="<?php echo $value->id; ?>">
              </td>
              </tr>
            <?php } ?>
            </table>
            </div>
           <input type="submit" name="submit" id="submit" class="btn btn-success" value="Update Marks Data" />
          <?php echo form_close(); ?>
            </div>
        </div>
     </div>
</div>
<?php endif; ?>
<div class="wrapper2" style="min-height: auto !important;">
     <div class="mblog" >
        <div class="row">
            <div class="col-md-12">
            <h4>Add New Marks</h4>
            <?php echo form_open('admin/add-old-marks-details'); ?>
            <div class="table-responsive">
            <table class="table table-bordered" id="dynamic_field">
                <tr>
                    <td>Sub Code</td>
                    <td>Sub Name</td>
                    <td>Year</td>
                    <td>Internal</td>
                    <td>Therory</td>
                    <td>Practical</td>
                    <td>Obtain </td>
                    <td>FM</td>
                    <td>#</td>
                </tr>
             <tr>
               <td><input type="text" name="sub_code[]" placeholder="Sub Code" class="form-control" required="required"  /></td>
               <td><input type="text" name="sub_name[]" placeholder="Subj Name" class="form-control" required="required"  /></td>
               <td>
               <select class="form-control sel"  name="year[]" required="required">
                    <option value="">Year</option>
                    <option value="6">6 Month</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </td>
               <td><input type="text" name="internal[]" placeholder="Internal Marks" class="form-control" required="required"  /></td>
               <td><input type="text" name="external[]" placeholder="External Marks" class="form-control" required="required"  /></td>
               <td><input type="text" name="practical[]" placeholder="Practical Marks" class="form-control" required="required"  /></td>
               <td><input type="text" name="obtain[]" placeholder="Obtain Marks" class="form-control" required="required"  /></td>
               <td><input type="text" name="max_marks[]" placeholder="Full Marks" class="form-control" required="required"  /></td>
              
                <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>
             </tr>
            </table>
            <input type="hidden" name="old_marsheet_id" value="<?php echo $marksheet_id?>">
            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Add Marks" />
          </div>
        <?php echo form_close(); ?>      
            </div>
        </div>
     </div>
</div>