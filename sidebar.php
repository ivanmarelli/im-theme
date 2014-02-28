<aside class="rigth-col">
	<?php if ( !function_exists('dynamic_sidebar') ||
	!dynamic_sidebar ('Primary Sidebar') ) : ?>
	<div class="widget">
		<h3>Buscar</h3>
		<?php get_search_form(); ?>
	</div>
	<?php endif; ?>
</aside>