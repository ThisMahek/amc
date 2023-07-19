<nav class="navbar navbar-expand-lg navbar-light p-0">
    <div class="container">
        <a class="navbar-brand p-0" href="<?php echo base_url() ?>"><img src="<?php echo base_url() . 'uploads/logo/' . $this->general_settings->logo ?>" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo base_url() ?>">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        About us
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($this->header_pages as $header_page): ?>
                            <li><a class="dropdown-item" href="<?php echo  base_url().$header_page->slug; ?>"><?php echo $header_page->title; ?></a></li>
                        <?php endforeach; ?>
                        <li><a class="dropdown-item" href="<?php echo base_url(). 'our-association' ?>">Our Association</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url(). 'professors'; ?>"> Faculties </a></li>
                        <li><a class="dropdown-item" href="javascript:void(0)"> Certificates </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Our Courses
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php if (!empty($this->courses)) : ?>
                            <?php foreach ($this->courses as $course) : ?>
                                <li><a class="dropdown-item" href="<?php echo generate_url("course") ?>/<?php echo $course->slug; ?>"> <?php echo $course->title_name ?> </a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Gallery
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo base_url() . 'image-gallery' ?>"> Image Gallery </a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url() . 'video-gallery' ?>"> Video Gallery </a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo base_url() . 'result' ?>">Result</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo base_url() . 'search-franchise' ?>">Search Franchise</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo base_url() . 'placements' ?>">Placements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo base_url() . 'contact-us' ?>">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</header>