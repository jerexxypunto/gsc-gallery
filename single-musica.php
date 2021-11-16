<?php get_header() ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/music-player.css">
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri()?>/img/hero.jpg">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
  <div class="container">
    <?php
      if(have_posts()):
        while (have_posts()): the_post(); ?>
             <main id="music-player">
                <div class="container">
                  <div class="row">
                      <picture class="caratula">
                          <?php the_post_thumbnail('large'); ?>
                      </picture>
                      <section class="info-song">
                          <h1><?php the_title(); ?></h1>
                      </section>
                      <section id="current-song">
                          <h2></h2>
                      </section>
                      <div class="audio-container">
                          <button id="playPause"> <span class="fa fa-play"></span></button>
                          <div id="progress">
                              <div class="progressData"></div>
                              <span class="now">00:00</span>
                              <span class="total">00:00</span>
                          </div>
                          <label id="volumenContainer">
                              <button><span class="fa fa-volume-up"></span></button>
                              <div class="volumen-contenedor">
                                  <input type="range" id="volumen">
                              </div>
                          </label>
                      </div>
                      <div class="pt-3 col-12 d-flex justify-content-between buttons_container">
                          <button id="antes"><i class="fas fa-backward"></i></button>
                          <button id="despues"><i class="fas fa-forward"></i></button>
                      </div>
                      <div class="letra pt-5">
                          <?php the_content(); ?>
                      </div>
                  </div>
                </div>
            </main>
            <script src="<?php echo get_template_directory_uri()?>/js/music-player.js"></script>
            <?php    
                endwhile;
              endif;
            ?>
    </div>
<?php get_footer() ?>