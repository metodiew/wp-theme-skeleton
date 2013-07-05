<?php get_header(); ?>

<!-- Content Start -->
<div class="content">
	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<!-- Post Start -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
	        		<?php the_content(); ?> 
                	
                	<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'textdomain' ), 'after' => '</div>' ) ); ?>
                	
                	<div class="post-data">
					    <?php the_tags( __( 'Tagged with:', 'textdomain' ) . ' ', ', ', '<br />' ); ?> 
					<?php printf( __( 'Posted in %s', 'textdomain' ), get_the_category_list( ', ' ) ); ?> 
                	</div>
                	
		        </article>
			    <!-- Post End -->
		    
		    <div class="comments">
				<?php comments_template( '', true ); ?>
			</div>
		    
		<?php endwhile; ?>
        	
        	<?php if (  $wp_query->max_num_pages > 1 ) : ?>
			
				<div class="navigation">
					<div class="previous">
						<?php next_posts_link( __( '&#8249; Older posts', 'textdomain' ) ); ?>
					</div>
					<div class="next">
						<?php previous_posts_link( __( 'Newer posts &#8250;', 'textdomain' ) ); ?>
					</div>
				</div><!-- end of .navigation -->
			
			<?php endif; ?>
			
			<div class="clear"></div>
        	
        <?php else : ?>
        
	     	<h2 class="title-404">
	        	<?php _e( 'Nothing here!', 'textdomain' ); ?>
			</h2>
		    <h4>
		    	<?php _e( 'You can return', 'textdomain' ); ?> 
		        <a href="<?php echo home_url(); ?>/" title="<?php esc_attr_e( 'home', 'textdomain' ); ?>">
		        	<?php _e( 'Home', 'textdomain' ); ?>
		        </a>
		        <?php _e( 'or search for the page you were looking for', 'textdomain' ); ?>
			</h4>
		
		    <?php get_search_form(); ?>
        	
        <?php endif; ?>
	        	
</div>
<!-- Content End -->
	        	
<?php get_sidebar(); ?>
	        	
<?php get_footer(); ?>