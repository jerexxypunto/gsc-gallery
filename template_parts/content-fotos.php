<?php
  $args = array(
      "post_type" => "foto"
  );

  $fotos = new WP_Query($args);
?>
        
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Últimas fotos
            </h2>
        </div> 
        <div class="tm-gallery-fotos-container">
            <div class="nowrap row tm-mb-90 tm-gallery">
                <?php if($fotos->have_posts()): ?>
                    <?php while($fotos->have_posts()): $fotos->the_post(); ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5 card-picture">
                        <figure class="effect-ming tm-video-item photo-cover">
                            <?php if(has_post_thumbnail()){
                                the_post_thumbnail('medium_large');
                            } ?>
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
            <div id="fotos" class="arrow-button-container">
                <button class="boton-derecha">
                    <span class="fas fa-chevron-left"></span>
                </button>
                <button class="boton-izquierda">
                    <span class="fas fa-chevron-right"></span>
                </button>
            </div>
        </div>