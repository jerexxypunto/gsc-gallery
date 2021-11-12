<?php get_header() ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/assets-video-player/css/video-js.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/assets-video-player/css/estilos.css">
    <script src="<?php echo get_template_directory_uri()?>/assets-video-player/js/video.js"></script>
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
             <div class="contenedor">
              <figure id="caratula" style="display:none;">
                <?php the_post_thumbnail('medium');?>
              </figure>
              <article class="py-3">
                <h1 class="tm-text-primary pb-4 pt-3"><?php the_title(); ?></h1>
                <?php the_content(); ?>
              </article>
            </div>

            <script>
              let videoWp = document.querySelector("video");
              const clases = ["gsc-video", "video-js", "vjs-16-9", "vjs-big-play-centered"];
              const id = "gsc-video";
              const poster = document.querySelector("#caratula").children[0].getAttribute('src');

              const source = document.createElement("SOURCE");
              const currentURL = videoWp.getAttribute("src");
              source.setAttribute('src', currentURL);

              videoWp.setAttribute('id', id);
              videoWp.appendChild(source);
              videoWp.setAttribute('src','false');
              videoWp.setAttribute('poster', poster);
              clases.forEach(clase => {
                  videoWp.classList.add(clase);
              });

              videoWp

              var reproductor = videojs('gsc-video', {
                fluid: true
              });

            </script>
            <div class="metaFotter pb-5">
              <h5>Autor: <?php the_author(); ?></h5>
              <h5>Fecha de publicación <?php the_date(); ?></h5>
            </div>
              <?php  
                endwhile;
              endif;
            ?>
    </div>
<?php get_footer() ?>