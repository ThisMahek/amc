<div class="aboutPage pt-5 pb-5">
    <div class="container">
        <?php if (empty($old_student)) : ?>
            <h1 class="text-center">Result yet to be declired / no result found</h1>
        <?php else : ?>
            <div>
            <embed src="<?php echo base_url().'uploads/old_marksheet/'.$old_student->file ?>" type="application/pdf" width="100%" height="1000"></embed>
            </div>
        <?php endif; ?>
        
    </div>
</div>