<div class="wrapper2">
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>
    <div class="mblog-post">
        <div class="text-right madd-btn">
            <a href="<?php echo $top_button_url; ?>"><i class="fa fa-bars" aria-hidden="true"></i> <?php echo $top_button_text; ?> </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr role="row">
                        <th width="20"><?php echo ('Id'); ?></th>
                        <th><?php echo ('Name'); ?></th>
                        <th><?php echo ('Email'); ?></th>
                        <th><?php echo ('Comment'); ?></th>
                        <th style="min-width: 20%"><?php echo ('Post'); ?></th>
                        <th style="min-width: 10%"><?php echo ('Date'); ?></th>
                        <th class="max-width-120"><?php echo ('Options'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($comments as $item) : ?>
                        <?php
                        $post = $this->blog_model->get_post($item->post_id);
                        $post_category = $this->category_model->get_category($post->category_id); ?>
                        <tr>
                            <td><?php echo html_escape($item->id); ?></td>
                            <td><?php echo html_escape($item->name); ?></td>
                            <td><?php echo html_escape($item->email); ?></td>
                            <td class="break-word"><?php echo html_escape($item->comment); ?></td>
                            <td>
                                <a href="<?php echo generate_url("blog") . "/" . $post_category->slug; ?>/<?php echo $post->slug; ?>" target="_blank"><?php echo html_escape($post->title); ?></a>

                            </td>
                            <td class="nowrap"><?php echo formatted_date($item->created_at); ?></td>
                            <td class="drp-btn">
                                <?php echo form_open('admin/approve_blog_comment_post'); ?>
                                <input type="hidden" value="<?php echo $item->id ?>" name="id">
                                <div class="dropdown drp">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select a Option
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <?php if ($item->status != 1) : ?>
                                            <button class="appr-btn" type="submit"><?php echo ("approve"); ?> <i class="fa fa-check option-icon"></i> </button>
                                        <?php endif; ?>
                                        <?php echo form_close(); ?>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('admin/delete_blog_comment_post','<?php echo $item->id; ?>','Are you want to delete this item?');">Delete <i class="fa fa-trash" aria-hidden="true"></i></a>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th width="20"><?php echo ('Id'); ?></th>
                        <th><?php echo ('Name'); ?></th>
                        <th><?php echo ('Email'); ?></th>
                        <th><?php echo ('Comment'); ?></th>
                        <th style="min-width: 20%"><?php echo ('Post'); ?></th>
                        <th style="min-width: 10%"><?php echo ('Date'); ?></th>
                        <th class="max-width-120"><?php echo ('Options'); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>