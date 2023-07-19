<div class="wrapper2">
    <div class="mblog-post">
        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($notices as $item) : ?>
                        <tr>
                            <td><?php echo html_escape($item->id); ?></td>
                            <td class="td-product">

                                <a href="<?php echo generate_url("notice") . "/" . $item->slug; ?>" target="_blank" class="a-table">
                                    <?php echo html_escape($item->title); ?>
                                </a>
                            </td>
                            <td><?php echo formatted_date($item->created_at); ?></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Date</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>