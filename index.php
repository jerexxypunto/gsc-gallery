<?php get_header(); ?>
 <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri()?>/img/hero.jpg">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60 sliders-entradas">
        <?php 
            get_template_part('template_parts/content','videos');
            get_template_part('template_parts/content','entries');
        ?>
<?php get_footer(); ?>