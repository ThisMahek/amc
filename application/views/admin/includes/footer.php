</div>
<div class="modal ajloder" id="ajaxloaderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <img src="<?php echo base_url() . 'assets/backend/images/project-loader-colors.gif' ?>">
            </div>

        </div>
    </div>
</div>
<footer>
    <p>© Copyright 2020 <a href="<?php echo base_url() ?>" target="_blank"><?php echo $this->general_settings->application_name ?></a> | Designed & Developed By <a href="https://business.bigpage.in/" target="_blank">Bigpage</a> </p>
</footer>
</section>
<script src='https://code.jquery.com/jquery-latest.js'></script>
<script src="<?php echo base_url('assets/backend/js/bootstrap.min.js'); ?>"></script>
<!--  <script src="https://cdn.ckeditor.com/ckeditor/<version>/classic/ckeditor.js"></script> -->
<!-- <script src='js/main.js'></script> -->
<!-- <script src="ckeditor/ckeditor.js"></script> -->
<script src="<?php echo base_url(); ?>assets/backend/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/datatables/dataTables.bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/bp-scripts.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<!-- Tagsinput js -->
<script src="<?php echo base_url(); ?>assets/backend/tagsinput/jquery.tagsinput.min.js"></script>

<script>
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: '<?php echo base_url("ck-file-upload") ?>',
        filebrowserUploadMethod: 'form',
        allowedContent: true,
        autoGrow_onStartup: true,
        enterMode: CKEDITOR.ENTER_BR

    });
</script>
<script>
    $('#myModal').on('shown.bs.modal', 'keyboard: false', function() {
        $('#myInput').trigger('focus')
    })
</script>
<script>
    $(document).ready(function() {
        $('.counter-value').each(function() {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 3500,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(function() {
        'use strict';
        (function() {
            var aside = $('.mside-nav'),
                showAsideBtn = $('.show-side-btn'),
                contents = $('#contents');
            showAsideBtn.on("click", function() {
                $("#" + $(this).data('show')).toggleClass('show-mside-nav');
                contents.toggleClass('margin');
            });
            if ($(window).width() <= 767) {
                aside.addClass('show-mside-nav');
            }
            $(window).on('resize', function() {
                if ($(window).width() > 767) {
                    aside.removeClass('show-mside-nav');
                }
            });
            // dropdown menu in the side nav
            var slideNavDropdown = $('.mside-nav-dropdown');
            $('.mside-nav .categories li').on('click', function() {
                $(this).toggleClass('opend').siblings().removeClass('opend');
                if ($(this).hasClass('opend')) {
                    $(this).find('.mside-nav-dropdown').slideToggle('fast');
                    $(this).siblings().find('.mside-nav-dropdown').slideUp('fast');
                } else {
                    $(this).find('.mside-nav-dropdown').slideUp('fast');
                }
            });
            $('.mside-nav .close-aside').on('click', function() {
                $('#' + $(this).data('close')).addClass('show-mside-nav');
                contents.removeClass('margin');
            });
        }());


    });
</script>
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
<script>
    $('#location_1').on('ifChecked', function() {
        $("#location_countries").hide();
    });
    $('#location_2').on('ifChecked', function() {
        $("#location_countries").show();
    });
    var sweetalert_ok = '<?php echo "ok"; ?>';
    var sweetalert_cancel = '<?php echo "cancel"; ?>';
</script>
<?php if (isset($lang_search_column)) : ?>
    <script>
        var table = $('#cs_datatable_lang').DataTable({
            dom: 'l<"#table_dropdown">frtip',
            "order": [
                [0, "desc"]
            ],
            "aLengthMenu": [
                [15, 30, 60, 100],
                [15, 30, 60, 100, "All"]
            ]
        });
        //insert a label
        $('<label class="table-label"><label/>').text('Course').appendTo('#table_dropdown');

        //insert the select and some options
        $select = $('<select class="form-control input-sm"><select/>').appendTo('#table_dropdown');

        $('<option/>').val('').text('<?php echo "all"; ?>').appendTo($select);
        <?php foreach ($this->courses as $lang) : ?>
            $('<option/>').val('<?php echo $lang->title_name; ?>').text('<?php echo $lang->title_name; ?>').appendTo($select);
        <?php endforeach; ?>

        table.column(<?php echo $lang_search_column; ?>).search('').draw();

        $("#table_dropdown select").change(function() {
            table.column(<?php echo $lang_search_column; ?>).search($(this).val()).draw();
        });
    </script>
<?php endif; ?>

<?php if (!empty($this->session->userdata('mds_send_email_data'))) : ?>
    <script>
        $(document).ready(function() {
            var data = JSON.parse(<?php echo json_encode($this->session->userdata("mds_send_email_data")); ?>);
            if (data) {
                data[csfr_token_name] = $.cookie(csfr_cookie_name);
                $.ajax({
                    type: "POST",
                    url: "<?= base_url(); ?>auto-send-email-post",
                    data: data,
                    success: function(response) {}
                });
            }
        });
    </script>
<?php endif;
$this->session->unset_userdata('mds_send_email_data'); ?>

</body>

</html>