<?php



/*



	Template Name: Daily Offers



*/







get_header();



the_post();



get_template_part( 'includes/inner_header' );







$cur_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; //get curent page







$args =array( 



	'post_type' 	=> 'daily_offer',



	'meta_key' 		=> 'offer_expire',



	'orderby'		=> 'meta_value_num',



	'post_status'	=> 'publish',



	'order'			=> 'ASC',



	'posts_per_page'=> coupon_get_option('daily_offers_per_page'),



	'paged' 		=> $cur_page,



	's'				=> get_query_var('s'),



	'meta_query'   => array(



		array(



			'key' => 'offer_expire',



			'value' => time(),



			'compare' => '>'



		)



	)



);	



$main_query = new WP_Query( $args );











$page_links_total =  $main_query->max_num_pages;



$page_links = paginate_links( 



	array(



		'base' => add_query_arg( 'paged', '%#%' ),



		'prev_next' => true,



		'end_size' => 2,



		'mid_size' => 2,



		'total' => $page_links_total,



		'current' => $cur_page,	



		'prev_text'          => __(''),



		'next_text'          => __(''),	



		'after_page_number'  => '<li style="border:none;"><span style="border:none;" class="fa fa-tilted-sep"></span></li>',		



		'type' => 'array'



	)



);



$pagination = coupon_format_pagination( $page_links );







?>



<?php if(coupon_get_option( 'display_meals' ) > 0){?>



<section class="meal_counter hidden-xs">



<?php include('meal_progress.php'); ?>



</section>



<?php }?>



<section class="category">







        <!-- container -->



        <div class="container daily_offers_list">



			<div class="row">



				<div class="col-md-12">



					<div class="caption category-caption <?php $content = get_the_content(); echo empty( $content ) ? '' : 'bottom-margin' ?>">



						<h2><?php echo coupon_page_title(); ?></h2>



						<p><?php echo coupon_page_subtitle(); ?></p>



					</div>



				</div>



			</div>	



			<div class="row">



				<div class="col-md-12 main_content">



					<?php the_content(); ?>



				</div>



			</div>



            <!-- row -->



            <div class="row">







                <!-- single-shop-container -->



                <div class="coupon_list col-md-9">







                    <!-- row -->



                    <div class="row">







                        <!-- shop-info -->



                        <div class="shop-info">







                        <!-- computers-items -->



                        <div class="featured-containers col-md-12">



							<?php if( $main_query->have_posts() ): ?>



								<?php 



								$counter = 0; 



								$max_count = 3;//is_active_sidebar('sidebar-right') ? 3 : 4;



								$col_md = 3;//is_active_sidebar('sidebar-right') ? 4 : 3;



								?>



								<!-- first-row -->



								<div class="row">



									<?php while( $main_query->have_posts() ): ?>



										<?php



										$main_query->the_post();



										include( locate_template( 'includes/content-daily_offer.php' ) );



										?>



										<!-- .item-1 -->



									<?php endwhile; ?>



								</div>



							<?php endif; ?>



						</div>



						</div>



						<!-- .first-row -->







					</div>



					<!-- .computers-items -->



					



					<?php if( !empty( $pagination ) ): ?>



						<!-- pagination -->



						<hr><div class="row">



							<div class="blog-pagination col-md-12">



							   <ul class="pagination">



								  <?php echo $pagination; ?>



							   </ul>



							</div>



						</div>



						<!-- .pagination -->



					<?php endif; ?>







				</div>



				<!-- .row -->



				



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



                                    <!--<div class="logotype-image" style="background:url(<?php echo esc_url( $img_data['src'] ); ?>) no-repeat scroll center 0 / contain;">-->



										



									</div>



									<!-- .avatar-image -->



								<?php endif; ?>



							</div>



							<div class="authorname" style="font-size: 18px; padding: 15px 25px;">



								



								<?php echo $mTitle; ?> 



							</div>



							<div style="margin: 0px 20px; padding: 15px 0px;"> I am here to save you money by handpicking <a class="loadMore" style="color: red; cursor: pointer;">...more</a> <span class="loadSpan" style="display: none;">the best deals at Links of London</span> </div>



							<!-- .profile -->



						</div>







					</div><hr>



					<!-- .recommended-widget -->







                </div>



                <!-- .sidebar -->			



				



			</div>



			<!-- .container -->











		</div>



		<!-- .row -->



	</div>



	<!-- .container -->







</section>



<?php



get_template_part( 'includes/shop_carousel' );



wp_reset_query();



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



	



	$('.featured-item-container').hover(function(){



	$( this).find('.logotype .logotype-image img' ).fadeTo( "slow",0.12	);



	$( this).find('.hover_logo' ).fadeIn( "slow");



	$( this).find('.coupon-content .shop-meta .list-inline').css('visibility','visible');



	$( this).find('.shop-meta.meals span').css('visibility','visible');



	$(this).find('.fa-star').toggleClass('fa-star fa-star-red');



	$(this).find('.fa-star-o').toggleClass('fa-star-o fa-star-red-o');



	$(this).find('.fa-star-half-o').toggleClass('fa-star-half-o fa-star-red-half-o');



},



  function() {



	$( this).find('.logotype .logotype-image img' ).fadeTo( "slow", 10 );



	$( this).find('.hover_logo' ).fadeOut( "slow");



	$( this).find('.coupon-content .shop-meta .list-inline').css('visibility','hidden');



	$( this).find('.shop-meta.meals span').css('visibility','hidden');



	$(this).find('.fa-star-red').toggleClass('fa-star-red fa-star');



	$(this).find('.fa-star-red-o').toggleClass('fa-star-red-o fa-star-o');



	$(this).find('.fa-star-red-half-o').toggleClass('fa-star-red-half-o fa-star-half-o');



  }



);



</script>