<div class="wrapper2">
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>
    <div class="mblog-post">
        <a href="<?php echo admin_url() ?>add-scheme-category" class="add-pag">Add Scheme Category</a>
        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable" id="cs_datatable_lang" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Language</th>
                        <th>Order</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $item) : ?>
                        <tr>
                            <td><?php echo html_escape($item->id); ?></td>
                            <td><?php echo html_escape($item->name); ?></td>
                            <td>
                                <?php
                                $language = get_language($item->lang_id);
                                if (!empty($language)) {
                                    echo $language->name;
                                } ?>
                            </td>
                            <td><?php echo html_escape($item->cat_order); ?></td>
                            <td class="drp-btn">
                                <div class="dropdown drp">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select a Option
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="<?php echo admin_url(); ?>edit-scheme-category/<?php echo html_escape($item->id); ?>">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                        <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('Scheme_category/delete_scheme_category','<?php echo $item->id; ?>','Are you want to delete this item?');">Delete <i class="fa fa-trash" aria-hidden="true"></i></a>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Language</th>
                        <th>Order</th>
                        <th>Option</th>
                    </tr>
                </tfoot>
            </table>
            <div class="text-right madd-btn">
                <a href="<?php echo admin_url() ?>add-scheme-category"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Scheme Category </a>
            </div>
        </div>
    </div>