<?php get_header() ?>
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri()?>/img/hero.jpg">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
  <div class="container tm-container-content video-detail">
    <?php
      if(have_posts()):
        while (have_posts()): the_post(); ?>
             <article class="tm-text-primary pt-5 pb-3">
               <h1 class="tm-text-primary"><?php the_title(); ?></h1>
             </article>
              <?php  
                endwhile;
              endif;
            ?>
    </div>
<?php get_footer() ?>