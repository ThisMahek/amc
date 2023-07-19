<div class="wrapper2">
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>
    <div class="mScheme-post">
        <a href="<?php echo admin_url() ?>add-scheme" class="add-pag">Add Scheme Post</a>
        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable" id="cs_datatable_lang" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Language</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($schemes as $item) : ?>
                        <?php $post_category = $this->scheme_category_model->get_category($item->category_id); ?>
                        <tr>
                            <td><?php echo html_escape($item->id); ?></td>
                            <td class="td-product">
                                <?php if (!empty($post_category)) : ?>
                                    <a href="<?php echo generate_url("govt-scheme") . "/" . $post_category->slug; ?>/<?php echo $item->slug; ?>" target="_blank" class="a-table">
                                        <div class="img-table" style="height: 67px;">
                                            <img src="<?php echo base_url() . 'uploads/govt_scheme/' . $item->featured_image; ?>" alt="" height="50" width="100" />
                                        </div>
                                        <?php echo html_escape($item->title); ?>
                                    </a>
                                <?php else : ?>
                                    <div class="img-table" style="height: 67px;">
                                        <img src="<?php echo $item->featured_image; ?>" alt="" />
                                    </div>
                                    <?php echo html_escape($item->title); ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php
                                $language = get_language($item->lang_id);
                                if (!empty($language)) {
                                    echo $language->name;
                                } ?>
                            </td>
                            <td><?php if (!empty($post_category)) : ?>
                                    <?php echo html_escape($post_category->name); ?>
                                <?php endif; ?></td>
                            <td><?php echo formatted_date($item->created_at); ?></td>
                            <td class="drp-btn">
                                <div class="dropdown drp">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select a Option
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="<?php echo admin_url(); ?>edit-scheme/<?php echo html_escape($item->id); ?>">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                        <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('scheme_controller/delete_Scheme','<?php echo $item->id; ?>','Are you want to delete this item?');">Delete <i class="fa fa-trash" aria-hidden="true"></i></a>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Language</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Option</th>
                    </tr>
                </tfoot>
            </table>
            <div class="text-right madd-btn">
                <a href="<?php echo admin_url() ?>add-scheme"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Scheme Post </a>
            </div>
        </div>
    </div>