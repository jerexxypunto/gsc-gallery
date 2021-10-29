<!DOCTYPE html>
<html lang="<?php language_attributes();?>">
<head>
    <meta charset="<?php bloginfo("charset") ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
    <?php wp_body_open(); ?>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo home_url()?>">
                <?php the_custom_logo();?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php wp_nav_menu(
                    array(
                        "container" => '',
                        "menu_class" => "navbar-nav ml-auto mb-2 mb-lg-0"
                    )
                ); ?>
                <script>
                    const links_li = document.querySelectorAll(".navbar-nav li");
                    const links_a = document.querySelectorAll(".navbar-nav a");
                    links_li.forEach(element => {
                    element.classList.add("nav-item"); 
                    });
                    links_a.forEach(element => {
                    element.classList.add("nav-link"); 
                    });

                </script>
            </div>
        </div>
    </nav>