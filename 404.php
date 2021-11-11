<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package gsc_template
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="error-404 not-found">
		<div class="container">
			<h1>¡404!</h1>
			<h3>¡Ups! El elemento al que intenta acceder <br/> NO EXISTE.</h3>
			<h3>Lamentamos el inconveniente :(</h3>
			<div class="alert alert-danger">No hemos econtrado el elemento solicitado, intente acceder nuevamnete al mismo elemento o intente con otro elemento.</div>
			<div class="alert alert-info">
				Si el problema persiste ¡por favor! contactenos mediante los datos de contacto de más abajo.
			</div>
		</div>
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php

get_footer();
