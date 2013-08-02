<?php if ( post_password_required() ) : ?>
    <p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'textdomain' ); ?></p>
    
	<?php 
		return;
		
	endif;
	?>

<?php if (  comments_open() && have_comments() ) : ?>
    <h4 id="comments">
    	<?php comments_number( __( 'No Comments &#187;', 'textdomain' ), __( '1 Comment &#187;', 'textdomain' ), __( '% Comments &#187;', 'textdomain' ) ); ?> for <?php the_title(); ?>
    </h4>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	    <div class="navigation">
	        <div class="previous">
	        	<?php previous_comments_link( __( '&#8249; Older comments','textdomain' ) ); ?>
	        </div><!-- end of .previous -->
	        <div class="next">
	        	<?php next_comments_link( __( 'Newer comments &#8250;' ,'textdomain', 0 ) ); ?>
	        </div><!-- end of .next -->
	    </div><!-- end of.navigation -->
    <?php endif; ?>

    <ol class="commentlist">
        <?php wp_list_comments( 'avatar_size=60&type=comment' ); ?>
    </ol>
    
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	    <div class="navigation">
	        <div class="previous">
	        	<?php previous_comments_link( __( '&#8249; Older comments','textdomain' ) ); ?><a></a>
	        </div><!-- end of .previous -->
	        <div class="next">
	        	<?php next_comments_link( __( 'Newer comments &#8250;', 'textdomain', 0 ) ); ?>
	        </div><!-- end of .next -->
	    </div><!-- end of.navigation -->
    <?php endif; ?>

<?php else : ?>

<?php endif; ?>

<?php
if ( ! empty( $comments_by_type['pings'] ) ) : // let's seperate pings/trackbacks from comments
	$count = count($comments_by_type['pings']);
	( $count !== 1 ) ? $txt = __( 'Pings&#47;Trackbacks', 'textdomain' ) : $txt = __( 'Pings&#47;Trackbacks', 'textdomain' );
?>
    <h6 id="pings">
    	<?php echo $count . " " . $txt; ?> <?php _e( 'for', 'textdomain' ); ?> "<?php the_title(); ?>"
    </h6>

    <ol class="commentlist">
        <?php wp_list_comments( 'type=pings&max_depth=<em>' ); ?>
    </ol>

<?php endif; ?>


<?php 
if ( comments_open() ) :

    $fields = array(
        'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'textdomain' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
        '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /></p>',
        'email' => '<p class="comment-form-email"><label for="email">' . __( 'E-mail', 'textdomain' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
        '<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" /></p>',
        'url' => '<p class="comment-form-url"><label for="url">' . __( 'Website', 'textdomain' ) . '</label>' .
        '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
    );

    $defaults = array( 'fields' => apply_filters( 'comment_form_default_fields', $fields ) );

    comment_form( $defaults );

else :

	if ( is_single() ) {
		_e( '<h3>Comments are closed</h3>', 'textdomain' );
	}
    
endif;
?>
