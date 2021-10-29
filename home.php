<?php get_header(); ?>

<?php
  $args = array(
      "post_type" => array("foto","post"),
      "post_per_page" => -1
  );

  $fotos = new WP_Query($args);
?>
 <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri()?>/img/hero.jpg">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Latest Photos
            </h2>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <form action="" class="tm-text-primary">
                    Page <input type="text" value="1" size="1" class="tm-input-paging tm-text-primary"> of 200
                </form>
            </div>
        </div>
        <div class="row tm-mb-90 tm-gallery">
            <?php if($fotos->have_posts()): ?>
                <?php while($fotos->have_posts()): $fotos->the_post(); ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5 card-picture">
                    <figure class="effect-ming tm-video-item photo-cover">
                        <?php the_post_thumbnail('medium_large'); ?>
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2><?php the_title() ?></h2>
                            <a href="<?php the_permalink(); ?>">View more</a>
                        </figcaption>                    
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light"><?php the_date();?></span>
                        <span><?php the_author(); ?></span>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>        
        </div> <!-- row -->
        <div class="row tm-mb-90">
            <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
                <a href="javascript:void(0);" class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>
                <div class="tm-paging d-flex">
                    <a href="javascript:void(0);" class="active tm-paging-link">1</a>
                    <a href="javascript:void(0);" class="tm-paging-link">2</a>
                    <a href="javascript:void(0);" class="tm-paging-link">3</a>
                    <a href="javascript:void(0);" class="tm-paging-link">4</a>
                </div>
                <a href="javascript:void(0);" class="btn btn-primary tm-btn-next">Next Page</a>
            </div>            
        </div>
<?php get_footer(); ?>