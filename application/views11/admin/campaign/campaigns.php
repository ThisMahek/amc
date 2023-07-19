<div class="wrapper2">
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>
    <div class="mblog-post">
        <a href="<?php echo admin_url() ?>add-campaign" class="add-campaign">Add Campaign</a>
        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable" id="cs_datatable_lang" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Language</th>
                        <th>Date</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($campaigns as $item) : ?>
                        <tr>
                            <td><?php echo html_escape($item->id); ?></td>
                            <td class="td-product">

                                <a href="<?php echo generate_url("national-campaign") ?>/<?php echo $item->slug; ?>" target="_blank" class="a-table">
                                    <div class="img-table" style="height: 67px;">
                                        <img src="<?php echo base_url() . 'uploads/national_campaign/' . $item->featured_image; ?>" alt="" height="50" width="100" />
                                    </div>
                                    <?php echo html_escape($item->title); ?>
                                </a>

                            </td>
                            <td>
                                <?php
                                $language = get_language($item->lang_id);
                                if (!empty($language)) {
                                    echo $language->name;
                                } ?>
                            </td>
                            <td><?php echo formatted_date($item->created_at); ?></td>
                            <td class="drp-btn">
                                <div class="dropdown drp">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select a Option
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="<?php echo admin_url(); ?>edit-campaign/<?php echo html_escape($item->id); ?>">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                        <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('campaign_controller/delete_campaign_post','<?php echo $item->id; ?>','Are you want to delete this item?');">Delete <i class="fa fa-trash" aria-hidden="true"></i></a>

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
                        <th>Date</th>
                        <th>Option</th>
                    </tr>
                </tfoot>
            </table>
            <div class="text-right madd-btn">
                <a href="<?php echo admin_url() ?>add-campaign"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Campaign</a>
            </div>
        </div>
    </div>