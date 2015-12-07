<?php

get_header();



the_post();



get_template_part( 'includes/inner_header' );



global $wp_query;



$args = array_merge( $wp_query->query_vars, array( 'post_type' => 'post' ) );



if($_GET['s'])



$main_query = new WP_Query( $args );



else



$main_query = new WP_Query('cat=-3' , $args );	







$cur_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; //get curent page



$page_links_total =  $main_query->max_num_pages;



$page_links = paginate_links( 



				array(



					'base' => add_query_arg( 'paged', '%#%' ),



					'prev_next' => true,



					'end_size' => 2,



					'mid_size' => 2,



					'total' => $page_links_total,



					'current' => $cur_page,	



					'prev_next' => false,



					'type' => 'array'



				)



			 );



?>



<?php



if(!$_GET['s']){



global $post;



$myposts = get_posts('numberposts=1&category=3');



foreach($myposts as $post) :



?>



<section class="blog-featured">







	<!-- container -->



	<div class="container">



		<!-- row -->



		<div class="row">







			<!-- blog-home-container -->



			<div class="col-md-12<?php //echo is_active_sidebar('sidebar-right_blog') ? '9' : '12' ?>">



<!-- blog-post-1 -->



						<!-- post -->



					<div class="post col-lg-12 col-md-12">







						<!-- blog-inner -->



						<div class="blog-inner row">



							



							<?php if( has_post_thumbnail() ): ?>



								<div class="post-image col-lg-7 col-md-7 ">



									<?php 



										if( is_active_sidebar('sidebar-right_blog') ){



											the_post_thumbnail( 'blog_large', array( 'class' => 'listing-blog-wull-width img-responsive' ) );



										}



										else{



											the_post_thumbnail( 'full', array( 'class' => 'listing-blog-wull-width img-responsive' ) );



										}



									?>



								</div>



							<?php endif; ?>







							<!-- blog-post-content -->



							<div class="blog-post featured-blog blog-post-content blog-single-content col-lg-5 col-md-5">







								<!-- title -->



								<div class="caption blog-caption">



									<h3><?php the_title() ?></h3>



									<span class="fa fa-blog-title-border"></span>



								</div>



								<!-- .title -->



								



								<!-- blog-post-text -->



								<div class="text main_content">



									<?php echo apply_filters('the_excerpt',get_the_excerpt().'<a class="read-more" href="'.get_permalink().'"> read more </a>'); ?>



								</div>



								<!-- .blog-post-text -->



								<!-- blog-meta -->



								



										



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



											<!-- profile -->



											



											<?php if( !empty( $avatar ) ): ?>



												<!-- avatar-image -->



												<div class="author pull-left" style="padding:15px 0 0 0;"><div class="avatar">



													<img src="<?php echo esc_url( $avatar ); ?>" class="media-object img-thumbnail img-circle img-responsive img-custom-profile" title="" alt="" />



												</div></div>



												<!-- .avatar-image -->



											<?php endif; ?>



											



									<div class="item-meta pull-left">



										<ul class="list-inline">



										<li>



											<div class="authorname pull-left" style="padding: 0px 0px 0px 12px;">



															<span class="first_font" style="margin-right:0;">by</span>



															<span class="last_font" style="margin-right:0;">



															<?php echo get_the_author_meta('first_name').' '.get_the_author_meta('last_name'); ?> 



															</span>



											</div>



										</li>



										<li style="position: relative;">



											<span style="margin: 0px; position: relative; top: -6px;left: 0;" class="fa fa-tilted-sep"></span>



										</li>



										<li>



											<a href="javascript:;" style="float:left;">



											<span class="fa fa-blog-time" style="padding:23px 0 0 0;"></span><?php the_time( 'F j, Y' ) ?></a>



										</li>



										</ul>



									</div>



									<!-- .blog-meta -->



							</div>



							<!-- .blog-post-content -->







						</div>



						<!-- .blog-inner -->







					</div>



					<!-- .post -->



<?php endforeach;







} ?>



</div>



</div>



		<!-- .row -->



	</div>



	<!-- .container -->







</section>

