<!--
  <?php $head = wp_head(); ?>
-->
<!--
  <?php $foot = wp_footer(); ?>
-->
		<article id="main" class="site-main" role="main">
  		<?php
    		foreach ($wp_styles->queue as $obj => $value) {
      		$request = wp_remote_get( esc_url_raw($wp_styles->registered[$value]->src));
      		echo "<style>";
      		echo wp_remote_retrieve_body($request);
      		echo "</style>";
    		}
      ?>
			<?php
			while ( have_posts() ) :
				the_post();
				the_content();

			endwhile;
			?>
			      <?php
    		foreach ($wp_scripts->queue as $obj => $value) {
      		$request = wp_remote_get( esc_url_raw($wp_scripts->registered[$value]->src));
      		echo "<script>";
      		echo wp_remote_retrieve_body($request);
      		echo "</script>";
    		}
      ?>
		</article>