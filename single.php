<?php

get_header();

the_post();

get_template_part( 'includes/inner_header' );

?>

<!-- =====================================================================================================================================

											B L O G - S I N G L E   C O N T E N T

====================================================================================================================================== -->

<!-- blog-single -->

<section class="blog-single new-single2">

	<!-- container -->

	<div class="container">

		<!-- row -->

		<div class="row">



			<!-- blog-single-container -->

			<div class="coupon_list col-md-<?php echo is_active_sidebar('sidebar-right_blog') ? '9' : '12' ?>">



				<!-- row -->

				<div class="row">



					<!-- post -->

					<div class="post col-md-12">



						<!-- blog-inner -->

						<div class="blog-inner">

							

							<?php if( has_post_thumbnail() ): ?>

								<div class="post-image">

									<?php 

										if( is_active_sidebar('sidebar-right_blog') ){

											the_post_thumbnail( 'blog_large', array( 'class' => 'listing-blog-wull-width img-responsive' ) );

										}

										else{

											the_post_thumbnail( 'full', array( 'class' => 'listing-blog-wull-width img-responsive' ) );

										}

									?>

								</div><hr>

							<?php endif; ?>



							<!-- blog-post-content -->

							<div class="blog-post-content blog-content blog-single-content">



								<!-- title -->

								<div class="caption blog-caption">

									<h3><?php the_title() ?></h3>

								</div>

								<!-- .title -->

								<a href="javascript:;"><span class="fa fa-category"></span></a>

									<?php echo coupon_categories_list( get_the_category() ); ?>

								<!-- blog-post-text -->

								<div class="text main_content">

									<?php the_content();  ?>

									<?php

										/* gte author meta */

										$author_id =  get_the_author_meta('ID');

										$user_meta = get_user_meta( $author_id, 'coupon_user_meta' );

										$user_meta = array_shift( $user_meta );

										$avatar = '';

										$description = '';

										if( !empty( $user_meta['avatar'] ) ){

											$avatar = $user_meta['avatar'];

										}

										

									?>

									

									<?php if( !empty( $avatar ) ): ?>

											<!-- avatar-image -->

										<div class="item-meta blog-meta">

											<div class="author pull-left">

												<div class="avatar">

													<img src="<?php echo esc_url( $avatar ); ?>" class="media-object img-thumbnail img-circle img-responsive img-custom-profile" title="" alt="" />

												</div>

											</div>

											<div class="authorname pull-left">

															<span class="first_font">by</span>

															<span class="last_font">

															<?php echo get_the_author_meta('first_name').' '.get_the_author_meta('last_name'); ?> 

															</span>

													</div>

										</div>

											<!-- .avatar-image -->

									<?php endif; ?>

									<div class="clearfix"></div>

									<?php 

									if( function_exists( 'show_share_buttons' ) ){ ?>

										<div class="show_share_li item-meta share pull-left">	

											<a class="show_share pull-left" href="<?php the_permalink(); ?>">

												<span class="fa fa-plus"></span>

														Share

											</a>

											<?php echo show_share_buttons( '', true ); ?>

										</div>	

									<?php } ?>									

									<!-- blog-meta -->

									<div class="item-meta blog-meta" style="float: left;padding-top:5px;">

										<ul class="list-inline">

											<li>

											<span class="fa fa-tilted-sep"></span>

											</li>

											<li>

												<a href="javascript:;" style="padding:0px;">

												<span class="fa fa-blog-comments"></span><?php comments_number( '0', '1', '%' ); ?></a>

											</li>

											<li>

											<span class="fa fa-tilted-sep"></span>

											</li>

											<li>

												<a href="javascript:;" style="padding:0px;">

													<span style="padding:0px;" class="fa fa-blog-time"></span><?php the_time( 'F j, Y' ) ?></a>

											</li>

										</ul>

									</div>

									<!-- .blog-meta -->

									<?php 

									$tags = coupon_tags_list( get_the_tags(), true ); 

									if( !empty( $tags ) ):

									?>

										<!-- blog-meta -->

										<div class="item-meta blog-meta meta-tags"  style="clear: both;">

											<ul class="list-inline">

												<li>

													<span class="fa fa-blog-tags"></span>

												</li>

												<?php echo $tags; ?>

											</ul>

										</div>

										<!-- .blog-meta -->

									<?php

									endif;

									?>

								</div>

								<!-- .blog-post-text -->

							</div>

							<!-- .blog-post-content -->

							<hr>

						</div>

						<!-- .blog-inner -->



					</div>

					<!-- .post -->

					<?php 

						$post_pages = coupon_link_pages();

						if( !empty( $post_pages ) ): ?>

						<!-- pagination -->

						<div class="blog-pagination col-md-12 blog-pagination-comments">

							<ul class="pagination">

								<?php echo $post_pages; ?>

							</ul>

						</div>

						<!-- .pagination -->

					<?php endif; ?>					



					<?php comments_template( '', true ); ?>



				</div>

				<!-- .row -->

			</div>

			<!-- .blog-single-container -->

			<!-- sidebar -->

			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 coupon_list_sidebar">

				<?php get_sidebar( 'right_blog' ); ?>

			</div>

			<!-- .sidebar -->

			



		</div>

		<!-- .row -->

	</div>

	<!-- .container -->



</section>



<!--<section class="comments_section">

<?php //comments_template( '', true ); ?>

</section>-->

<?php

get_footer();

?>