<section id="blgtoptext">

	<div class="container">

    			<div class="blgtoptext">

		

        <?php if ( ! dynamic_sidebar( 'stories' ) ) : ?>

				

			<?php endif; ?>

        

        </div>

    </div>

</section>

<!-- blog-home -->

<section class="blog-home mainblogtex">







	<!-- container -->



	<div class="container">



		<!-- row -->



		<div class="row">







			<!-- blog-home-container -->



			<div class="col-md-12<?php //echo is_active_sidebar('sidebar-right_blog') ? '9' : '12' ?>">



				



				<?php if( $main_query->have_posts() ): ?>



					<!-- row -->



					<div class="row">



						<?php 

						$i = 0;

						while( $main_query->have_posts() ): 

						$i = $i + 1;

						?>



							<?php $main_query->the_post(); ?>







							<!-- blog-post-1 -->

						<div class="blog-post col-lg-4 col-md-4 col-sm-6 col-xs-12">



							<!-- blog-inner -->



							<div class="blog-inner blog-inner-home">



								







								<!-- blog-image -->



								<?php if( has_post_thumbnail() ): ?>



									<div class="blog-image">

										<a href="<?php the_permalink() ?>">

										<?php the_post_thumbnail( 'blog_latest', array( 'class' => 'img-responsive' ) ); ?>



										<!-- blog-top-icon -->



										



											<div class="blog-icon-mask green-bg">



												<i class="fa fa-blog_plus"></i>



											</div>



										</a>



										<!-- .blog-top-icon -->



									</div>



								<?php endif; ?>



								<!-- .blog-image -->







								<!-- blog-content -->



								<div class="blog-content">



									<h4><?php the_title() ?></h4>



									<span>



										<a href="javascript:;"><span class="fa fa-category"></span></a>



										<?php echo coupon_categories_list( get_the_category() ); ?>



									</span>



									<?php echo apply_filters('the_excerpt',get_the_excerpt().'<a class="read-more" href="'.get_permalink().'"> read more </a>'); ?>



								</div>



								<!-- .blog-content -->







								<!-- blog-meta -->



								<div class="item-meta">



									<ul class="list-unstyled">



										<li>



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



											<!-- profile -->



											<div class="author">



											<?php if( !empty( $avatar ) ): ?>



												<!-- avatar-image -->



												<div class="avatar pull-left">



													<img src="<?php echo esc_url( $avatar ); ?>" class="media-object img-thumbnail img-circle img-responsive img-custom-profile" title="" alt="" />



												</div>



												<!-- .avatar-image -->



											<?php endif; ?>



											<div class="authorname pull-left">



															<span class="first_font">by</span>



															<span class="last_font">



															<?php echo get_the_author_meta('first_name').' '.get_the_author_meta('last_name'); ?> 



															</span>



													</div>



											</div>



											<!-- .profile -->



										</li>



										<li class="show_share_li" style="height: 70px; clear: both;">



											<a class="show_share pull-left" href="<?php the_permalink(); ?>">



												<span class="fa fa-plus"></span>



											</a>



												<?php 



											if( function_exists( 'show_share_buttons' ) ){



												echo show_share_buttons( '', true );



											}



											?>



										</li>



									</ul>



								</div>



								<!-- .blog-meta -->



							</div>



							<!-- .blog-inner -->



						</div>



						<?php if($i%3 == 0){ echo '</div></div><div class="col-md-12"><div class="row">';}?>



						<!-- .blog-post-1 -->



						<?php endwhile; ?>



						<?php if( !empty( $page_links ) ): ?>



							<!-- pagination -->



							<div class="blog-pagination col-md-12">



								<ul class="pagination">



									<?php echo coupon_format_pagination( $page_links ); ?>



								</ul>



							</div>



							<!-- .pagination -->



						<?php endif; ?>







					</div>



					<!-- .row -->



				<?php else: ?>



					<p><?php _e( 'No blog posts yet!', 'coupon' ); ?></p>



				<?php endif; ?>



			</div>



			<!-- .blog-home-container -->







		</div>



		<!-- .row -->



	</div>



	<!-- .container -->







</section>



<!-- .blog-home -->



<?php



get_template_part( 'includes/shop_carousel' );



get_footer();



?>