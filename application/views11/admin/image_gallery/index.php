<div class="wrapper2">
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>
    <div class="mblog-post">
        <div class="text-right madd-btn">
            <a href="<?php echo admin_url() ?>add-image-gallery" class="add-image-gallery">Add Image</a>
        </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped dataTable" id="cs_datatable_lang" role="grid" aria-describedby="example1_info">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>

                            <th>Date</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($image_gallerys as $item) : ?>
                            <tr>
                                <td><?php echo html_escape($item->id); ?></td>
                                <td class="td-product">
                                    <div class="img-table" style="height: 67px;">
                                        <img src="<?php echo base_url() . 'uploads/image_gallery/' . $item->image; ?>" alt="" height="50" width="100" />
                                    </div>
                                </td>
                                <td> <?php echo html_escape($item->title); ?></td>

                                <td><?php echo formatted_date($item->created_at); ?></td>
                                <td class="drp-btn">
                                    <div class="dropdown drp">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Select a Option
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="<?php echo admin_url(); ?>edit-image-gallery/<?php echo html_escape($item->id); ?>">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                            <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('gallery_controller/delete_image_gallery_post','<?php echo $item->id; ?>','Are you want to delete this item?');">Delete <i class="fa fa-trash" aria-hidden="true"></i></a>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Option</th>
                        </tr>
                    </tfoot>
                </table>
                <div class="text-right madd-btn">
                    <a href="<?php echo admin_url() ?>add-image-gallery"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Image</a>
                </div>
            </div>
        </div>