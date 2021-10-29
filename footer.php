  </div> <!-- container-fluid, tm-container-content -->

    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <?php dynamic_sidebar('pie-pagina'); ?>
        </div>
        <p class="text-center">GSC Gallery &copy; Todos los derechos recervados.</p>
        <?php wp_footer(); ?>
    </footer>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>
</html>