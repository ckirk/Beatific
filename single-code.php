<?php

	/**********************************************************************

	***********************************************************************

	COUPON CODE SINGLE

	**********************************************************************/

get_header(); 

the_post();

get_template_part( 'includes/inner_header' );



$code_id = get_the_ID();

$code_meta = get_post_meta( $code_id );

$shop_id = coupon_get_smeta( 'code_shop_id', $code_meta, '' );

$shop_meta = get_post_meta( $shop_id );

$shop_link = coupon_get_smeta( 'shop_link', $shop_meta, '' );

?>

	<!-- show show details -->

<?php

  ?>

<section class="shop-single">

<!-- shop-info -->

                        <div class="shop-info col-md-12">



                            <!-- row -->

                            <div class="row">

								<div class="container shop_cont">

                                <!-- shop-info-image -->

								

                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 shop_detail">

                                    <?php if( has_post_thumbnail($shop_id ) ): ?>

									<div class="col-md-5 special-item">

									<a href="<?php echo esc_url( $shop_link ); ?>" target="_blank">

                                        <div class="special-item-inner" style="background-color:#f3f3f3;border:0;">

                                            <div class="special-icon shop-logo">

                                                

												<?php 

													$shop_logo_icon = coupon_get_smeta( 'shop_logo_icon',$shop_meta );

													if( !empty( $shop_logo_icon ) ):

													$img_data = coupon_get_attachment( $shop_logo_icon, 'full' );

												?>

												<img src="<?php echo esc_url( $img_data['src'] ); ?>">

												<?php

													else:

													echo 'no image';

													endif;

												?>

												

												<?php //the_post_thumbnail( 'shop_logo' );

												$mTitle = get_the_title($shop_id);

												 ?>

                                            </div>

                                        </div>

                                    </a>

									</div>

									<?php endif; ?> 

									<!-- shop-info-content -->

									<div class="col-md-7 shop_text_con">

										<!-- title -->

										<div class="caption top-caption">

											<h2><?php echo get_the_title( $shop_id ); ?></h2>

										</div>

										<!-- .title -->



										<!-- shop-info-text -->

										<div class="shop-text main_content">

											<?php echo apply_filters( 'the_content', get_post_field( 'post_content', $shop_id ) ); ?>

										</div>

										<!-- .shop-info-text -->

										<!-- average-saving -->

										<div class="average-saving">

										Average Savings<span>$<?php echo (coupon_get_smeta( 'shop_avg_save',$shop_meta ))?coupon_get_smeta( 'shop_avg_save',$shop_meta ):0; ?></span>

										</div>

										<!-- .average-saving -->

										<!-- social-plugin -->

										<div class="social-plugin">



										</div>

										<!-- .social-plugin -->



									</div>

									<!-- .shop-info-content -->

                                </div>

								

                                <!-- .shop-info-image -->



                                <!-- shop-info-content -->

                                <?php if(coupon_get_option( 'display_meals' ) > 0){?>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 shop_campaign">

									<?php include('meal_progress-secondary.php'); ?>

								</div>

                                <?php }?>

                                <!-- .shop-info-content -->



                            </div>

                           

							</div> <!-- .row -->

                        </div>

                        <!-- .shop-info -->

        <!-- container -->

        <div class="container">

            <!-- row -->

            <div class="row">



                <!-- single-shop-container -->

                <div class="coupon_list col-md-9">

                <div class="caption widget-caption tested">

                <span class="rgtsin"><i class="fa fa-check"></i></span>

                <h4>Tested Today</h4>

                <div class="clearfix"></div>

                </div>

                    <!-- row -->

                    <div class="row">

						<?php include( locate_template( 'includes/code_list_complete.php' ) ); ?>

                    </div>

                </div>





                <!-- sidebar -->

                 <div class="coupon_list_sidebar col-md-3">

					<!-- recommended-widget -->

					<div class="caption widget-caption" style="border: 0px none; margin-top: -50px;">

								<h4  style="font-weight: normal; text-align: center; font-size: 16px;"><?php _e( 'Hand-picked Deals by', 'coupon' ); ?></h4>

							</div>

							<div class="widget" style="padding: 0px; margin-top:0px;">

							

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

									<!--<div class="logotype-image" style="background:url(<?php //echo esc_url( $avatar ); ?>) no-repeat scroll 0 0 / cover;">-->

                                    <div class="logotype-image" style="background:url(<?php echo esc_url( $img_data['src'] ); ?>) no-repeat scroll center 0 / contain;">

										

									</div>

									<!-- .avatar-image -->

								<?php endif; ?>

							</div>

							<div class="authorname">

								

								<?php //echo get_the_author_meta('first_name').' '.get_the_author_meta('last_name'); ?> 

								<?php echo substr($mTitle,0,23); ?> 

                                <span class="sep"></span>

							</div>

							<div class="hpicktext"> I am here to save you money by handpicking <a class="loadMore" style="color: red; cursor: pointer;">...more</a> <span class="loadSpan" style="display: none;">the best deals at Links of London</span> <a class="loadLess" style="color: red; cursor: pointer; display:none;">...show less</a> </div>

							<!-- .profile -->

						</div>



					</div>

					<hr class="mdline">

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

		<script type="text/javascript">

	

	jQuery(document).ready(function ($) { 

	

		$('.featured-item-container').hover(function(){

	$( this).find('.logotype .logotype-image img' ).fadeTo( "slow",0.12	);

	$( this).find('.hover_logo' ).fadeIn( "slow");

	// $( this).find('.coupon-content .shop-meta .list-inline').css('visibility','visible');

	// $( this).find('.shop-meta.meals span').css('visibility','visible');

	$(this).find('.fa-star').toggleClass('fa-star fa-star-red');

	$(this).find('.fa-star-o').toggleClass('fa-star-o fa-star-red-o');

	$(this).find('.fa-star-half-o').toggleClass('fa-star-half-o fa-star-red-half-o');

},

  function() {

	$( this).find('.logotype .logotype-image img' ).fadeTo( "slow", 10 );

	$( this).find('.hover_logo' ).fadeOut( "slow");

	// $( this).find('.coupon-content .shop-meta .list-inline').css('visibility','hidden');

	// $( this).find('.shop-meta.meals span').css('visibility','hidden');

	$(this).find('.fa-star-red').toggleClass('fa-star-red fa-star');

	$(this).find('.fa-star-red-o').toggleClass('fa-star-red-o fa-star-o');

	$(this).find('.fa-star-red-half-o').toggleClass('fa-star-red-half-o fa-star-half-o');

  }

);



	});





	</script>

<?php

wp_reset_query();

get_template_part( 'includes/shop_carousel' );

get_footer();

?>