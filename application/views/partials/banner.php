 <?php if (!empty($breadcrumb)) : ?>
     <div class="top-title-bread">
         <div class="container">
             <h1 class="top-heading text-center"> <?php echo $breadcrumb; ?> </h1>
             <nav aria-label="breadcrumb">
                 <ol class="breadcrumb m-0 d-flex justify-content-center">
                     <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page"><?php echo $breadcrumb; ?> </li>
                 </ol>
             </nav>
         </div>
     </div>
 <?php else : ?>
     <div class="top-title-bread">
         <div class="container">
             <h1 class="top-heading text-center"> <?php echo html_escape($page->title); ?> </h1>
             <nav aria-label="breadcrumb">
                 <ol class="breadcrumb m-0 d-flex justify-content-center">
                     <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page"><?php echo html_escape($page->title); ?> </li>
                 </ol>
             </nav>
         </div>
     </div>
 <?php endif; ?>