<div class="post-b">
    <div class="post-h">
        <h5>Update Assignment</h5>
        <a class="btn btn-primary" href="<?php echo admin_url() . 'assignments' ?>">All Assignment</a>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="post-d">
                <h5>Assignment Details</h5>
                <?php $this->load->view('admin/includes/_messages'); ?>

                <?php echo form_open('admin/update-assignment'); ?>
                <div class="dinamicfiles__">

                </div>
                <div class="form-group">
                    <label>Course <span class="required">*</span></label>
                    <select name="course_id" class="form-control max-600" onchange="get_session_by_course(this.value);" required>
                        <option value="">Select One</option>
                        <?php foreach ($courses as $course) : ?>
                            <option value="<?php echo $course->id; ?>" <?php echo ($course->id == $post->course_id) ? "selected" : "" ?>><?php echo $course->title; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Session/Batch <span class="required">*</span></label>
                    <select class="form-control" id="categories" name="session_id" required>
                        <option value="">Select One</option>
                        <?php foreach ($batchlist as $batch) : ?>
                            <option value="<?php echo $batch->id; ?>" <?php echo ($batch->id == $post->session_id) ? "selected" : "" ?>><?php echo $batch->session_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Assignment Title <span class="required">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Title" required value="<?php echo $post->title; ?>">
                </div>
                <div class="form-group">
                    <label>Slug <span style="font-size: 13px">(If you leave it blank, it will be generated automatically.)</span></label>
                    <input type="text" name="slug" class="form-control" placeholder="Slug " value="<?php echo $post->slug; ?>">
                </div>
                <div class="form-group">
                    <label> Meta Keywords</label>
                    <input type="text" class="form-control" name="keywords" placeholder="Keywords (Meta Tag)" value="<?php echo $post->keywords; ?>">
                </div>
                <div class="form-group">
                    <label>Meta Description</label>
                    <textarea class="form-control" name="meta_description" rows="3" placeholder="Summary & Description (Meta Tag)"><?php echo $post->meta_description ?></textarea>
                </div>
                <div class="form-group">
                    <label>Last Date Of Submission <span class="required">*</span></label>
                    <input type="date" name="closing_date" class="form-control" placeholder="" required value="<?php echo $post->closing_date; ?>">
                </div>
                <div class="form-group">
                    <label>Optional Url</label>
                    <input type="text" name="optional_url" class="form-control" placeholder="Optional Url" value="<?php echo $post->optional_url; ?>">
                </div>
                <div class="form-group">
                    <label>Short Description (Content will be 450 character)<span class="required">*</span></label><br>
                    <textarea name="short_description" class="ckeditor"><?php echo $post->short_description ?></textarea>
                </div>
                <div class="form-group">
                    <label>Full Content <span class="required">*</span></label><br>
                    <textarea name="content" class="ckeditor"><?php echo $post->content ?></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="post-d2">
                <div class="right-fast">
                    <h5>Image</h5>
                    <p>Main post image</p>
                    <div class="insertimg">
                        <i class="fa fa-picture-o" aria-hidden="true"></i><br>
                        <div class="rig-btn">
                            <span class="sel-btn">

                                <input type="file" id="featured_image" onchange="featuredImageUpload()">
                                Select Image
                            </span>
                        </div>
                    </div>
                    <div class="featuredImg">
                        <?php if (!empty($post->featured_image)) : ?>
                            <img src="<?php echo base_url() . 'uploads/assignment_image/' . $post->featured_image ?>"><a href="javascript:void(0)" onclick="remove_assignment_featured_image(<?php echo $post->id ?>)"><i class="fa fa-times" aria-hidden="true"></i></a>
                        <?php endif; ?>
                    </div>

                </div>
                <div class="right-second">
                    <h5>Additional Images</h5>
                    <p>More main images (slider will be active)</p>
                    <span class="sel-btn ">
                        <input type="file" id="extra_image" onchange="additionalImageUpload()">
                        Select Image
                    </span>
                    <div class="sml-imag extra_img_div">
                        <?php if (!empty($post->extra_image)) : ?>
                            <img src="<?php echo base_url() . 'uploads/assignment_image/' . $post->extra_image ?>"> <a href='javascript:void(0)' onclick='removeAssignmentExtraImage(<?php echo $post->id ?>)'><i class='fa fa-times' aria-hidden='true'></i></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="right-third">
                    <h5>Files</h5>
                    <p>Downloadable additional files (.pdf, .doc, .ppt etc..)</p>

                    <span class="sel-btn">
                        <input type="file" id="upload_files" onchange="uploadFiles()">
                        Select File

                    </span>
                    <ul class="fileList">
                        <?php if (!empty($assignment_files)) :
                            $i = 1;
                            foreach ($assignment_files as $assignment_file) : ?>
                                <li class="fileList<?php echo $i ?>"><i class="fa fa-file" aria-hidden="true"></i> <?php echo $assignment_file->file_name; ?><a href="javascript:void(0)"><i class="fa fa-times" aria-hidden="true" onclick="remove_upload_files('<?php echo $assignment_file->id; ?>','<?php echo $i; ?>')"></i></a>
                                    <input type="hidden" name="file_id[]" value="<?php echo $assignment_file->id; ?>">
                                    <input type="hidden" name="existingFile[]" value="<?php echo $assignment_file->file_name; ?>">
                                </li>
                        <?php $i++;
                            endforeach;
                        endif; ?>
                    </ul>
                    <div class="fuploadErr">
                    </div>
                    <div class="dinamicfiles">

                    </div>
                </div>
                <input type="hidden" name="extra_image" value="<?php echo $post->extra_image ?>">
                <input type="hidden" name="old_extra_image" value="<?php echo $post->extra_image ?>">
                <input type="hidden" name="featured_image" value="<?php echo $post->featured_image ?>">>
                <input type="hidden" name="old_featured_image" value="<?php echo $post->featured_image ?>">>
                <input type="hidden" name="file_index" value="1">
                <input type="hidden" name="id" value="<?php echo $post->id ?>">

                <div class="right-fifth">
                    <h5>Update</h5>
                    <button type="submit">Update Assignment</button>
                </div>
                <?php form_close(); ?>
            </div>
        </div>
    </div>
</div>