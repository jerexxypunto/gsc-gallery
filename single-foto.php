<?php get_header() ?>
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri()?>/img/hero.jpg">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
  <div class="container tm-container-content photo-detail">
    <?php
      if(have_posts()):
        while (have_posts()): the_post(); ?>
             <div class="container-fluid tm-container-content tm-mt-60">
                <div class="row mb-4">
                    <h2 class="col-12 tm-text-primary"><?php the_title(); ?></h2>
                </div>
                <div class="row tm-mb-90">            
                    <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12 photo-thumb">
                      <?php the_post_thumbnail('large'); ?>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                        <div class="tm-bg-gray tm-foto-details">
                            <p class="mb-4">
                              Haga click aquí para ver en pantalla completa la foto.    
                            </p>
                            <div class="text-center mb-5">
                                <button id="openFullScreen" class="btn btn-primary tm-btn-big">Full-Size</button>
                            </div>                    
                            <div class="mb-4 d-flex flex-wrap">
                                <div id="foto-data-size" class="mr-4 mb-2">
                                    <span class="tm-text-gray-dark">Tamaño de imagen: </span><span class="tm-text-primary photo-size photo-size-width">0</span>x<span class="tm-text-primary photo-size photo-size-heigth">0</span> px
                                </div>
                                <div class="mr-4 mb-2">
                                    <span class="tm-text-gray-dark">Formato: </span><span id="photo-format" class="tm-text-primary">JPG</span>
                                </div>
                            </div>
                            <div class="mb-4 photo-autor">
                                <h3 class="tm-text-gray-dark mb-3">Fotografo</h3>
                                <div>
                                  <figure><?php echo get_avatar(get_the_author_meta('ID'), 30); ?></figure>
                                  <p><?php the_author(); ?></p>
                                </div>
                              </div>
                            <div>
                                <h3 class="tm-text-gray-dark mb-3">Categorias</h3>
                                <?php
                                  the_category()
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
               <div id="modalFullize" class="modalFullize">
                  <button class="modalFullize__cerrar">
                    <span class="fas fa-window-close"></span>
                  </button>
                  <section class="modalFullsize__content">
                      <?php the_content() ?>
                    </section>
                </div>
              <?php  
                endwhile;
              endif;
            ?>
    </div>
    <script src="<?php echo get_template_directory_uri()?>/js/single-photo.js"></script>
<?php get_footer() ?>