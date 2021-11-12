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
              <!-- <video class="gsc-video video-js vjs-16-9 vjs-big-play-centered" data-setup="{}" controls id="fm-video">
                <source src="./content/video/MatrimonioMyM.mp4" type="video/mp4">
              </video> -->
              <article class="py-3">
                <h1 class="tm-text-primary pb-4 pt-3"><?php the_title(); ?></h1>
                <?php the_content(); ?>
              </article>
            </div>
            <script>
              let videoWp = document.querySelector("video");
              const clases = ["gsc-video", "video-js", "vjs-16-9", "vjs-big-play-centered"];
              const id = "gsc-video";

              const source = document.createElement("SOURCE");
              const currentURL = videoWp.getAttribute("src");
              source.setAttribute('src', currentURL);

              videoWp.setAttribute('id', id);
              videoWp.setAttribute('data-setup', {});
              videoWp.appendChild(source);
              videoWp.setAttribute('src','false');

              clases.forEach(clase => {
                  videoWp.classList.add(clase);
              });

              videoWp

              var reproductor = videojs('gsc-video', {
                fluid: true
              });

            </script>
              <?php  
                endwhile;
              endif;
            ?>
    </div>
<?php get_footer() ?>