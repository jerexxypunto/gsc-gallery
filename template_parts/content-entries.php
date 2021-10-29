<?php
  $args = array(
      "post_type" => array("foto","post"),
      "post_per_page" => -1
  );

  $fotos = new WP_Query($args);
?>
        
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