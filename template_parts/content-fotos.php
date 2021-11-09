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
                    <div class="col-4 mb-5 card-picture">
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
                <button class="boton-izquierda">
                    <span class="fas fa-chevron-left"></span>
                </button>
                <button class="boton-derecha">
                    <span class="fas fa-chevron-right"></span>
                </button>
            </div>
        </div>
        <script>
            const botonDerecha = document.querySelector("#fotos .boton-derecha"); 
            const botonIzquierda = document.querySelector("#fotos .boton-izquierda"); 
            const itemsEntries = document.querySelectorAll(".tm-gallery-fotos-container .nowrap .card-picture");

            let currentValue;
            let now;

            botonDerecha.addEventListener("click", (e) => deslizar(e));
            botonIzquierda.addEventListener("click", (e) => deslizar(e));


             let getPadding = (txt)=>{
                    let pL = window.getComputedStyle(txt, null).getPropertyValue('padding-left');
                    return pL;
            }              

            function deslizar(direccion) {
                let classElement = direccion.target.classList[1];
                let currentWidth = itemsEntries[0].clientWidth;
                let iterationNumber = Math.trunc(itemsEntries.length / 3) ;
                let paddingTotal = getPadding(itemsEntries[0]).split("px");
                paddingTotal = parseInt(paddingTotal[0]);
                now = (((currentWidth + paddingTotal) * 3) * iterationNumber);
                currentValue = 0; 
                if (classElement == "fa-chevron-right"){
                    currentValue === now ? currentValue = 0 : currentValue = currentValue + now;
                    itemsEntries.forEach(element => {
                        element.style.transform = `translateX(-${currentValue}px)`;
                    });
                }else if (classElement == "fa-chevron-left"){
                    currentValue === 0 ? currentValue = now : currentValue = currentValue - now; 
                    itemsEntries.forEach(element => {
                        element.style.transform = `translateX(${currentValue}px)`;
                    });
                }
                console.log(`currentValue:${currentValue} y now:${now}`);
            }
        </script>