<?php
  $args = array(
      "post_type" => "video"
  );

  $video = new WP_Query($args);
?>
        
        <div class="container">
            <div class="row mb-4">
                <h2 class="col-6 tm-text-primary">
                    Últimos video
                </h2>
            </div> 
            <div class="tm-gallery-custom-post-container">
                <button class="boton-izquierda boton-custom-post boton-custom-post">
                    <span class="fas fa-chevron-left"></span>
                </button>
                <div class="nowrap-tm-galery-container">
                    <div class="nowrap row tm-gallery">
                        <?php if($video->have_posts()): ?>
                            <?php while($video->have_posts()): $video->the_post(); ?>
                            <div class="col-4 mb-5 card-picture">
                                <figure class="effect-ming tm-custom-post-item photo-cover">
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
                </div>
                <button class="boton-derecha boton-custom-post boton-custom-post">
                    <span class="fas fa-chevron-right"></span>
                </button>
            </div>
        </div>
        <script>
            const botonDerecha = document.querySelector(".boton-derecha"); 
            const botonIzquierda = document.querySelector(".boton-izquierda"); 
            const itemsEntriesContainer = document.querySelector(".nowrap.row.tm-gallery");

            let iterationNumber;
            let currentIteration = 0;
            let itemsHijos;
            let currentWidth;

            let quatityDisplacement = 0;

            botonDerecha.addEventListener("click", (e) => deslizar(e));
            botonIzquierda.addEventListener("click", (e) => deslizar(e));              

            function changeItem(direccion){
                itemsHijos = itemsEntriesContainer.children;
                iterationNumber = Math.trunc(itemsHijos.length / 3);
                currentWidth = itemsEntriesContainer.clientWidth;
                if(direccion === "fa-chevron-right"){
                    if(currentIteration < iterationNumber){
                        currentIteration++;
                        quatityDisplacement = quatityDisplacement + currentWidth;
                    }else{
                        currentIteration = 0;
                        quatityDisplacement = 0;
                    }
                }else if(direccion === "fa-chevron-left"){
                    if(currentIteration > 0){
                        currentIteration--;
                        if(Math.sign(quatityDisplacement) === -1){
                            quatityDisplacement = quatityDisplacement + currentWidth;
                        }else if(Math.sign(quatityDisplacement) === 1){
                            quatityDisplacement = quatityDisplacement - currentWidth;
                        }
                    }else{
                        currentIteration = iterationNumber;
                        quatityDisplacement = currentWidth * -1;
                    }
                }
            }


            function deslizar(direccion) {
                let classElement = direccion.target.classList[1];
                changeItem(classElement)
                if (classElement === "fa-chevron-right") {
                    itemsEntriesContainer.style.transform = `translateX(-${quatityDisplacement}px)`;
                }else if (classElement === "fa-chevron-left"){
                    itemsEntriesContainer.style.transform = `translateX(${quatityDisplacement}px)`;
                }
                
            }
        </script>