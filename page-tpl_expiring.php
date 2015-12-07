<?php

/*

	Template Name: Expiring

*/



get_header();

the_post();

get_template_part( 'includes/inner_header' );



/* grab fetured */

$cur_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; //get curent page

$expiring_per_page = coupon_get_option( 'expiring_per_page' );

$main_query = new WP_Query(array(

	'post_type' 	=> 'code',

	'meta_key' 		=> 'code_expire',

	'orderby'		=> 'meta_value_num',

	'post_status' 	=> 'publish',

	'order'			=> 'ASC',

	'posts_per_page'=> $expiring_per_page,

	'paged' 		=> $cur_page,

	'meta_query'	=> array(

		'relation'  => 'AND',

		array(

			'key' => 'code_for',

			'value' => 'all_users',

			'compare' => '='

		),		

		array(

			'key' => 'code_expire',

			'value' => time(),

			'compare' => '>'

		),

	)

));



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

		'type' => 'array',

	)

);

$pagination = coupon_format_pagination( $page_links );

?>

<section class="meal_counter">

<?php include('meal_progress.php'); ?>

</section>

<section class="shop-single">



	<!-- container -->

	<div class="container">

		<!--<div class="row">

			<div class="col-md-12">

				<div class="caption category-caption <?php $content = get_the_content(); echo empty( $content ) ? '' : 'bottom-margin' ?>">

					<h2><?php echo coupon_page_title(); ?></h2>

					<p><?php echo coupon_page_subtitle(); ?></p>

					<div class="line-divider">

						<span class="line-mask green-bg"></span>

					</div>

				</div>

			</div>

		</div>

		

		<div class="row">

			<div class="col-md-12 main_content">

				<?php the_content(); ?>

			</div>

		</div>-->

		

		<!-- row -->

		<div class="row">



			<!-- single-shop-container -->

			<div class="coupon_list col-md-<?php echo is_active_sidebar('sidebar-right') ? '9' : '12' ?>">

				<!-- row -->

				<div class="row">					

					<?php 

					$show_logo = false;

					if( $main_query->have_posts() ){

						while( $main_query->have_posts() ){

							$main_query->the_post(); 

							include( locate_template( 'includes/code_list_complete.php' ) );

							

						}

					}

					?>

				</div>

				<!-- .single-shop-container -->

				

				<?php if( !empty( $pagination ) ): ?>

					<!-- pagination -->

					<div class="row">

						<div class="blog-pagination col-md-12">

						   <ul class="pagination">

							  <?php echo $pagination; ?>

						   </ul>

						</div>

					</div>

					<!-- .pagination -->

				<?php endif; ?>

			</div>





			<!-- sidebar -->

                <div class="coupon_list_sidebar col-md-3">

					<!-- recommended-widget -->

					<div class="caption widget-caption" style="border: 0px none; margin-top: -50px;">

								<h4  style="font-weight: normal; text-align: center; font-size: 18px;"><?php _e( 'Hand-picked Deals by', 'coupon' ); ?></h4>

							</div>

							<div class="widget" style="padding: 0px;">

							

							<div class="blog-inner widget-inner" style="background-color: rgb(250, 250, 250);">

							<div class="line-divider widget-line-divider"></div>

							

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

							<div class="logotype">

								<?php if( !empty( $avatar ) ): ?>

									<!-- avatar-image -->

									<div class="logotype-image" style="background:url(<?php echo esc_url( $avatar ); ?>) no-repeat scroll 0 0 / cover;">

										

									</div>

									<!-- .avatar-image -->

								<?php endif; ?>

							</div>

							<div class="authorname" style="font-size: 18px; padding: 15px 25px;">

								

								<?php echo get_the_author_meta('first_name').' '.get_the_author_meta('last_name'); ?> 

								

							</div>

							<div style="margin: 0px 20px; padding: 15px 0px;"> I am here to save you money by handpicking <a class="loadMore" style="color: red; cursor: pointer;">...more</a> <span class="loadSpan" style="display: none;">the best deals at Links of London</span> <a class="loadLess" style="color: red; cursor: pointer; display:none;">...show less</a> </div>

							<!-- .profile -->

						</div>



					</div>

					<hr>

					<!-- .recommended-widget -->

                    <?php get_sidebar( 'right' ); ?>



                </div>

                <!-- .sidebar -->



		</div>



	</div>

	<!-- .row -->

	</div>

	<!-- .container -->



</section>

<?php

get_template_part( 'includes/shop_carousel' );

get_footer();

?>

 <script type="text/javascript">

    $(function() {  

		  var endDate = "<?php echo esc_attr( coupon_get_option( 'campaign_expire' ) ); ?> 00:00:00";

		 $('.countdown.styled').countdown({

          date: endDate,

          render: function(data) {

            $(this.el).html("<div>" + this.leadingZeros(data.days, 1) + " &nbsp:<span>days</span></div><div>" + this.leadingZeros(data.hours, 2) + " &nbsp:<span>hrs</span></div><div>" + this.leadingZeros(data.min, 2) + " &nbsp:<span>min</span></div><div>" + this.leadingZeros(data.sec, 2) + "<span>sec</span></div>");

          }

        });

	});

</script>