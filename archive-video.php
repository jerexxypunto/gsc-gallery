<?php
  $args = array(
      "post_type" => "video"
  );

  $videos = new WP_Query($args);

    function bootstrap_pagination( \WP_Query $wp_query = null, $echo = true ) {

	if ( null === $wp_query ) {
		global $wp_query;
	}

	$pages = paginate_links( [
			'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			'format'       => '?paged=%#%',
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'total'        => $wp_query->max_num_pages,
			'type'         => 'array',
			'show_all'     => false,
			'end_size'     => 3,
			'mid_size'     => 1,
			'prev_next'    => true,
			'prev_text'    => __( 'Anterior' ),
			'next_text'    => __( 'Siguiente' ),
			'add_args'     => false,
			'add_fragment' => ''
		]
	);

	if ( is_array( $pages ) ) {
		$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );

		$pagination = '<div class="pagination"><ul class="pagination">';

		foreach ($pages as $page) {
                        $pagination .= '<li class="page-item '.(strpos($page, 'current') !== false ? 'active' : '').'"> ' . str_replace( 'page-numbers', 'page-link', $page ) . '</li>';
                }

		$pagination .= '</ul></div>';

		if ( $echo ) {
			echo $pagination;
		} else {
			return $pagination;
		}
	}
	return null;
    }
  get_header();
?>

  <main class="the-content">

    <div class="container">
                <div class="row mb-4">
                    <h2 class="col-6 tm-text-primary">
                        Todos los Videos
                    </h2>
            </div> 
                <div class="row tm-mb-90 tm-gallery">
                    <?php if($videos->have_posts()): ?>
                        <?php while($videos->have_posts()):$videos->the_post(); ?>
                        <div class="col-4 mb-5 card-picture">
                            <figure class="effect-ming tm-entry-item photo-cover">
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
                    <div class="col-12">
                        <?php echo bootstrap_pagination(); ?> 
                    </div>
                </div> <!-- row -->
            </div>

  </main>


<?php get_footer() ?>