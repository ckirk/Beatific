<?php
	/**********************************************************************
	***********************************************************************
	COUPONER COMMENTS
	**********************************************************************/
	
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ( 'Please do not load this page directly. Thanks!' );
	if ( post_password_required() ) {
		return;
	}
?>
<?php if ( comments_open() ) : ?>

	<!-- comments -->
	<div class="comments col-md-12">

		<!-- blog-inner -->
		<div class="blog-inner">

			<!-- comments-title -->
			<div class="caption widget-caption comment-caption">
				<h3><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></h3>
			</div>
			<!-- .comments-title -->
			<?php if ( have_comments() ) : ?>
				<?php wp_list_comments( 'type=comment&callback=coupon_comments' ); ?>
			<?php endif; ?>
			
			<?php
				$comment_links = paginate_comments_links( 
					array(
						'echo' => false,
						'type' => 'array'
					) 
				);
				if( !empty( $comment_links ) ):
			?>		
				<div class="blog-pagination col-md-9 blog-pagination-comments">
					<ul class="pagination">
						<?php echo  coupon_format_pagination( $comment_links ); ?>
					</ul>
				</div>
			<?php endif; ?>	
		<hr>
		</div>
		<!-- .blog-inner -->
	</div>
	<!-- .comments -->
	
	<!-- comment-form -->
	<div class="comment-form col-md-12">
		<div class="blog-inner">
			<div class="comment-form-content clearfix">
				<div class="row">
					<div class="form-group col-md-12">
					<?php 	$comments_args = array(
								'label_submit'	=>	'send',
								'title_reply'	=>	'',
								'fields'		=>	apply_filters( 'comment_form_default_fields', array(
														'author' => '<div class="form-group col-md-6"><div class="form-group col-md-12">
																		<input type="text" class="form-control form-control-custom" id="name" placeholder="'.esc_attr__( 'Name', 'coupon' ).'" name ="author">
																	</div>',
														'email'	 => '<div class="form-group col-md-12">
																		<input type="text" class="form-control form-control-custom" id="name" placeholder="'.esc_attr__( 'Email', 'coupon' ).'" name ="email">
																	</div></div>'
														)
													),
								'comment_field'	=>	'<div class="form-group col-md-6">
														<textarea class="form-control form-control-custom" rows="4" id="comment" placeholder="'.esc_attr__( 'Comment', 'coupon' ).'" name="comment"></textarea>
													</div>',
								'cancel_reply_link' => '',
								'comment_notes_after' => '',
								'must_log_in' => '',
								'logged_in_as' => '',
								'comment_notes_before' => ''
							);
							comment_form( $comments_args );
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- .comment-form -->
<?php endif; ?>