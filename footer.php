
      <hr>
      <footer>
        <p><?php bloginfo('name'); ?> by <a href="http://ivanmarelli.com.ar/" target="_blank">ivanmarelli.com.ar</a></p>
        <?php wp_footer(); ?>
      </footer>

    </div><!--/.container-->



	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		  $('[data-toggle=offcanvas]').click(function() {
		    $('.row-offcanvas').toggleClass('active');
		  });
		});

	</script>
     <?php wp_footer(); ?>
  </body>
</html>

